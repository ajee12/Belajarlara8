<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DashboardModel extends Model
{
    use HasFactory;

    public function jml_satuan()
    {
        return DB::table('satuan')->count();
    }

    public function jml_pemasok()
    {
        return DB::table('pemasok')->count();
    }
    public function jml_penjualan()
    {
        return DB::table('beli_detail')->count();
    }
}
