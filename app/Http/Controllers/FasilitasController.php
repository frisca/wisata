<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\KategoriFasilitas;

class FasilitasController extends Controller
{

	public function __construct(fasilitas $fasilitas, kategorifasilitas $kategorifasilitas)
  	{  
     	$this->fasilitas= $fasilitas;
        $this->kategorifasilitas = $kategorifasilitas;
  	}
    
	// public function index()
	// {
	// 	$data = $this->fasilitas->lists();
	// 	return view('fasilitas/index', ['data' => $data]);
	// }

	public function add($id)
	{
        $kategories = $this->kategorifasilitas->kategories();
		return view('fasilitas/add', ['id' => $id, 'kategories' => $kategories]);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'id_kateg_fasilitas' => 'required',
            'keterangan' => 'required',
            'status_fasilitas' => 'required',
            'is_tiket' => 'required'
        ]);

        $data = array(
        	'id_kateg_fasilitas' => $request->input('id_kateg_fasilitas'),
        	'status_fasilitas' => $request->input('status_fasilitas'),
            'keterangan' => $request->input('keterangan'),
            'is_tiket' => $request->input('is_tiket'),
            'status_delete' => 0,
            'id_wisata' => $request->input('id_wisata')
        );

		$result = $this->fasilitas->store($data);
		return  redirect('wisata/edit/' . $request->input('id_wisata'))
                ->with('success1','Data fasilitas berhasil disimpan.');
	}

	public function edit($wisata, $id)
	{
        $kategories = $this->kategorifasilitas->kategoriesAktif();
		$data = $this->fasilitas->detail($wisata, $id);
		return view('fasilitas/edit', ['data' => $data, 'kategories' => $kategories, 'wisata' => $wisata]);
	}

	public function change(Request $request)
    {
        $this->validate($request, [
        	'id_fasilitas' => 'required',
            'id_kateg_fasilitas' => 'required',
            'keterangan' => 'required',
            'status_fasilitas' => 'required',
            'is_tiket' => 'required'
        ]);
 		
 		$data = array(
        	'id_kateg_fasilitas' => $request->input('id_kateg_fasilitas'),
            'status_fasilitas' => $request->input('status_fasilitas'),
            'keterangan' => $request->input('keterangan'),
            'is_tiket' => $request->input('is_tiket'),
            'id_wisata' => $request->input('id_wisata')
        );

        $result = $this->fasilitas->change($request->input('id_fasilitas'), $data);
        return redirect('wisata/edit/' . $request->input('id_wisata'))->with('success','Data fasilitas berhasil diubah. ');
    }

    public function detail($wisata, $id)
	{
		$data = $this->fasilitas->detail($id);
		return view('fasilitas/detail', ['data' => $data, 'wisata' => $wisata]);
	}

	public function delete($wisata, $id)
    {
 		$data = array(
        	'status_delete' => 1
        );

        $result = $this->fasilitas->change($id, $data);
        return redirect('wisata/edit/' . $wisata)->with('success','Data fasilitas berhasil dihapus. ');
    }
}