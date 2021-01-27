<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersediaanModel extends Model
{
    use HasFactory;
    public function getData()
    {
        return DB::table('persediaan')->LeftJoin('satuan', 'satuan.id', '=', 'persediaan.id_satuan')
            ->get();
    }
    public function tambah_persediaan($data)
    {
        DB::table('persediaan')
            ->insert($data);
    }
    public function edit_persediaan($data)
    {
        DB::table('persediaan')->where('id', $data['id'])->update($data);
    }
    public function delete_satuan($id)
    {
        DB::table('persediaan')->where('id', $id)->delete();
    }
}
