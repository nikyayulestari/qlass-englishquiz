<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Isian extends Model
{
    protected $table = 'isian';
    protected $primaryKey = 'idIsian';
    public $timestamps = false;
    protected $fillable = ['idIsian','tnyIsian','benarIsian','idSoal'];
}
