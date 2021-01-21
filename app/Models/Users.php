<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{

    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password'
    ];

    public function store($data)
    {
        $result = DB::table('users')
                  ->insert($data);
        return true;
    }

    public function lists()
    {
        $result = DB::table('users')
                  ->get();
        return $result;
    }

    public function getAllUser($id)
    {
        $result = DB::table('users')
                  ->where('id', '!=', $id)
                  ->get();
        return $result;
    }
}
