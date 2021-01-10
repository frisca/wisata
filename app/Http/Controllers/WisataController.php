<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\Trip;
use App\Models\Lokasi;
use App\Models\Fasilitas;

class WisataController extends Controller
{

	public function __construct(Wisata $wisata, Lokasi $lokasi, Trip $trip, Fasilitas $fasilitas)
  	{  
     	$this->wisata= $wisata;
        $this->lokasi = $lokasi;
        $this->trip = $trip;
        $this->fasilitas = $fasilitas;
  	}
    
	public function index()
	{
		$data = $this->wisata->lists();
		return view('wisata/index', ['data' => $data]);
	}

    public function add()
    {
        $lokasi = $this->lokasi->lokasi();
        $trip = $this->trip->trips();
        return view('wisata/add', ['listLokasi' => $lokasi, 'trips' => $trip]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_lokasi' => 'required',
            'nama_wisata' => 'required',
            'waktu' => 'required',
            'harga' => 'required',
            'id_lokasi' => 'required',
            'image' => 'required',
            'status_wisata' => 'required'
        ]);

        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images'), $imageName);

        $data = array(
            'id_lokasi' => $request->input('id_lokasi'),
            'nama_wisata' => $request->input('nama_wisata'),
            'waktu' => $request->input('waktu'),
            'harga' => $request->input('harga'),
            'id_trip' => $request->input('id_trip'),
            'image' => $imageName,
            'status_wisata' => $request->input('status_wisata'),
            'status_delete' => 0,
            'jumlah_orang' => $request->input('jumlah_orang')
        );

        $result = $this->wisata->store($data);
        return  redirect('wisata')
                ->with('success','Data wisata berhasil disimpan.');
    }

    public function edit($id)
    {
        $lokasi = $this->lokasi->lokasi();
        $trip = $this->trip->trips();
        $data = $this->wisata->detail($id);
        $fasilitas = $this->fasilitas->lists($id);
        return view('wisata/edit', ['data' => $data, 'listLokasi' => $lokasi, 'trips' => $trip, 'listFasilitas' => $fasilitas]);
    }

    public function change(Request $request)
    {
        $imageName = "";

        $this->validate($request, [
            'id_wisata' => 'required',
            'id_lokasi' => 'required',
            'nama_wisata' => 'required',
            'waktu' => 'required',
            'harga' => 'required',
            'id_lokasi' => 'required',
            'status_wisata' => 'required'
        ]);

        $res = $this->wisata->detail($request->input('id_wisata'));

        
        foreach ($res as $key => $value) {
            if($request->image != null) {
                $image_path = "/images" . $value->image; 
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }

                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('images'), $imageName);

                $data = array(
                    'id_lokasi' => $request->input('id_lokasi'),
                    'nama_wisata' => $request->input('nama_wisata'),
                    'waktu' => $request->input('waktu'),
                    'harga' => $request->input('harga'),
                    'id_trip' => $request->input('id_trip'),
                    'image' => $imageName,
                    'status_wisata' => $request->input('status_wisata'),
                    'status_delete' => 0,
                    'jumlah_orang' => $request->input('jumlah_orang')
                );

                $result = $this->wisata->change($request->input('id_wisata'), $data);
                return redirect('wisata')->with('success','Data wisata berhasil diubah. ');
            }else{
                $data = array(
                    'id_lokasi' => $request->input('id_lokasi'),
                    'nama_wisata' => $request->input('nama_wisata'),
                    'waktu' => $request->input('waktu'),
                    'harga' => $request->input('harga'),
                    'id_trip' => $request->input('id_trip'),
                    'image' => $value->image,
                    'status_wisata' => $request->input('status_wisata'),
                    'status_delete' => 0,
                    'jumlah_orang' => $request->input('jumlah_orang')
                );

                $result = $this->wisata->change($request->input('id_wisata'), $data);
                return redirect('wisata')->with('success','Data wisata berhasil diubah. ');
            }
        }
    }

    public function detail($id)
    {
        $data = $this->wisata->detail($id);
        return view('wisata/detail', ['data' => $data]);
    }

    public function delete($id)
    {
        $data = array(
            'status_delete' => 1
        );

        $result = $this->wisata->change($id, $data);
        return redirect('wisata')->with('success','Data wisata berhasil dihapus. ');
    }
}