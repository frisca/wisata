<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wisata extends Model
{

    protected $table = 'paket_wisata';

    protected $fillable = [
        'id_wisata',
        'nama_wisata',
        'id_lokasi',
        'waktu',
        'harga',
        'id_trip',
        'status_wisata',
        'status_delete'
    ];

    public function lists()
    {
        $result = DB::table('paket_wisata as p')
                  ->select('p.*', 'l.*', 't.*')
                  ->join('trip as t', 't.id_trip', '=', 'p.id_trip')
                  ->join('lokasi as l', 'l.id_lokasi', '=', 'p.id_lokasi')                    
                  ->where('p.status_delete', 0)
                  ->get();
        return $result;
    }

    public function store($data)
    {
        $result = DB::table('paket_wisata')
                  ->insert($data);
        return true;
    }

    public function detail($id)
    {
        $result = DB::table('paket_wisata as p')
                  ->select('p.*', 'l.*', 't.*')
                  ->join('trip as t', 't.id_trip', '=', 'p.id_trip')
                  ->join('lokasi as l', 'l.id_lokasi', '=', 'p.id_lokasi')                    
                  ->where('p.id_wisata', '=', $id)
                  ->get();
        return $result;
    }

    public function change($id, $data)
    {
        $result = DB::table('paket_wisata')
              ->where('id_wisata', '=', $id)
              ->update($data);
        return true;
    }

    public function listWisata()
    {
        $result = DB::table('paket_wisata as p')                 
                  ->where(array('p.status_delete' => 0, 'p.status_wisata' => 1))
                  ->get();
        return $result;
    }

    public function listWisataAktif()
    {
        $result = DB::table('paket_wisata as p')                 
                  ->where(array('p.status_wisata' => 1))
                  ->get();
        return $result;
    }

    public function wisataByTrip($id)
    {
        $result = DB::table('paket_wisata as p')
                  ->select('p.*', 'l.*', 't.*')
                  ->join('trip as t', 't.id_trip', '=', 'p.id_trip')
                  ->join('lokasi as l', 'l.id_lokasi', '=', 'p.id_lokasi')                    
                  ->where('p.id_trip', '=', $id)
                  ->get();
        return $result;
    }

    public function listsWisataByLokasiAndTrip($trip, $lokasi)
    {
        $result = DB::table('paket_wisata as p')
                  ->select('p.*', 'l.*', 't.*')
                  ->join('trip as t', 't.id_trip', '=', 'p.id_trip')
                  ->join('lokasi as l', 'l.id_lokasi', '=', 'p.id_lokasi')                    
                  ->where(array('p.status_delete' => 0, 'p.id_trip' => $trip, 'p.id_lokasi' => $lokasi))
                  ->get();
        return $result;
    }

    public function detailWisata($id)
    {
        $result = DB::table('paket_wisata as p')
                  ->select('p.*', 'l.*', 't.*')
                  ->join('trip as t', 't.id_trip', '=', 'p.id_trip')
                  ->join('lokasi as l', 'l.id_lokasi', '=', 'p.id_lokasi')                    
                  ->where('p.id_wisata', '=', $id)
                  ->get();
        return $result;
    }

}
