<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Kelas;
use App\Quiz;
use App\FileQ;
use App\Soal;
use App\Pilgan;
use App\Nilai;
use App\Isian;
use App\Jawaban;
use Carbon\Carbon;

class QuizzesController extends Controller {
	public function index(Request $request){
		$idKelas = $request->session()->get('idKelas');
		if($request->session()->has('idKelas')){
			$sekarang = Carbon::now()->format('d F Y H.i');
			$kelas = Kelas::find($idKelas);
			$nmGuru = Guru::where('idGuru', $kelas->idGuru)->value('nmGuru');
			$data_quiz = Quiz::where('idKelas', $idKelas)->orderBy('tgldibuatQuiz','desc')->get();
			return view('quizzes',['kelas'=> $kelas, 'sekarang'=> $sekarang, 'nmGuru'=> $nmGuru, 'data_quiz'=> $data_quiz]);
		}else{
			echo "Class session not founded!";
		}
	}

	public function detail (Request $request, $idQuiz){

		$request->session()->put('idQuiz', $idQuiz);
		return redirect('/quizzes/details');
	}

	public function details(Request $request){
		$idKelas = $request->session()->get('idKelas');
		if($request->session()->has('idKelas')){
			$kelas = Kelas::find($idKelas);
			$nmGuru = Guru::where('idGuru', $kelas->idGuru)->value('nmGuru');

			$idQuiz = $request->session()->get('idQuiz');
			if($request->session()->has('idQuiz')){
				$quiz = Quiz::find($idQuiz);
				if(!empty($quiz)){
					$tglquiz = date('d F Y', strtotime($quiz->tglQuiz));
		            $tgldibuat = date('d F Y', strtotime($quiz->tgldibuatQuiz));
		            $wktmulai = date('H.i', strtotime($quiz->wktMulaiQuiz));
		            $wktselesai = date('H.i', strtotime($quiz->wktSelesaiQuiz));

		            $data_soal = Soal::where('idQuiz',$idQuiz)->get();

		            $diff = strtotime($quiz->wktSelesaiQuiz) - strtotime($quiz->wktMulaiQuiz);

		            if($diff<=3600){
		            	$menit = $diff/60;
		            	$jarak = $menit.' minutes';
		            }else{
		            	$jam = floor($diff/3600);
		            	$menit = ($diff % 3600)/60;
		            	if($menit==0){
		            		$jarak = $jam.' hours';
		            	}else{
		            		$jarak = $jam.' hours '.$menit.' minutes';
		            	}
		            }

					$sekarang = Carbon::now()->format('d F Y H.i');
					$pelaksanaan1 = $tglquiz.' '.$wktmulai;
					$pelaksanaan2 = $tglquiz.' '.$wktselesai;
					if($sekarang>$pelaksanaan1){
						$nilai = 0;
					}elseif(($sekarang>=$pelaksanaan1) && ($sekarang<=$pelaksanaan2)){
						$nilai = 1;
					}elseif($sekarang<$pelaksanaan2){
						$nilai = 2;
					}

					//dd('nilai:'.$nilai.' sekarang:'.$sekarang.' mulai:'.$pelaksanaan1.' selesai:'.$pelaksanaan2);
					return view('quizzesdetails',['kelas'=> $kelas, 'tgldibuat'=> $tgldibuat, 'tglquiz'=> $tglquiz, 'wktmulai'=> $wktmulai, 'wktselesai'=> $wktselesai, 'jarak'=> $jarak, 'nmGuru'=> $nmGuru, 'quiz'=> $quiz, 'data_soal'=> $data_soal, 'nilai'=> $nilai]);
				}else{
					echo "Quiz not found!";
				}
			}else{
				echo "Quiz session not found!";
			}
		}else{
			echo "Class session not found!";
		}
	}

	public function multiple (Request $request, $idSoal){
		$request->session()->put('idSoal', $idSoal);
		return redirect('/multiplequiz');
	}

	public function essay (Request $request, $idSoal){
		$request->session()->put('idSoal', $idSoal);
		return redirect('/essayquiz');
	}

	public function search (Request $request, $idQuiz){
		$request->session()->put('idQuiz', $idQuiz);
		$quiz = Quiz::find($idQuiz);
		$tipeQuiz = $quiz->tipeQuiz;
		if($tipeQuiz=='Listening' || $tipeQuiz=='Reading'){
			$idSoal = \App\Soal::where([['idQuiz', '=', $idQuiz],['judulSoal', '=', 'Multiple Choice']])->value('idSoal');
			if(!empty($idSoal)){
				$request->session()->put('idSoal', $idSoal);
				return redirect('/multiplequiz');
			}else{
				echo "Questions session not founded!";
			}
		}elseif($tipeQuiz=='Speaking'){
			$idSoal = \App\Soal::where([['idQuiz', '=', $quiz->idQuiz],['judulSoal', '=', 'Voice Note']])->value('idSoal');
			if(!empty($idSoal)){
				$request->session()->put('idSoal', $idSoal);
				return redirect('/voicenotequiz');
			}else{
				echo "Questions session not founded!";
			}
		}
	}

	public function multiplequiz(Request $request){
		$idKelas = $request->session()->get('idKelas');
		if($request->session()->has('idKelas')){
			$kelas = Kelas::find($idKelas);
			$nmGuru = Guru::where('idGuru', $kelas->idGuru)->value('nmGuru');
			$idQuiz = $request->session()->get('idQuiz');
			if($request->session()->has('idQuiz')){
				$quiz = Quiz::find($idQuiz);
				$tglquiz = date('d F Y', strtotime($quiz->tglQuiz));
		        $tgldibuat = date('d F Y', strtotime($quiz->tgldibuatQuiz));
		        $wktmulai = date('H.i', strtotime($quiz->wktMulaiQuiz));
		        $wktselesai = date('H.i', strtotime($quiz->wktSelesaiQuiz));
				$diff = strtotime($quiz->wktSelesaiQuiz) - strtotime($quiz->wktMulaiQuiz);

		        if($diff<=3600){
		        	$menit = $diff/60;
		        	$jarak = $menit.' minutes';
		        }else{
		        	$jam = floor($diff/3600);
		        	$menit = ($diff % 3600)/60;
		        	if($menit==0){
		            	$jarak = $jam.' hours';
		            }else{
		            	$jarak = $jam.' hours '.$menit.' minutes';
		            }
		        }

		        $sekarang = Carbon::now()->format('d F Y H.i');
				$pelaksanaan1 = $tglquiz.' '.$wktmulai;
				$pelaksanaan2 = $tglquiz.' '.$wktselesai;
				if($sekarang<$pelaksanaan1){
					$nilai = 0;
				}elseif(($sekarang>=$pelaksanaan1) && ($sekarang<=$pelaksanaan2)){
					$nilai = 1;
				}elseif($sekarang>$pelaksanaan2){
					$nilai = 2;
				}

				$idSoal = $request->session()->get('idSoal');
				if($request->session()->has('idSoal')){
					$soal = Soal::find($idSoal);
					$data_pilgan = Pilgan::where('idSoal',$soal->idSoal)->get();
					$jumlahSoal = $data_pilgan->count();
					return view('multiplequiz',['kelas'=> $kelas, 'nmGuru'=> $nmGuru, 'quiz'=> $quiz, 'soal'=> $soal, 'jumlahSoal'=> $jumlahSoal, 'tgldibuat'=> $tgldibuat, 'tglquiz'=> $tglquiz, 'wktmulai'=> $wktmulai, 'wktselesai'=> $wktselesai, 'jarak'=> $jarak, 'nmGuru'=> $nmGuru, 'quiz'=> $quiz, 'nilai'=> $nilai, 'data_pilgan'=> $data_pilgan]);
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

	public function essayquiz(Request $request){
		$idKelas = $request->session()->get('idKelas');
		if($request->session()->has('idKelas')){
			$kelas = Kelas::find($idKelas);
			$nmGuru = Guru::where('idGuru', $kelas->idGuru)->value('nmGuru');
			$idQuiz = $request->session()->get('idQuiz');
			if($request->session()->has('idQuiz')){
				$quiz = Quiz::find($idQuiz);
				$tglquiz = date('d F Y', strtotime($quiz->tglQuiz));
		        $tgldibuat = date('d F Y', strtotime($quiz->tgldibuatQuiz));
		        $wktmulai = date('H.i', strtotime($quiz->wktMulaiQuiz));
		        $wktselesai = date('H.i', strtotime($quiz->wktSelesaiQuiz));
				$diff = strtotime($quiz->wktSelesaiQuiz) - strtotime($quiz->wktMulaiQuiz);

		        if($diff<=3600){
		        	$menit = $diff/60;
		        	$jarak = $menit.' minutes';
		        }else{
		        	$jam = floor($diff/3600);
		        	$menit = ($diff % 3600)/60;
		        	if($menit==0){
		            	$jarak = $jam.' hours';
		            }else{
		            	$jarak = $jam.' hours '.$menit.' minutes';
		            }
		        }

		        $sekarang = Carbon::now()->format('d F Y H.i');
				$pelaksanaan1 = $tglquiz.' '.$wktmulai;
				$pelaksanaan2 = $tglquiz.' '.$wktselesai;
				if($sekarang<$pelaksanaan1){
					$nilai = 0;
				}elseif(($sekarang>=$pelaksanaan1) && ($sekarang<=$pelaksanaan2)){
					$nilai = 1;
				}elseif($sekarang>$pelaksanaan2){
					$nilai = 2;
				}

				$idSoal = $request->session()->get('idSoal');
				if($request->session()->has('idSoal')){
					$soal = Soal::find($idSoal);
					$data_isian = Isian::where('idSoal',$soal->idSoal)->get();
					$jumlahSoal = $data_isian->count();

					if($soal->judulSoal=='Voice Note'){
						return view('voicenotequiz',['kelas'=> $kelas, 'nmGuru'=> $nmGuru, 'quiz'=> $quiz, 'soal'=> $soal, 'jumlahSoal'=> $jumlahSoal, 'tgldibuat'=> $tgldibuat,  'wktmulai'=> $wktmulai, 'wktselesai'=> $wktselesai, 'jarak'=> $jarak, 'tglquiz'=> $tglquiz, 'nilai'=> $nilai, 'data_isian'=> $data_isian]);
					}elseif($soal->judulSoal=='Essay' || $soal->judulSoal=='Arrangement'){
						return view('essayquiz',['kelas'=> $kelas, 'nmGuru'=> $nmGuru, 'quiz'=> $quiz, 'soal'=> $soal, 'jumlahSoal'=> $jumlahSoal, 'tgldibuat'=> $tgldibuat, 'wktmulai'=> $wktmulai, 'wktselesai'=> $wktselesai, 'jarak'=> $jarak, 'tglquiz'=> $tglquiz, 'nilai'=> $nilai, 'data_isian'=> $data_isian]);
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

	public function download($idFile){
		$fileQ = \App\FileQ::find($idFile);

		//$fileLoc =  $request->file->storeAs('/upload/', $idFile); - Belum nemu untuk downloadnya.

		return back()->with('sukses','File deleted!');
	}

	public function submitMQ(Request $request,$total){
		dd($total);
		$idQuiz = $request->session()->get('idQuiz');
		if($request->session()->has('idQuiz')){
			$quiz = Quiz::find($idQuiz);
			$idSoal = $request->session()->get('idSoal');
			if($request->session()->has('idSoal')){
				$idMurid = $request->session()->get('idMurid');
				if($request->session()->has('idSoal')){
					$soal = Soal::find($idSoal);
					$data_pilgan = Pilgan::where('idSoal',$soal->idSoal)->get();
					$nilai = 0;

					dd($request);

					foreach ($data_pilgan as $pilgan) {
						$idPilgan = $pilgan->idPilgan;
						$benar = $pilgan->benarPilgan;
						$jwb = $request->jwbPilgan[$idPilgan];
						
						$satuan = 100/($data_pilgan->count());
						if($jwb==$benar){
							$nilai += $satuan;
						}
					}
					Nilai::create([
						'totalNilai'=>$nilai,
						'idMurid'=>$idMurid,
						'idSoal'=>$idSoal
					]);
					return back()->with('sukses','Answers submitted!');
				}else{
					echo "Student session not founded!";
				}
			}else{
				echo "Questions session not founded!";
			}
		}else{
			echo "Quiz session not founded!";
		}
	}

}