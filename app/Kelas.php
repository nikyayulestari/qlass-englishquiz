<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'idKelas';
    public $timestamps = false;
    protected $fillable = ['idKelas','nmKelas','kuotaKelas','kodeKelas','idGuru'];
}
