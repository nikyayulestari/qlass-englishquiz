<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileQ extends Model
{
    protected $table = 'filequiz';
    protected $primaryKey = 'idFile';
    public $timestamps = false;
    protected $fillable = ['idFile','nmFile','emailGuru','pwdGuru'];
}
