<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quiz';
    protected $primaryKey = 'idQuiz';
    public $timestamps = false;
    protected $fillable = ['idQuiz','judulQuiz','tipeQuiz','tglQuiz','wktMulaiQuiz','wktSelesaiQuiz','rataQuiz','tgldibuatQuiz','idKelas'];
}
