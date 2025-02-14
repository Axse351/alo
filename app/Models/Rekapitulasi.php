<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapitulasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_rekapitulasi';

    // Primary key
    protected $primaryKey = 'id_rekapitulasi';

    // Fillable fields
    protected $fillable = [
        'tanggal',
        'jmlh_perekam',
        'jmlh_suket',
        'jmlh_kia',
        'jmlh_ktp',
        'penerbitan_akte',
    ];
}
