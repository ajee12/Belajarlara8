<?php

namespace App\Http\Controllers;

use App\Models\BeliModel;
use App\Models\SatuanModel;
use Illuminate\Http\Request;

class Master extends Controller
{
    protected $BeliModel;
    public function __construct()
    {
        $this->BeliModel = new BeliModel();
    }

    public function index()
    {
        $data = [
            'detail_barang' => $this->BeliModel->detail_Beli(),
        ];
        return view('master/m_penjualan', $data);
    }
    //
}
