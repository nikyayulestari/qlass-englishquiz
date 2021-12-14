<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'idNilai';
    public $timestamps = false;
    protected $fillable = ['idNilai','totalNilai','idMurid','idSoal'];
}
