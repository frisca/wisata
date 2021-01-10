<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PemesananDetail extends Model
{

    protected $table = 'pemesanan_detail';

    protected $fillable = [
        'id_pemesanan_detail',
        'nomor_pemesanan',
        'nama_wisata',
        'status_delete',
        'jumlah',
        'total',
        'lokasi',
        'trip',
        'waktu'
    ];

    public function lists($nomor_pemesanan)
    {
        $result = DB::table('pemesanan_detail')
                  ->where(array('nomor_pemesanan' => $nomor_pemesanan))
                  ->get();
        return $result;
    }
}
