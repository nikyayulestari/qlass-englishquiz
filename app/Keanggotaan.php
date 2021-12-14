<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keanggotaan extends Model
{
    protected $table = 'keanggotaan';
    protected $primaryKey = 'idAnggota';
    public $timestamps = false;
    protected $fillable = ['idAnggota','idMurid','idKelas'];
}
