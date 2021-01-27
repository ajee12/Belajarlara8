<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PemasokModel extends Model
{
    use HasFactory;
    public function getdata()
    {
        return DB::table('pemasok')->get();
    }

    public function add_pemasok($data)
    {
        DB::table('pemasok')->insert($data);
    }
    public function edit_pemasok($data)
    {
        DB::table('pemasok')->where('id', $data['id'])->update($data);
    }
    public function delete_pemasok($id)
    {
        DB::table('pemasok')->where('id', $id)->delete();
    }
}
