<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    protected $primaryKey = 'idJwban';
    public $timestamps = false;
    protected $fillable = ['idJwban','isiJwban','poinJwban','idMurid','idIsian'];
}
