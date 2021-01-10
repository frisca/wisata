<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\KategoriFasilitas;

class KategoriFasilitasController extends Controller
{

	public function __construct(KategoriFasilitas $kategoriFasilitas)
  	{  
     	$this->kategoriFasilitas= $kategoriFasilitas;
  	}
    
	public function index()
	{
		$data = $this->kategoriFasilitas->lists();
		return view('kategori-fasilitas/index', ['data' => $data]);
	}

	public function add()
	{
		return view('kategori-fasilitas/add');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'kategori_wisata' => 'required',
            'status_kateg_fasilitas' => 'required'
        ]);

        $data = array(
        	'kategori_wisata' => $request->input('kategori_wisata'),
        	'status_kateg_fasilitas' => $request->input('status_kateg_fasilitas'),
            'status_delete' => 0
        );

		$result = $this->kategoriFasilitas->store($data);
		return  redirect('kategori/fasilitas')
                ->with('success','Data kategori fasilitas berhasil disimpan.');
	}

	public function edit($id)
	{
		$data = $this->kategoriFasilitas->detail($id);
		return view('kategori-fasilitas/edit', ['data' => $data]);
	}

	public function change(Request $request)
    {
        $this->validate($request, [
        	'id_kateg_fasilitas' => 'required',
            'kategori_wisata' => 'required',
            'status_kateg_fasilitas' => 'required'
        ]);
 		
 		$data = array(
        	'kategori_wisata' => $request->input('kategori_wisata'),
        	'status_kateg_fasilitas' => $request->input('status_kateg_fasilitas')
        );

        $result = $this->kategoriFasilitas->change($request->input('id_kateg_fasilitas'), $data);
        return redirect('kategori/fasilitas')->with('success','Data kategori fasilitas berhasil diubah. ');
    }

    public function detail($id)
	{
		$data = $this->kategoriFasilitas->detail($id);
		return view('kategori-fasilitas/detail', ['data' => $data]);
	}

	public function delete($id)
    {
 		$data = array(
        	'status_delete' => 1
        );

        $result = $this->kategoriFasilitas->change($id, $data);
        return redirect('kategori/fasilitas')->with('success','Data kategori fasilitas berhasil dihapus. ');
    }
}