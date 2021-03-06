<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use App\Models\TiketPemesanan;
use App\Models\TanggalWisata;
use App\Models\Wisata;
use App\Models\Trip;
use App\Models\Fasilitas;
use App\Models\DataPemesan;
use Input;

class PemesananController extends Controller
{

	public function __construct(pemesanan $pemesanan, pemesanandetail $pemesanandetail, tiketpemesanan $tiketpemesanan, tanggalwisata $tanggalwisata, wisata $wisata, trip $trip, fasilitas $fasilitas, datapemesan $datapemesan)
  	{  
     	$this->pemesanan= $pemesanan;
        $this->pemesanandetail = $pemesanandetail;
        $this->tiketpemesanan = $tiketpemesanan;
        $this->tanggalwisata = $tanggalwisata;
        $this->wisata = $wisata;
        $this->trip = $trip;
        $this->fasilitas = $fasilitas;
        $this->datapemesan = $datapemesan;
  	}
    
	public function index()
	{
		$data = $this->pemesanan->lists();
		return view('pemesanan/index', ['data' => $data]);
	}

	public function detail($id)
	{
		$pemesanandetail = array();
		$tiketpemesanans = array();
		$datapemesan = array();
		
		$data = $this->pemesanan->detail($id);
		// $pemesanandetails = array();

		foreach($data as $k=>$v){
			$pemesanandetail = $this->pemesanandetail->lists($v->nomor_pemesanan);
			$tiketpemesanans = $this->tiketpemesanan->lists($v->nomor_pemesanan);
			$datapemesan = $this->datapemesan->detail($v->nomor_pemesanan);
		}
		return view('pemesanan/detail', ['pemesanandetail' => $pemesanandetail,  'tiketpemesanan' => $tiketpemesanans, 'data' => $data,
		'datapemesan' => $datapemesan]);
	}

	public function pesan(Request $request, $id){
		// var_dump($request->input('tgl_wisata'));exit();
		$tanggal = $this->tanggalwisata->detail($request->input('tgl_wisata'));
		$wisata = $this->wisata->detail($id);
		$nomr_order = $this->pemesanan->pemesananByDesc();

		if(count($nomr_order) <= 0) {
			$nmr_order = '001';
		}else{
			foreach ($nomr_order as $key => $value) {
				if($value->nomor_pemesanan != ""){
					$gnerateNomorOrder = $value->nomor_pemesanan + 1;
					$nmr_order =  sprintf('%03d', $gnerateNomorOrder);
				}
			}
		}

		// foreach ($nomr_order as $key => $value) {
		// 	if($value->nomor_pemesanan != ""){
		// 		$gnerateNomorOrder = $value->nomor_pemesanan + 1;
		// 		$nmr_order =  '00' . $gnerateNomorOrder ;
		// 	}
		// }

		foreach ($wisata as $keys => $values) {
			$total = $values->harga;
			$nama_wisata = $values->nama_wisata;
			$lokasi = $values->lokasi;
			$trip = $values->trip;
			$waktu = $values->waktu;
			$id_wisata = $values->id_wisata;
		}

		foreach ($tanggal as $k => $v) {
			$from = $v->dari_tanggal;
			$to  = $v->sampai_tanggal;
		}

		$data = array(
			'nomor_pemesanan' => $nmr_order,
			'total' => $total,
			'id_pelanggan' => auth()->user()->id,
			'nama_pelanggan' => auth()->user()->name,
			'status_pemesanan' => 0,
			'tgl_pemesanan' => date('Y-m-d H:i:s'),
			'pembayaran' => 0,
			'status_delete' => 0,
			'status_approve' => 0,
			'status' => 0
		);
		// var_dump($nmr_order);exit();
		// var_dump($data);exit();
		$res = $this->pemesanan->store($data);


		$datas = array(
			'nomor_pemesanan' => $nmr_order,
			'nama_wisata' => $nama_wisata,
			'jumlah' => $total,
			'lokasi' => $lokasi,
			'trip' => $trip,
			'waktu' => $waktu,
			'id_wisata' => $id,
			'dari_tgl_wisata' => $from,
			'sampai_tgl_wisata' => $to,
			'status_delete' => 0
		);

		$p_detail = $this->pemesanandetail->store($datas);

		return  redirect('user/pembayaran/' . $nmr_order . '/wisata/' . $id)
                ->with('success','Data pemesanan berhasil disimpan.');
	}

	public function pembayaran($nomor, $id) {
		$trip = $this->trip->lists();
		$data = $this->wisata->wisataByKonfrimasi($id);
		$fasilitas = $this->fasilitas->isTiket($id);
		$total = 0;
		
		foreach($data as $k=>$v){
			$total = $v->harga;
			$jumlah_orang = $v->jumlah_orang;
		}

		return view('user/pembayaran', ['nomor_pemesanan' => $nomor, 'trip' => $trip, 'data' => $data, 'id' =>$id, 'jmlh_fasilitas' => $fasilitas, 
			'total' => $total, 'jmlh_org' => $jumlah_orang]);
	}

	public function prosesPembayaran(Request $request, $nomor, $id) {
		$trip = $this->trip->lists();
		$data = $this->wisata->detail($id);

		foreach ($data as $key => $value) {
			$total = $value->harga * 0.3;
			// var_dump($request->input('jumlah_bayar'));exit();
			if((int)$request->input('jumlah_bayar') < $total) {
				return  redirect('user/pembayaran/' . $nomor . '/wisata/' . $id)
                ->with('success','Jumlah bayar minimum ' . $total . '. ');
			}else{
				$pemesan = array(
					'nama_pemesan' => $request->input('nama_pemesanan'),
					'alamat' => $request->input('alamat'),
					'hp' => $request->input('hp'),
					'email' => $request->input('email'),
					'nomor_pemesanan' => $nomor
				);
				$storeDataPemesan = $this->datapemesan->store($pemesan);

				if($request->input('nama_tiket_pemesan') > 0){
					foreach ($request->input('nama_tiket_pemesan') as $keys => $values) {
						if($values != ""){
							$data_tiket = array(
								'nama_pemesanan' => $values,
								'ktp' => $request->input('ktp')[$key],
								'nomor_pemesanan' => $nomor,
								'status_delete' => 0,
								'nama_wisata' => $value->nama_wisata,
								'id_wisata' => $id
							);
							// var_dump($data_tiket);exit();
							$storeTiket = $this->tiketpemesanan->store($data_tiket);
						}
					}
				}

				$data = array(
		        	'pembayaran' => $request->input('pembayaran'),
		        	'jumlah_bayar' => $request->input('jumlah_bayar'),
		        );

		        $result = $this->pemesanan->change($nomor, $data);
			}
		}

		return redirect('user/pembayaran/info/' . $nomor . '/wisata/' . $id);
	}

	public function info($nomor, $id){
		$data = $this->wisata->detail($id);
        $trip = $this->trip->lists();
        return view('user/pembayaran_info', ['data' => $data, 'trip' => $trip]);
	}

	public function approve(Request $request, $id)
    {
 		$data = array(
        	'status_approve' => 1
        );

        $result = $this->pemesanan->changeById($id, $data);
        return redirect('pemesanan')->with('success','Data Disetujui. ');
    }

    public function reject(Request $request, $id)
    {
 		$data = array(
        	'status_approve' => 2
        );

        $result = $this->pemesanan->changeById($id, $data);
        return redirect('pemesanan')->with('success','Data Ditolak. ');
    }
}
