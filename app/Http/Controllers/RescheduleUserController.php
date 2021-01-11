<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Reschedule;
use App\Models\Trip;
use App\Models\TanggalWisata;
use App\Models\PemesananDetail;
use App\Models\Wisata;
use App\Models\Pemesanan;

class RescheduleUserController extends Controller
{

	public function __construct(reschedule $reschedule, trip $trip, tanggalwisata $tanggalwisata, pemesanandetail $pemesanandetail, wisata $wisata, pemesanan $pemesanan)
  	{  
     	$this->reschedule= $reschedule;
     	$this->trip = $trip;
     	$this->tanggalwisata = $tanggalwisata;
     	$this->pemesanandetail = $pemesanandetail;
     	$this->wisata = $wisata;
     	$this->pemesanan = $pemesanan;
  	}
    
	public function index()
	{
		$trip = $this->trip->lists();
		$data = $this->reschedule->rescheduleByIdPelanggan(auth()->user()->id);
		// var_dump($data);exit();
		return view('user/reschedule', ['data' => $data, 'trip' => $trip]);
	}

	public function add($nomor)
	{
		$pemesanan = $this->pemesanandetail->lists($nomor);
		foreach ($pemesanan as $key => $value) {
			$trip = $this->trip->lists();
			$tanggalwisata = $this->tanggalwisata->tanggalWisata($value->id_wisata);
		}
		return view('user/reschedule_add', ['nomor' => $nomor, 'trip' => $trip, 'tanggalwisata' => $tanggalwisata]);
	}

	public function store(Request $request, $nomor)
	{
        $tanggal = $this->tanggalwisata->detail($request->input('tgl_wisata'));

		foreach ($tanggal as $k => $v) {
			$from = $v->dari_tanggal;
			$to  = $v->sampai_tanggal;
			$wisata = $this->wisata->detail($v->id_wisata);
		}

		foreach ($wisata as $keys => $values) {
			$total = $values->harga;
			$nama_wisata = $values->nama_wisata;
			$lokasi = $values->lokasi;
			$trip = $values->trip;
			$waktu = $values->waktu;
			$id_wisata = $values->id_wisata;
		}

		$data = array(
			'nomor_pemesanan' => $nomor,
			'total_sebelum' => $total,
			'id_pelanggan' => auth()->user()->id,
			'nama_pelanggan' => auth()->user()->name,
			'total_reschedule' => $total,
			'dari_tgl_wisata' => $from,
			'sampai_tgl_wisata' => $to,
			'nama_wisata' => $nama_wisata,
			'lokasi' => $lokasi,
			'trip' => $trip,
			'waktu' => $waktu,
			'status_delete' => 0,
			'status_approve' => 0
		);

		$res = $this->reschedule->store($data);

		$datas = array(
			'status_pemesanan' => 3
		);

		$res = $this->pemesanan->change($nomor, $datas);

		return  redirect('user/konfirmasi/')
                ->with('success','Data pemesanan berhasil disimpan.');
	}
}