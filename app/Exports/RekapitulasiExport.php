<?php

namespace App\Exports;

use App\Models\Rekapitulasi;
use Maatwebsite\Excel\Concerns\FromCollection;

class RekapitulasiExport implements FromCollection
{
    /**
     * Ambil data dari database untuk diekspor.
     */
    public function collection()
    {
        return Rekapitulasi::all();
    }
}
