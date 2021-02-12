<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Blade;

class BeliModel extends Model
{
    use HasFactory;

    public function dataBeli()
    {
        return DB::table('beli')->leftJoin('pemasok', 'pemasok.id', '=', 'beli.id_pemasok', 'ASC')
            ->leftJoin('beli_detail', 'beli_detail.nobukti', '=', 'beli.nobukti', 'ASC')
            ->leftJoin('satuan', 'satuan.id', '=', 'beli_detail.id_stok', 'ASC')
            ->get();
    }

    public function detail_Beli()
    {
        return DB::table('beli_detail')->leftJoin('satuan', 'satuan.id', '=', 'beli_detail.id_stok')
            ->get();
    }

    public function rowbeli($id_detail)
    {
        return DB::table('beli_detail')->where('id_detail', $id_detail)->get()->first();
    }
    public function detailBeli($nobukti)
    {
        return DB::table('beli')->leftJoin('pemasok', 'pemasok.id', '=', 'beli.id_pemasok', 'ASC')
            ->leftJoin('beli_detail', 'beli_detail.nobukti', '=', 'beli.nobukti', 'ASC')
            ->leftJoin('satuan', 'satuan.id', '=', 'beli_detail.id_stok', 'ASC')
            ->where('beli_detail.nobukti', $nobukti)->get()->first();
    }

    ///////////////////////////////////////////////////////////////////////////////////////
    public function addBeli($data)
    {
        DB::table('beli')->insert($data);
    }

    public function adddetailbeli($data)
    {
        DB::table('beli_detail')->insert($data);
    }

    ///////////////////////////////////edit////////////////////////////////////////////////
    public function editBeli($data)
    {
        DB::table('beli')->where('nobukti', $data['nobukti'])->update($data);
    }

    public function editdetail($data)
    {
        DB::table('beli_detail')->where('nobukti', $data['nobukti'])->update($data);
    }
    //public function deleteBeli($id_beli)
    //{
    //delete() tidak di kasih parameternya yaa ingat tuuu!!!!! biar nggak lupa lagi :)
    // DB::table('beli')->where('id_beli', $id_beli)->delete();
    //}
    ////////////////////////////////////////////////////////delete/////////////////////////////////
    public function detaildelete($nobukti)
    {
        DB::table('beli_detail')->where('nobukti', $nobukti)->delete();
    }

    public function deleteBeli($nobukti)
    {
        DB::table('beli')->where('nobukti', $nobukti)->delete();
    }
    // kalau mau merelasikan table di di index yang mau direlasi biar nggak lambat ketika data sudah banyak
    // public function table()
    // {
    //     DB::commit();
    // }

    // public function gettotal()
    // {
    //     DB::raw('beli_detail.hrgbeli')->;
    // }
}
