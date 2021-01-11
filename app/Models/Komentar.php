<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Komentar extends Model
{
  protected $table = 'komentar';

  protected $fillable = [
      'id_komentar',
      'nama_komentar',
      'isi',
      'status_delete'
  ];

  public function lists()
  {
      $result = DB::table('komentar')
                ->orderBy('tgl_komentar', 'desc')
                ->get();
      return $result;
  }

  public function store($data)
  {
      $result = DB::table('komentar')
                ->insert($data);
      return true;
  }
}
