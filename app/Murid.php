<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid';
    protected $primaryKey = 'idMurid';
    public $timestamps = false;
    protected $fillable = ['idMurid','nmMurid','pwdMurid'];
}
