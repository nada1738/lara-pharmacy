<?php

namespace App\Exports;

use App\Models\Commande;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CommandesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Retourne toutes les commandes
        return Commande::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Les en-têtes du fichier Excel
        return [
            'ID',
            'Nom de client',
            'Nom de produit',
            'Quantité',
            'Prix Total',
            'Date de commande',
            'Date de Modification',
        ];
    }
}
