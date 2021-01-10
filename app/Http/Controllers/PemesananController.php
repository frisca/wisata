<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use App\Models\TiketPemesanan;

class PemesananController extends Controller
{

	public function __construct(pemesanan $pemesanan, pemesanandetail $pemesanandetail, tiketpemesanan $tiketpemesanan)
  	{  
     	$this->pemesanan= $pemesanan;
        $this->pemesanandetail = $pemesanandetail;
        $this->tiketpemesanan = $tiketpemesanan;
  	}
    
	public function index()
	{
		$data = $this->pemesanan->lists();
		return view('pemesanan/index', ['data' => $data]);
	}

	public function detail($nomor)
	{
		$pemesanan = $this->pemesanan->detail($nomor);
		$pemesanandetails = $this->pemesanandetail->lists($nomor);
		$tiketpemesanans = $this->tiketpemesanan->lists($nomor);
		return view('pemesanan/index', ['pemesanandetails' => $pemesanandetails, 'tiketpemesanans' => $tiketpemesanans, 'data' => $pemesanan]);
	}
}