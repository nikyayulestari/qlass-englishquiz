<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Kelas;
use App\Quiz;
use App\FileQ;
use App\Soal;
use App\Pilgan;
use App\Isian;
use Carbon\Carbon;

class QuestionsController extends Controller {
	public function multiple(Request $request){
		$idKelas = $request->session()->get('idKelas');
		if($request->session()->has('idKelas')){
			$kelas = Kelas::find($idKelas);
			$nmGuru = Guru::where('idGuru', $kelas->idGuru)->value('nmGuru');
			$idQuiz = $request->session()->get('idQuiz');
			if($request->session()->has('idQuiz')){
				$quiz = Quiz::find($idQuiz);
				$tgldibuat = date('d F Y', strtotime($quiz->tgldibuatQuiz));
				$idSoal = $request->session()->get('idSoal');
				if($request->session()->has('idSoal')){
					$soal = Soal::find($idSoal);
					$data_pilgan = Pilgan::where('idSoal',$soal->idSoal)->get();
					$jumlahSoal = $data_pilgan->count();
					return view('multiple',['kelas'=> $kelas, 'nmGuru'=> $nmGuru, 'quiz'=> $quiz, 'soal'=> $soal, 'jumlahSoal'=> $jumlahSoal, 'tgldibuat'=> $tgldibuat, 'data_pilgan'=> $data_pilgan]);
				}else{
					echo "Questions session not founded!";
				}
			}else{
				echo "Quiz session not founded!";
			}
		}else{
			echo "Class session not founded!";
		}
	}

	public function essay(Request $request){
		$idKelas = $request->session()->get('idKelas');
		if($request->session()->has('idKelas')){
			$kelas = Kelas::find($idKelas);
			$nmGuru = Guru::where('idGuru', $kelas->idGuru)->value('nmGuru');
			$idQuiz = $request->session()->get('idQuiz');
			if($request->session()->has('idQuiz')){
				$quiz = Quiz::find($idQuiz);
				$tgldibuat = date('d F Y', strtotime($quiz->tgldibuatQuiz));
				$idSoal = $request->session()->get('idSoal');
				if($request->session()->has('idSoal')){
					$soal = Soal::find($idSoal);
					$data_isian = Isian::where('idSoal',$soal->idSoal)->get();
					$jumlahSoal = $data_isian->count();

					if($soal->judulSoal=='Voice Note'){
						return view('voicenote',['kelas'=> $kelas, 'nmGuru'=> $nmGuru, 'quiz'=> $quiz, 'soal'=> $soal, 'jumlahSoal'=> $jumlahSoal, 'tgldibuat'=> $tgldibuat, 'data_isian'=> $data_isian]);
					}elseif($soal->judulSoal=='Essay' || $soal->judulSoal=='Arrangement'){
						return view('essay',['kelas'=> $kelas, 'nmGuru'=> $nmGuru, 'quiz'=> $quiz, 'soal'=> $soal, 'jumlahSoal'=> $jumlahSoal, 'tgldibuat'=> $tgldibuat, 'data_isian'=> $data_isian]);
					}
				}else{
					echo "Questions session not founded!";
				}
			}else{
				echo "Quiz session not founded!";
			}
		}else{
			echo "Class session not founded!";
		}
	}
	
}