<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Refund;
use App\Models\Trip;
use App\Models\Pemesanan;
use App\Models\TanggalWisata;
use App\Auth;
use App\Models\PemesananDetail;

class RefundUserController extends Controller
{

	public function __construct(refund $refund, trip $trip, pemesanan $pemesanan, tanggalwisata $tanggalwisata, pemesanandetail $pemesanandetail)
  	{  
     	$this->refund= $refund;
     	$this->trip = $trip;
     	$this->pemesanan = $pemesanan;
     	$this->tanggalwisata = $tanggalwisata;
     	$this->pemesanandetail = $pemesanandetail;
  	}
    
	public function index()
	{
		$trip = $this->trip->lists();
		$data = $this->refund->refundByIdPelanggan(auth()->user()->id);
		// var_dump($data);exit();
		return view('user/refund', ['data' => $data, 'trip' => $trip]);
	}

	public function add(Request $request)
	{
		$trip = $this->trip->lists();

		$d_pemesanan = $this->pemesanandetail->lists($request->input('nomor_pemesanan'));
		foreach ($d_pemesanan as $key_pemesanan => $value_pemesanan) {
			$waktu = $value_pemesanan->waktu;
			$lokasi = $value_pemesanan->lokasi;
			$trip = $value_pemesanan->trip;
			$nama_wisata = $value_pemesanan->nama_wisata;
		}

		$tanggalwisata = $this->tanggalwisata->tanggalWisataByPemesanan($request->input('nomor_pemesanan'));
		foreach ($tanggalwisata as $k => $v) {
			$from = $v->dari_tanggal;
			$to  = $v->sampai_tanggal;
		}

		$pemesanan = $this->pemesanan->detail($request->input('nomor_pemesanan'));
		
		foreach ($pemesanan as $key => $value) {
			$data = array(
				'total_sebelum' => $value->total,
				'total_refund' => $value->total * 0.25,
				'nomor_pemesanan' => $value->nomor_pemesanan,
				'nama_pelanggan' => auth()->user()->name,
				'id_pelanggan' => auth()->user()->id,
				'waktu' => $waktu,
				'lokasi' => $lokasi,
				'trip' => $trip,
				'nama_wisata' => $nama_wisata,
				'tgl_refund' => date('Y-m-d'),
				'dari_tgl_wisata' => $from,
				'sampai_tgl_wisata' => $to,
				'status_approve' => 0
			);
			// var_dump($data);exit();
		}

		// $res = $this->refund->store($data);

		$datas = array(
			'status_pemesanan' => 3
		);

		$res = $this->pemesanan->change($request->input('nomor_pemesanan'), $datas);


		return redirect('user/konfirmasi');
	}

	public function detail($id){
	    $data = $this->refund->detailById($id);
	    $trip = $this->trip->lists();
	    return view('user/refund_detail', ['data' => $data, 'trip' => $trip]);
	}

	public function update(Request $request){
		$data = array(
            'status_refund' => 1,
            'rek' => $request->input('rek'),
            'hp' => $request->input('hp')
        );

        $result = $this->refund->change($request->input('id'), $data);
        return redirect('user/refund')->with('success','Data refund berhasil diubah. ');
	}
}