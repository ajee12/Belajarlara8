<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SatuanModel extends Model
{
    use HasFactory;
    public function getData()
    {
        return DB::table('satuan')->get();
    }
    public function add_satuan($data)
    {
        DB::table('satuan')->insert($data);
    }
    public function edit_satuan($data)
    {
        DB::table('satuan')->where('id', $data['id'])->update($data);
    }
    public function delete_satuan($id)
    {
        DB::table('satuan')->where('id', $id)->delete();
    }
}
