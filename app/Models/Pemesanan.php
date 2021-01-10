<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pemesanan extends Model
{

    protected $table = 'pemesanan';

    protected $fillable = [
        'id_pemesanan',
        'nomor_pemesanan',
        'status_pemesanan',
        'status_delete',
        'tgl_pemesanan',
        'total',
        'pembayaran',
        'bukti_pembayaran',
        'tgl_wisata',
        'id_pelanggan',
        'status_approve'
    ];

    public function lists()
    {
        $result = DB::table('pemesanan')
                  ->where('status_delete', 0)
                  ->get();
        return $result;
    }

    public function detail($nomor_pemesanan)
    {
        $result = DB::table('pemesanan')
                  ->where(array('nomor_pemesanan' => $nomor_pemesanan))
                  ->get();
        return $result;
    }
}
