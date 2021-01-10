<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriFasilitas extends Model
{

    protected $table = 'kategori_fasilitas';

    protected $fillable = [
        'id_kateg_fasilitas',
        'kategori_wisata',
        'status_kateg_fasilitas',
        'status_delete'
    ];

    public function lists()
    {
        $result = DB::table('kategori_fasilitas')
                  ->where('status_delete', 0)
                  ->get();
        return $result;
    }

    public function store($data)
    {
        $result = DB::table('kategori_fasilitas')
                  ->insert($data);
        return true;
    }

    public function detail($id)
    {
        $result = DB::table('kategori_fasilitas')
                  ->where(array('id_kateg_fasilitas' => $id))
                  ->get();
        return $result;
    }

    public function change($id, $data)
    {
        $result = DB::table('kategori_fasilitas')
                  ->where('id_kateg_fasilitas', '=', $id)
                  ->update($data);
        return true;
    }

    public function kategories()
    {
        $result = DB::table('kategori_fasilitas')
                  ->where(array('status_delete' => 0, 'status_kateg_fasilitas' => 1))
                  ->get();
        return $result;
    }

    public function kategoriesAktif()
    {
        $result = DB::table('kategori_fasilitas')
                  ->where(array('status_kateg_fasilitas' => 1))
                  ->get();
        return $result;
    }
}
