<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\BeliModel;
use App\Models\PrintModel;
use App\Models\SatuanModel;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    protected $BeliModel;
    protected $PrintModel;
    public function __construct()
    {
        $this->BeliModel = new BeliModel();
        $this->PrintModel = new PrintModel();
    }

    public function index()
    {
        $data = [
            'master' => $this->BeliModel->dataBeli(),
        ];
        return view('master/m_penjualan', $data);
    }

    public function print($nobukti)
    {
        $data = [
            'print' => $this->PrintModel->getprint($nobukti)
        ];
        return view('print/v_print', $data);
    }
    //
}
