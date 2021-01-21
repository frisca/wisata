<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Oborolan;
use App\Models\Users;
use App\Models\Trip;

class ObrolanController extends Controller
{

	public function __construct(Oborolan $obrolan, users $users, trip $trip)
  	{  
         $this->obrolan= $obrolan;
         $this->users = $users;
         $this->trip = $trip;
  	}
    
	public function index()
	{
        $data = [];

        $obrolan = $this->obrolan->lists(auth()->user()->name);
        $users   = $this->users->lists();
        // var_dump($obrolan);exit();
        foreach($obrolan as $key=>$v) {
            $data['obrolan'][$key][] = $v->oborolan;
            $data['nama_pengirim'][$key][] = $v->nama_pengirim;
            $data['nama_penerima'][$key][] = $v->nama_penerima;
            $data['status'][$key][] = $v->status_oborolan;
            $data['id_obrolan'][$key][] = $v->id_oborolan;
        }
        
		return view('obrolan/index', ['data' => $obrolan, 'users' => $users]);
    }
    
    public function detail($id, $id1)
	{
        $data = [];
// ]
        $obrolan = $this->obrolan->lists();
        $users = $this->users->lists();

        foreach($obrolan as $k=>$v) {
            if( ($v->nama_penerima == $id && $v->nama_pengirim == $id1) || ($v->nama_penerima == $id1 && $v->nama_pengirim == $id) ) {
                $data['obrolan'] = $v->oborolan;
                $data['nama_pengirim'] = $v->nama_pengirim;
                $data['nama_penerima'] = $v->nama_penerima;
                $data['status'] = $v->status_oborolan;
                $data['id_obrolan'] = $v->id_oborolan;
            }
        }
        // var_dump($data);exit();
		return view('obrolan/detail', ['data' => $data, 'users' => $users, 'id' => $id, 'id1' => $id1]);
    }
    
    public function store(Request $request, $id)
	{
        $data = array(
        	'nama_pengirim' => $request->input('sender'),
        	'nama_penerima' => $request->input('receiver'),
            'oborolan' => $request->input('msg'),
            'status_oborolan' => 0,
            'tgl_oboralan' => date('Y-m-d')
        );

		$result = $this->obrolan->store($data);
		return  redirect('obrolan/detail/' . $id);
                // ->with('success','Data lokasi berhasil disimpan.');÷
    }
    
    public function updatechat($id,$nama)
	{
		$namas = $nama;
		$name = str_replace('%20', ' ',$namas);
		$datas = array('status_oborolan' => 1);
		$this->obrolan->updatepesan($name, $datas);
		$nama = auth()->user()->name;
		// $data['count'] = $this->pasienmodel->countpesan($nama);
		return view('obrolan/detail', ['nama' => $nama, 'namas' => $namas]);
    }
    
    function send(Request $request)
	{
		$data = array(
			'nama_pengirim' => str_replace('%', ' ',$request->input('sender')),
			'oborolan' => $request->input('oborolan'),
			'nama_penerima' => str_replace('%', ' ',$request->input('receiver')),
            'tgl_oboralan' => date('Y-m-d H:i:s'),
            'status_oborolan' => 0
		);
        
		$id = str_replace('%', ' ',$request->input('sender'));
		$receiver = str_replace('%', ' ',$request->input('receiver'));
		// $datas = $this->chatmodel->getReceiver($id, $receiver);
		

		$this->obrolan->store($data);

		$datas = $this->obrolan->getReceiver($id, $receiver);
        // var_dump($id);exit();
		foreach ($datas as $key => $value) {
			echo $value->nama_pengirim . " : " .$value->oborolan . "<br>";
		}
    }
    
    function message(Request $request)
	{
		$id = str_replace('%', ' ',$request->input('sender'));
		$receiver = str_replace('%', ' ',$request->input('receiver'));
		// $datas = $this->chatmodel->getReceiver($id, $receiver);
        $datas = $this->obrolan->getReceiver($id, $receiver);
        // var_dump($id);exit();
		foreach ($datas as $key => $value) {
			echo $value->nama_pengirim . " : " .$value->oborolan . "<br>";
		}
    }
    
    public function addchat($nama)
	{
		$namas = $nama;
		$name = str_replace('%20', ' ',$namas);
		$id = auth()->user()->name;
		return view('obrolan/add', ['nama' => $nama, 'namas' => $namas]);
    }
    
    function newchat()
    {
    	$id = auth()->user()->id;
    	$users = $this->users->getAllUser($id);
    	$nama = auth()->user()->nama;
		// $data['count'] = $this->pasienmodel->countpesan($nama);
        return view('obrolan/chat', ['nama' => $nama, 'user' => $users]);
    }

    public function indexUser()
	{
        $data = [];

        $obrolan = $this->obrolan->lists(auth()->user()->name);
        $users   = $this->users->lists();
        // var_dump($obrolan);exit();
        foreach($obrolan as $key=>$v) {
            $data['obrolan'][$key][] = $v->oborolan;
            $data['nama_pengirim'][$key][] = $v->nama_pengirim;
            $data['nama_penerima'][$key][] = $v->nama_penerima;
            $data['status'][$key][] = $v->status_oborolan;
            $data['id_obrolan'][$key][] = $v->id_oborolan;
        }
        $trip = $this->trip->lists();
		return view('user/obrolan', ['data' => $obrolan, 'users' => $users, 'trip' => $trip]);
    }
    
    public function storeUser(Request $request, $id)
	{
        $data = array(
        	'nama_pengirim' => $request->input('sender'),
        	'nama_penerima' => $request->input('receiver'),
            'oborolan' => $request->input('msg'),
            'status_oborolan' => 0,
            'tgl_oboralan' => date('Y-m-d')
        );

		$result = $this->obrolan->store($data);
		return  redirect('user/detail_chat/' . $id);
                // ->with('success','Data lokasi berhasil disimpan.');÷
    }
    
    public function updatechatUser($id,$nama)
	{
		$namas = $nama;
		$name = str_replace('%20', ' ',$namas);
		$datas = array('status_oborolan' => 1);
		$this->obrolan->updatepesan($name, $datas);
		$nama = auth()->user()->name;
        // $data['count'] = $this->pasienmodel->countpesan($nama);
        $trip = $this->trip->lists();
		return view('user/detail_chat', ['nama' => $nama, 'namas' => $namas, 'trip' => $trip]);
    }
    
    function sendUser(Request $request)
	{
		$data = array(
			'nama_pengirim' => str_replace('%', ' ',$request->input('sender')),
			'oborolan' => $request->input('oborolan'),
			'nama_penerima' => str_replace('%', ' ',$request->input('receiver')),
            'tgl_oboralan' => date('Y-m-d H:i:s'),
            'status_oborolan' => 0
		);
        
		$id = str_replace('%', ' ',$request->input('sender'));
		$receiver = str_replace('%', ' ',$request->input('receiver'));
		// $datas = $this->chatmodel->getReceiver($id, $receiver);
		

		$this->obrolan->store($data);

		$datas = $this->obrolan->getReceiver($id, $receiver);
        // var_dump($id);exit();
		foreach ($datas as $key => $value) {
			echo $value->nama_pengirim . " : " .$value->oborolan . "<br>";
		}
    }
    
    function messageUser(Request $request)
	{
		$id = str_replace('%', ' ',$request->input('sender'));
		$receiver = str_replace('%', ' ',$request->input('receiver'));
		// $datas = $this->chatmodel->getReceiver($id, $receiver);
        $datas = $this->obrolan->getReceiver($id, $receiver);
        // var_dump($datas);exit();
		foreach ($datas as $key => $value) {
			echo $value->nama_pengirim . " : " .$value->oborolan . "<br>";
		}
    }
    
    public function addchatUser($nama)
	{
		$namas = $nama;
		$name = str_replace('%20', ' ',$namas);
        $id = auth()->user()->name;
        $trip = $this->trip->lists();
		return view('user/add_chat', ['nama' => $nama, 'namas' => $namas, 'trip' => $trip]);
    }
    
    function newchatUser()
    {
    	$id = auth()->user()->id;
    	$users = $this->users->getAllUser($id);
    	$nama = auth()->user()->nama;
        // $data['count'] = $this->pasienmodel->countpesan($nama);
        $trip = $this->trip->lists();
        return view('user/new_chat', ['nama' => $nama, 'user' => $users, 'trip' => $trip]);
    }
}