<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info';
    protected $primaryKey = 'idInfo';
    public $timestamps = false;
    protected $fillable = ['idInfo','judulInfo','tgldibuatInfo','isiInfo','idKelas'];
}
