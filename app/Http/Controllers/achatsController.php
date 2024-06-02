<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\achat;
use Illuminate\Support\Facades\DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AchatsExport;

class achatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $achats = achat::orderBy('created_at', 'desc')->get();
        return view('achats.index')->with('achats', $achats);
    }

    public function create()
    {
        return view('achats.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom_fournisseur' => 'required',
            'nom_produit' => 'required',
            'nombre_produits' => 'required|integer',
        ]);

        $achat = new achat;
        $achat->nom_fournisseur = $request->input('nom_fournisseur');
        $achat->nom_produit = $request->input('nom_produit');
        $achat->nombre_produits = $request->input('nombre_produits');
        $achat->user_id = auth()->user()->id;

        $clid = DB::table('fournisseurs')->where('name', $achat->nom_fournisseur)->value('id');
        $achat->fournisseur_id = $clid;

        $prid = DB::table('produits')->where('nom', $achat->nom_produit)->value('id');
        $achat->produit_id = $prid;

        $pr = DB::table('produits')->where('id', $achat->produit_id)->value('prix');
        $achat->prix_total = $pr * $achat->nombre_produits;

        // Set achat_date to current date and time
        $achat->achat_date = now();

        $achat->save();

        return redirect('/achats')->with('success', 'Une achat avec ' . $achat->nom_fournisseur . ' a été ajouté avec succès');
    }

    public function show($id)
    {
        $achat = achat::find($id);
        return view('achats.show')->with('achat', $achat);
    }

    public function edit($id)
    {
        $achat = achat::find($id);

        if (!isset($achat)) {
            return redirect('/achats')->with('error', 'Pas de achat trouvé');
        }

        return view('achats.edit')->with('achat', $achat);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom_fournisseur' => 'required',
            'nom_produit' => 'required',
            'nombre_produits' => 'required|integer',
        ]);

        $achat = achat::find($id);
        $achat->nom_fournisseur = $request->input('nom_fournisseur');
        $achat->nom_produit = $request->input('nom_produit');
        $achat->nombre_produits = $request->input('nombre_produits');
        $achat->user_id = auth()->user()->id;

        $clid = DB::table('fournisseurs')->where('name', $achat->nom_fournisseur)->value('id');
        $achat->fournisseur_id = $clid;

        $prid = DB::table('produits')->where('nom', $achat->nom_produit)->value('id');
        $achat->produit_id = $prid;

        $pr = DB::table('produits')->where('id', $achat->produit_id)->value('prix');
        $achat->prix_total = $pr * $achat->nombre_produits;

        // Update achat_date to current date and time
        $achat->achat_date = now();

        $achat->save();

        return redirect('/achats')->with('success', 'Une achat vers ' . $achat->nom_fournisseur . ' a été modifié');
    }

    public function destroy($id)
    {
        $achat = achat::find($id);

        if (!isset($achat)) {
            return redirect('/achats')->with('error', 'Pas de achat trouvé');
        }

        if (auth()->user()->id !== $achat->user_id) {
            return redirect('/achats')->with('error', 'Impossible: Vous devez être utilisateur: ' . $achat->user->name . ' pour être capable de supprimer cette achat');
        }

        $achat->delete();
        return redirect('/achats')->with('success', 'Vous avez supprimé une achat avec succès');
    }
    public function generatePDF()
    {
        $achats = Achat::all();
        $totalCost = $achats->sum('prix_total');

        $pdf = PDF::loadView('rapportAchatPDF', compact('achats', 'totalCost'));
        return $pdf->download('rapport-achats.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new AchatsExport, 'rapport-achats.xlsx');
    }
}
