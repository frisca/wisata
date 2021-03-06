<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reschedule extends Model
{

    protected $table = 'reschedule';

    protected $fillable = [
        'id_reschedule',
        'nomor_pemesanan',
        'total_sebelum',
        'status_delete',
        'total_reschedule',
        'dari_tgl_wisata',
        'sampai_tgl_wisata',
        'nama_wisata',
        'lokasi',
        'trip',
        'waktu',
        'status_approve'
    ];

    public function lists()
    {
        $result = DB::table('reschedule')
                  ->get();
        return $result;
    }

    public function detail($nomor)
    {
        $result = DB::table('reschedule')
                  ->where(array('nomor_pemesanan' => $nomor))
                  ->get();
        return $result;
    }

    public function rescheduleByIdPelanggan($id)
    {
        $result = DB::table('reschedule as r')
                  ->select('r.*', 'd.nama_pemesan', 'pd.id_wisata')
                  ->leftJoin('data_pemesan as d', 'd.nomor_pemesanan', '=', 'r.nomor_pemesanan')
                  ->leftJoin('pemesanan_detail as pd', 'pd.nomor_pemesanan', '=', 'r.nomor_pemesanan')
                  ->where(array('r.id_pelanggan' => $id))
                  ->get();
        return $result;
    }


    public function store($data)
    {
        $result = DB::table('reschedule')
                  ->insert($data);
        return true;
    }

    public function detailById($nomor)
    {
        $result = DB::table('reschedule')
                  ->where(array('id_reschedule' => $nomor))
                  ->get();
        return $result;
    }

    public function change($id, $data)
    {
        $result = DB::table('reschedule')
                  ->where('id_reschedule', '=', $id)
                  ->update($data);
        return true;
    }

    public function rescheduleAll()
    {
        $result = DB::table('reschedule as r')
                  ->select('r.*', 'd.nama_pemesan')
                  ->leftJoin('data_pemesan as d', 'd.nomor_pemesanan', '=', 'r.nomor_pemesanan')
                //   ->where(array('r.id_pelanggan' => $id))
                  ->get();
        return $result;
    }
}
