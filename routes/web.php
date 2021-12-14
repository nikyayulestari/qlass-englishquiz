<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login','guruController@index');
Route::get('/guru/login','guruController@masuk')->name('/guru/login');
Route::post('/guru/create','guruController@create')->name('/guru/create');
Route::get('/guru/daftar','guruController@daftarguru');


Route::get('/murid','muridController@index');
Route::post('/murid/create','muridController@create')->name('/murid/create');
Route::get('/dashmurid','dashmuridController@index');
Route::post('/dashmurid/updateaccount','dashmuridController@updateaccount');
Route::post('/dashmurid/updatepass','dashmuridController@updatepass');
Route::post('/enrollclass','dashmuridController@enrollclass')->name('/enrollclass');

Route::get('/class','dashmuridController@class');
Route::get('/dashmurid/{idKelas}','dashmuridController@detailclass');

Route::get('/dashguru','dashguruController@index');
Route::post('/dashguru/updateaccount','dashguruController@updateaccount');
Route::post('/dashguru/updatepass','dashguruController@updatepass');
Route::post('/createclass','dashguruController@createclass')->name('/createclass');
Route::get('/detailclass','dashguruController@detail');
Route::get('/dashguru/{idKelas}','dashguruController@detailclass');
Route::post('/createannounce','dashguruController@createannounce')->name('/createannounce');
Route::post('/editclass','dashguruController@editclass')->name('/editclass');
Route::post('/classinfo/{idInfo}/update','dashguruController@update');
Route::post('/classinfo/{idInfo}/delete','dashguruController@delete');
Route::get('/fileannounce/{idFile}/delete','dashguruController@deletefile');
Route::get('/logout','dashguruController@logout');


Route::get('/quiz','quizController@index');
Route::get('/quiz/{idQuiz}/detail','quizController@detail');
Route::get('/quiz/details','quizController@details');
Route::post('/createquiz','quizController@createquiz')->name('/createquiz');
Route::post('/editclass','quizController@editclass')->name('/editclass');
Route::post('/quiz/{idQuiz}/update','quizController@update');
Route::post('/quiz/{idQuiz}/delete','quizController@delete');
Route::post('/quiz/{idQuiz}/updatequiz','quizController@update1');
Route::post('/createsoal','quizController@createsoal')->name('/createsoal');
Route::get('/multiple/{idSoal}','quizController@multiple');
Route::get('/essay/{idSoal}','quizController@essay');
Route::get('/search/{idQuiz}','quizController@search');
Route::post('/questions/{idSoal}/delete','quizController@deletequestions');
Route::post('/questionisian/{idIsian}/delete','quizController@deletequestionisian');
Route::post('/questionisian/{idIsian}/update','quizController@updatequestionisian');
Route::post('/questionpilgan/{idPilgan}/delete','quizController@deletequestionpilgan');
Route::post('/questionpilgan/{idPilgan}/update','quizController@updatequestionpilgan');
Route::post('/createmultiple','quizController@createmultiple')->name('/createmultiple');
Route::post('/createvn','quizController@createvn')->name('/createvn');
Route::post('/createessay','quizController@createessay')->name('/createessay');
Route::post('/createarrangement','quizController@createessay')->name('/createessay');

Route::get('/multiple','questionsController@multiple');
Route::get('/essay','questionsController@essay');
Route::get('/arrangement','questionsController@essay');
Route::get('/voicenote','questionsController@essay');

Route::get('/quizzes','quizzesController@index');
Route::get('/quizzes/{idQuiz}/detail','quizzesController@detail');
Route::get('/quizzes/details','quizzesController@details');
Route::get('/multiplequiz/{idSoal}','quizzesController@multiple');
Route::get('/essayquiz/{idSoal}','quizzesController@essay');
Route::get('/searchquiz/{idQuiz}','quizzesController@search');
Route::get('/multiplequiz','quizzesController@multiplequiz');
Route::get('/essayquiz','quizzesController@essayquiz');
Route::get('/arrangementquiz','quizzesController@essayquiz');
Route::get('/voicenotequiz','quizzesController@essayquiz');
Route::get('/fileannounce/{idFile}/download','quizzesController@download');

Route::get('/submitMQ/{total}','quizzesController@submitMQ');