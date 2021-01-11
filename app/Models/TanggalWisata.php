<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TanggalWisata extends Model
{

    protected $table = 'tanggal_wisata';

    protected $fillable = [
        'id_tanggal',
        'dari_tanggal',
        'sampai_tanggal',
        'status_delete',
        'id_wisata'
    ];

    public function lists()
    {
        $result = DB::table('tanggal_wisata as f')
                  ->join('paket_wisata as k', 'k.id_wisata', '=', 'f.id_wisata')
                  ->where(array('f.status_delete' => 0))
                  ->get();
        return $result;
    }

    public function store($data)
    {
        $result = DB::table('tanggal_wisata')
                  ->insert($data);
        return true;
    }

    public function detail($id)
    {
        $result = DB::table('tanggal_wisata as f')
                  ->join('paket_wisata as k', 'k.id_wisata', '=', 'f.id_wisata')
                  ->where(array('f.id_tanggal' => $id))
                  ->get();
        return $result;
    }

    public function change($id, $data)
    {
        $result = DB::table('tanggal_wisata')
                  ->where('id_tanggal', '=', $id)
                  ->update($data);
        return true;
    }

    public function tanggalWisata($id)
    {
        $result = DB::table('tanggal_wisata as f')
                  ->join('paket_wisata as k', 'k.id_wisata', '=', 'f.id_wisata')
                  ->where(array('f.id_wisata' => $id))
                  ->get();
        return $result;
    }

     public function tanggalWisataByPemesanan($id)
    {
        $result = DB::table('tanggal_wisata as f')
                  ->join('paket_wisata as k', 'k.id_wisata', '=', 'f.id_wisata')
                  ->join('pemesanan_detail as p', 'p.id_wisata', '=', 'f.id_wisata')
                  ->where(array('p.nomor_pemesanan' => $id))
                  ->get();
        return $result;
    }
}
