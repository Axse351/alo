<?php

namespace App\Imports;

use App\Models\Rekapitulasi;
use Maatwebsite\Excel\Concerns\ToModel;

class RekapitulasiImport implements ToModel
{
    /**
     * Map each row into the model.
     */
    public function model(array $row)
    {
        return new Rekapitulasi([
            'tanggal' => $row[0],
            'jmlh_perekam' => $row[1],
            'jmlh_suket' => $row[2],
            'jmlh_kia' => $row[3],
            'jmlh_ktp' => $row[4],
            'penerbitan_akte' => $row[5],
        ]);
    }
}
