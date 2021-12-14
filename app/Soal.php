<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';
    protected $primaryKey = 'idSoal';
    public $timestamps = false;
    protected $fillable = ['idSoal','judulSoal','idQuiz'];
}
