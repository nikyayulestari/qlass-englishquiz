<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pilgan extends Model
{
    protected $table = 'pilgan';
    protected $primaryKey = 'idPilgan';
    public $timestamps = false;
    protected $fillable = ['idFile','tnyPilgan','aPilgan','bPilgan','cPilgan','dPilgan','benarPilgan','idSoal'];
}
