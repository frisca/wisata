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
        'tgl_wisata'
    ];

    public function lists()
    {
        $result = DB::table('reschedule')
                  ->get();
        return $result;
    }
}
