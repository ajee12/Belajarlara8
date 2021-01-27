<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class PelangganModel extends Model
{
    use HasFactory;
    public function get_all_data()
    {
        return DB::table('pelanggan')->get();
        //frist untuk data yang pertama
    }
    public function tambah_data($data)
    {
        DB::table('pelanggan')->insert($data);
    }

    public function edit_data($id, $data)
    {
        DB::table('pelanggan')->where('id', $id)->update($data);
    }
    public function delete_data($id)
    {
        DB::table('pelanggan')->delete($id);
    }
}
