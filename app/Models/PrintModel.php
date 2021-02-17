<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PrintModel extends Model
{
    use HasFactory;

    public function getprint($nobukti)
    {
        return DB::table('beli')->leftJoin('pemasok', 'pemasok.id', '=', 'beli.id_pemasok', 'ASC')
            ->leftJoin('beli_detail', 'beli_detail.nobukti', '=', 'beli.nobukti', 'ASC')
            ->leftJoin('satuan', 'satuan.id', '=', 'beli_detail.id_stok', 'ASC')
            ->where('beli_detail.nobukti', $nobukti)->get()->first();
    }
}
