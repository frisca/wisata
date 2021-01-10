<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fasilitas extends Model
{

    protected $table = 'fasilitas';

    protected $fillable = [
        'id_fasilitas',
        'fasilitas',
        'keterangan',
        'status_delete',
        'status_fasilitas',
        'is_tiket',
        'id_kateg_fasilitas',
        'id_wisata'
    ];

    public function lists($id)
    {
        $result = DB::table('fasilitas as f')
                  ->join('kategori_fasilitas as k', 'k.id_kateg_fasilitas', '=', 'f.id_kateg_fasilitas')
                  ->where(array('f.status_delete' => 0, 'f.id_wisata' => $id))
                  ->get();
        return $result;
    }

    public function store($data)
    {
        $result = DB::table('fasilitas')
                  ->insert($data);
        return true;
    }

    public function detail($id)
    {
        $result = DB::table('fasilitas as f')
                  ->join('kategori_fasilitas as k', 'k.id_kateg_fasilitas', '=', 'f.id_kateg_fasilitas')
                  ->where(array('f.id_fasilitas' => $id))
                  ->get();
        return $result;
    }

    public function change($id, $data)
    {
        $result = DB::table('fasilitas')
                  ->where('id_fasilitas', '=', $id)
                  ->update($data);
        return true;
    }
}
