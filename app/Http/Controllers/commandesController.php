<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use Illuminate\Support\Facades\DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CommandesExport;

class CommandesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $commandes = Commande::orderBy('created_at', 'desc')->get();
        return view('commandes.index')->with('commandes', $commandes);
    }

    public function create()
    {
        return view('commandes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom_client' => 'required',
            'nom_produit' => 'required',
            'nombre_produits' => 'required|integer',
        ]);

        $commande = new Commande;
        $commande->nom_client = $request->input('nom_client');
        $commande->nom_produit = $request->input('nom_produit');
        $commande->nombre_produits = $request->input('nombre_produits');
        $commande->user_id = auth()->user()->id;

        $clid = DB::table('clients')->where('name', $commande->nom_client)->value('id');
        $commande->client_id = $clid;

        $prid = DB::table('produits')->where('nom', $commande->nom_produit)->value('id');
        $commande->produit_id = $prid;

        $pr = DB::table('produits')->where('id', $commande->produit_id)->value('prix');
        $quantite = $request->input('nombre_produits');
        $commande->prix_total = $pr * $quantite;

        // Set commande_date to current date and time
        $commande->commande_date = now();

        $commande->save();

        return redirect('/commandes')->with('success', 'Une commande a été effectuée avec succès');
    }

    public function show($id)
    {
        $commande = Commande::find($id);
        return view('commandes.show')->with('commande', $commande);
    }

    public function edit($id)
    {
        $commande = Commande::find($id);

        if (!isset($commande)) {
            return redirect('/commandes')->with('error', 'Pas de commande trouvée');
        }

        return view('commandes.edit')->with('commande', $commande);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom_client' => 'required',
            'nom_produit' => 'required',
            'nombre_produits' => 'required|integer',
        ]);

        $commande = Commande::find($id);
        $commande->nom_client = $request->input('nom_client');
        $commande->nom_produit = $request->input('nom_produit');
        $commande->nombre_produits = $request->input('nombre_produits');
        $commande->user_id = auth()->user()->id;

        $clid = DB::table('clients')->where('name', $commande->nom_client)->value('id');
        $commande->client_id = $clid;

        $prid = DB::table('produits')->where('nom', $commande->nom_produit)->value('id');
        $commande->produit_id = $prid;

        $pr = DB::table('produits')->where('id', $commande->produit_id)->value('prix');
        $quantite = $request->input('nombre_produits');
        $commande->prix_total = $pr * $quantite;

        // Update commande_date to current date and time
        $commande->commande_date = now();

        $commande->save();

        return redirect('/commandes')->with('success', 'Une commande vers ' . $commande->nom_client . ' a été modifiée');
    }

    public function destroy($id)
    {
        $commande = Commande::find($id);

        if (!isset($commande)) {
            return redirect('/commandes')->with('error', 'Pas de commande trouvée');
        }

        if (auth()->user()->id !== $commande->user_id) {
            return redirect('/commandes')->with('error', 'Impossible: Vous devez être utilisateur: ' . $commande->user->name . ' pour être capable de supprimer cette commande');
        }

        $commande->delete();
        return redirect('/commandes')->with('success', 'Vous avez supprimé une commande avec succès');
    }
    public function generatePDF()
    {
        $commandes = Commande::all();
        $totalProfit = $commandes->sum('prix_total');

        $pdf = PDF::loadView('rapportCommandePDF', compact('commandes', 'totalProfit'));
        return $pdf->download('rapport-commandes.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new CommandesExport, 'rapport-commandes.xlsx');
    }
}
