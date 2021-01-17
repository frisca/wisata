<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TiketPemesanan extends Model
{

    protected $table = 'tiket_pemesanan';

    protected $fillable = [
        'id_tiket_pemesanan',
        'nama_pemesanan',
        'nomor_pemesanan',
        'status_delete',
        'nama_wisata', 
        'id_wisata'
    ];

    public function lists($nomor_pemesanan)
    {
        $result = DB::table('tiket_pemesanan')
                  ->where(array('nomor_pemesanan' => $nomor_pemesanan))
                  ->get();
        return $result;
    }

    public function store($data)
    {
        $result = DB::table('tiket_pemesanan')
                  ->insert($data);
        return true;
    }
}
