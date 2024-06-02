<?php
namespace App\Exports;

use App\Models\Achat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AchatsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Achat::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nom de fournisseur',
            'Nom de produit',
            'Quantité',
            'Prix Total',
            'Date d\'achat',
            'Date de Modification',
        ];
    }
}
