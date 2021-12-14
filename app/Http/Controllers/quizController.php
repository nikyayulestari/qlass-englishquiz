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

class QuizController extends Controller {
	public function index(Request $request){
		$idKelas = $request->session()->get('idKelas');
		if($request->session()->has('idKelas')){
			$kelas = Kelas::find($idKelas);
			$nmGuru = Guru::where('idGuru', $kelas->idGuru)->value('nmGuru');
			$data_quiz = Quiz::where('idKelas', $idKelas)->orderBy('tgldibuatQuiz','desc')->get();
			return view('quiz',['kelas'=> $kelas, 'nmGuru'=> $nmGuru, 'data_quiz'=> $data_quiz]);
		}else{
			echo "Class session not founded!";
		}

		
	}

	public function editclass (Request $request){
		$idKelas = $request->session()->get('idKelas');
		$kelas = Kelas::find($idKelas);
		$kelas->update([
			'nmKelas' => $request->nmKelas
		]);
		return redirect('/quiz')->with('sukses','Class Updated!');
	}

	public function createquiz (Request $request){
		$idKelas = $request->session()->get('idKelas');
		if(!empty($idKelas)){
			\App\Quiz::create([
				'judulQuiz'=>request('judulQuiz'),
				'tipeQuiz'=>request('tipeQuiz'),
				'tglQuiz'=>request('tglQuiz'),
				'wktMulaiQuiz'=>request('wktMulaiQuiz'),
				'wktSelesaiQuiz'=>request('wktSelesaiQuiz'),
				'rataQuiz'=>'0',
				'tgldibuatQuiz'=>Carbon::now(),
				'idKelas'=>$idKelas
			]);

			$idQuiz = Quiz::where([['judulQuiz', '=', request('judulQuiz')],['tipeQuiz', '=', request('tipeQuiz')],['wktMulaiQuiz', '=', request('wktMulaiQuiz')],['wktSelesaiQuiz', '=', request('wktSelesaiQuiz')],['idKelas', '=', $idKelas]])->value('idQuiz');
			if(!empty($idQuiz)){
				$request->session()->put('idQuiz', $idQuiz);

				if(request('tipeQuiz')=='Speaking'){
					if($request->session()->has('idQuiz')){
						Soal::create([
							'judulSoal'=>'Voice Note',
							'idQuiz'=>$idQuiz
						]);
						$idSoal = Soal::where([['judulSoal', '=', 'Voice Note'],['idQuiz', '=', $idQuiz]])->value('idSoal');
						$request->session()->put('idSoal', $idSoal);
						return redirect('/voicenote')->with('sukses','Question created!');
					}else{
						echo "Quiz session not founded!";
					}
				}elseif(request('tipeQuiz')=='Reading' || request('tipeQuiz')=='Listening'){
					$idQuiz = $request->session()->get('idQuiz');
					if($request->session()->has('idQuiz')){
						Soal::create([
							'judulSoal'=>'Multiple Choice',
							'idQuiz'=>$idQuiz
						]);
						$idSoal = Soal::where([['judulSoal', '=', 'Multiple Choice'],['idQuiz', '=', $idQuiz]])->value('idSoal');
						$request->session()->put('idSoal', $idSoal);
						return redirect('/multiple')->with('sukses','Question created!');
					}else{
						echo "Quiz session not founded!";
					}
				}else{
					if($request->session()->has('idQuiz')){
						return redirect('/quiz/details')->with('sukses','Question created!');
					}else{
						echo "Quiz session not founded!";
					}
					/*if(request('judulSoal')=='Multiple Choice'){
						return redirect('/multiple')->with('sukses','Question created!');
					}elseif(request('judulSoal')=='Essay'){
						return redirect('/essay')->with('sukses','Question created!');
					}elseif(request('judulSoal')=='Arrangement'){
						return redirect('/arrangement')->with('sukses','Question created!');
					}*/
				}

			}else{
				echo "IDQuiz session not founded!";
			}
		}else{
			echo "Class session not founded!";
		}
		
	}

	public function update(Request $request,$idQuiz){
		$quiz = Quiz::find($idQuiz);
		$quiz->update([
			'judulQuiz'=>request('judulQuiz'),
			'tglQuiz'=>request('tglQuiz'),
			'wktMulaiQuiz'=>request('wktMulaiQuiz'),
			'wktSelesaiQuiz'=>request('wktSelesaiQuiz')
		]);

		return redirect('/quiz')->with('sukses','Quiz Updated!');
	}

	public function delete($idQuiz){
		$quiz = Quiz::find($idQuiz);
		if (!empty($quiz)) {
			//$soal->delete($soal);
			$data_soal = \App\Soal::where('idQuiz',$idQuiz)->get();
			foreach ($data_soal as $soal) {
				$data_pilgan = Pilgan::where('idSoal',$soal->idSoal)->get();
				foreach ($data_pilgan as $pilgan) {
					$data_fileq = \App\FileQ::where('idPilgan',$pilgan->idPilgan)->get();
					foreach ($data_fileq as $fileq) {
						$fileq->delete($fileq);
					}
					$pilgan->delete($pilgan);
				}
				$data_isian = \App\Isian::where('idSoal',$soal->idSoal)->get();
				foreach ($data_isian as $isian) {
					$data_fileq = \App\FileQ::where('idIsian',$isian->idIsian)->get();
					foreach ($data_fileq as $fileq) {
						$fileq->delete($fileq);
					}
					foreach ($data_jawaban as $jawaban) {
						$jawaban->delete($jawaban);
					}
					$isian->delete($isian);
				}
				$data_nilai = Nilai::where('idSoal',$soal->idSoal)->get();
				foreach ($data_nilai as $nilai) {
					$nilai->delete($nilai);
				}
				$soal->delete($soal);
			}

			$quiz->delete($quiz);

			return redirect('/quiz')->with('sukses','Quiz deleted!');
		}else{
			return back()->with('error','Failed! Please try again.');
		}
	}

	public function detail (Request $request, $idQuiz){

		$request->session()->put('idQuiz', $idQuiz);
		return redirect('/quiz/details');
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
		            		$jarak = $jam.' hours ';
		            	}else{
		            		$jarak = $jam.' hours '.$menit.' minutes';
		            	}
		            }

					return view('quizdetails',['kelas'=> $kelas, 'tgldibuat'=> $tgldibuat, 'tglquiz'=> $tglquiz, 'wktmulai'=> $wktmulai, 'wktselesai'=> $wktselesai, 'jarak'=> $jarak, 'nmGuru'=> $nmGuru, 'quiz'=> $quiz, 'data_soal'=> $data_soal]);
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

	public function update1(Request $request,$idQuiz){
		$quiz = Quiz::find($idQuiz);
		$quiz->update([
			'judulQuiz'=>request('judulQuiz'),
			'tglQuiz'=>request('tglQuiz'),
			'wktMulaiQuiz'=>request('wktMulaiQuiz'),
			'wktSelesaiQuiz'=>request('wktSelesaiQuiz')
		]);
			
		return back()->with('sukses','Quiz Updated!');
	}

	public function createSoal (Request $request){
		$idQuiz = $request->session()->get('idQuiz');
		if($request->session()->has('idQuiz')){
			Soal::create([
				'judulSoal'=>request('judulSoal'),
				'idQuiz'=>$idQuiz
			]);
			$idSoal = Soal::where([['judulSoal', '=', request('judulSoal')],['idQuiz', '=', $idQuiz]])->value('idSoal');
			$request->session()->put('idSoal', $idSoal);
			if(request('judulSoal')=='Multiple Choice'){
				return redirect('/multiple')->with('sukses','Question created!');
			}elseif(request('judulSoal')=='Essay'){
				return redirect('/essay')->with('sukses','Question created!');
			}elseif(request('judulSoal')=='Arrangement'){
				return redirect('/arrangement')->with('sukses','Question created!');
			}
		}else{
			echo "Quiz session not founded!";
		}
	}

	public function multiple (Request $request, $idSoal){
		$request->session()->put('idSoal', $idSoal);
		return redirect('/multiple');
	}

	public function essay (Request $request, $idSoal){
		$request->session()->put('idSoal', $idSoal);
		return redirect('/essay');
	}

	public function voicenote (Request $request, $idSoal){
		$request->session()->put('idSoal', $idSoal);
		return redirect('/voicenote');
	}

	public function search (Request $request, $idQuiz){
		$request->session()->put('idQuiz', $idQuiz);
		$quiz = Quiz::find($idQuiz);
		$tipeQuiz = $quiz->tipeQuiz;
		if($tipeQuiz=='Listening' || $tipeQuiz=='Reading'){
			$idSoal = \App\Soal::where([['idQuiz', '=', $idQuiz],['judulSoal', '=', 'Multiple Choice']])->value('idSoal');
			if(!empty($idSoal)){
				$request->session()->put('idSoal', $idSoal);
				return redirect('/multiple');
			}else{
				echo "Questions session not founded!";
			}
		}elseif($tipeQuiz=='Speaking'){
			$idSoal = \App\Soal::where([['idQuiz', '=', $quiz->idQuiz],['judulSoal', '=', 'Voice Note']])->value('idSoal');
			if(!empty($idSoal)){
				$request->session()->put('idSoal', $idSoal);
				return redirect('/voicenote');
			}else{
				echo "Questions session not founded!";
			}
		}
		
	}

	public function deletequestions($idSoal){
		$soal = \App\Soal::find($idSoal);
		if($soal->judulSoal=='Multiple Choice'){
			$data_pilgan = Pilgan::where('idSoal',$soal->idSoal)->get();
			if(!empty($data_pilgan)){
				foreach ($data_pilgan as $pilgan) {
					$data_fileq = \App\FileQ::where('idPilgan',$pilgan->idPilgan)->get();
					foreach ($data_fileq as $fileq) {
						$fileq->delete($fileq);
					}
					$pilgan->delete($pilgan);
				}
			}
		}elseif($soal->judulSoal=='Essay' || $soal->judulSoal=='Arrangement' || $soal->judulSoal=='Voice Note'){
			$data_isian = \App\Isian::where('idSoal',$soal->idSoal)->get();
			if(!empty($data_isian)){
				foreach ($data_isian as $isian) {
					$data_fileq = \App\FileQ::where('idIsian',$isian->idIsian)->get();
					foreach ($data_fileq as $fileq) {
						$fileq->delete($fileq);
					}
					foreach ($data_jawaban as $jawaban) {
						$jawaban->delete($jawaban);
					}
					$isian->delete($isian);
				}
			}
		}

		$data_nilai = \App\Nilai::where('idSoal',$idSoal)->get();
		if(!empty($data_nilai)){
			foreach ($data_nilai as $nilai) {
				$nilai->delete($nilai);
			}
		}
		$soal->delete($soal);
		return back()->with('sukses','Questions deleted!');
	}

	public function deletequestionisian($idIsian){
		$isian = Isian::find($idIsian);
		if(!empty($isian)){
			$data_fileq = FileQ::where('idIsian',$idIsian)->get();
			foreach ($data_fileq as $fileq) {
				$fileq->delete($fileq);
			}
			$data_jawaban = Jawaban::where('idIsian',$idIsian)->get();
			foreach ($data_jawaban as $jawaban) {
				$jawaban->delete($jawaban);
			}
			$isian->delete($isian);
			return back()->with('sukses','Questions deleted!');
		}else{
			echo "Question delete failed!";
		}
		
	}

	public function updatequestionisian(Request $request,$idIsian){
		$isian = \App\Isian::find($idIsian);
		if(!empty($isian)){
			if(!empty(request('benarIsian'))){
				$isian->update([
					'tnyIsian'=>request('tnyIsian'),
					'benarIsian'=>request('benarIsian')
				]);
			}else{
				$isian->update([
					'tnyIsian'=>request('tnyIsian')
				]);
			}
			

			if($request->hasFile('nmFile')){
				$filequiz = new FileQ();
				$file=$request->file('nmFile');
				$filename=$file->getClientOriginalName();
				$file->move('assets/filequiz', $filename);
				$filequiz->nmFile = $filename;
				$filequiz->idIsian = $idIsian;
				$filequiz->save();
				return back()->with('sukses','File uploaded!');
			}
			return back()->with('sukses','Question Updated!');
		}else {
			echo "Question not found!";
		}
		
	}

	public function deletequestionpilgan($idPilgan){
		$pilgan = Pilgan::find($idPilgan);
		if(!empty($pilgan)){
			$data_fileq = FileQ::where('idPilgan',$idPilgan)->get();
			foreach ($data_fileq as $fileq) {
				$fileq->delete($fileq);
			}
			$pilgan->delete($pilgan);
		}
		return back()->with('sukses','Questions deleted!');
	}

	public function updatequestionpilgan(Request $request,$idPilgan){
		$pilgan = Pilgan::find($idPilgan);
		if(!empty($pilgan)){
			$pilgan->update([
				'tnyPilgan'=>request('tnyPilgan'),
				'aPilgan'=>request('aPilgan'),
				'bPilgan'=>request('bPilgan'),
				'cPilgan'=>request('cPilgan'),
				'dPilgan'=>request('dPilgan'),
				'benarPilgan'=>request('benarPilgan'),
			]);

			if($request->hasFile('nmFile')){
				$filequiz = new FileQ();
				$file=$request->file('nmFile');
				$filename=$file->getClientOriginalName();
				$file->move('assets/filequiz', $filename);
				$filequiz->nmFile = $filename;
				$filequiz->idPilgan = $idPilgan;
				$filequiz->save();
				return back()->with('sukses','File uploaded!');
			}
		}
		return back()->with('sukses','Multiple Choice Updated!');
	}

	public function createmultiple (Request $request){
		$idSoal = $request->session()->get('idSoal');
		Pilgan::create([
			'tnyPilgan'=>request('tnyPilgan'),
			'aPilgan'=>request('aPilgan'),
			'bPilgan'=>request('bPilgan'),
			'cPilgan'=>request('cPilgan'),
			'dPilgan'=>request('dPilgan'),
			'benarPilgan'=>request('benarPilgan'),
			'idSoal'=>$idSoal
		]);

		if($request->hasFile('nmFile')){
			$filequiz = new FileQ();
			$file=$request->file('nmFile');
			$filename=$file->getClientOriginalName();
			$file->move('assets/filequiz', $filename);
			$filequiz->nmFile = $filename;

			$idPilgan = Pilgan::where([['idSoal', '=', $idSoal],['tnyPilgan', '=', request('tnyPilgan')],['benarPilgan', '=', request('benarPilgan')]])->value('idPilgan');
			$filequiz->idPilgan = $idPilgan;
			$filequiz->save();
			return back()->with('sukses','File uploaded!');
		}else{
			return back()->with('sukses','Upload file failed! Please try again.');
		}
		return back()->with('sukses','Multiple choice created!');
	}

	public function createvn (Request $request){
		$idQuiz = $request->session()->get('idQuiz');
		if($request->session()->has('idQuiz')){
			Soal::create([
				'judulSoal'=>'Voice Note',
				'idQuiz'=>$idQuiz
			]);
			$idSoal = Soal::where([['judulSoal', '=', 'Voice Note'],['idQuiz', '=', $idQuiz]])->value('idSoal');
			if(!empty($idSoal)){
				$request->session()->put('idSoal', $idSoal);
			
				\App\Isian::create([
					'tnyIsian'=>request('tnyIsian'),
					'idSoal'=>$idSoal
				]);

				$idIsian = \App\Isian::where([['idSoal', '=', $idSoal],['tnyIsian', '=', request('tnyIsian')]])->value('idIsian');

				if($request->hasFile('nmFile')){
					$filequiz = new FileQ();
					$file=$request->file('nmFile');
					$filename=$file->getClientOriginalName();
					$file->move('assets/filequiz', $filename);
					$filequiz->nmFile = $filename;
					$filequiz->idIsian = $idIsian;
					$filequiz->save();
					return back()->with('sukses','File uploaded!');
				}else{
					return back()->with('sukses','Upload file failed! Please try again.');
				}
			}else{
				echo "Questions session not founded!";
			}
		}else{
			echo "Quiz session not founded!";
		}
	}

	public function createessay (Request $request){
		$idSoal = $request->session()->get('idSoal');
		if($request->session()->has('idSoal')){
			\App\Isian::create([
				'tnyIsian'=>request('tnyIsian'),
				'benarIsian'=>request('benarIsian'),
				'idSoal'=>$idSoal
				]);

			$idIsian = \App\Isian::where([['idSoal', '=', $idSoal],['tnyIsian', '=', request('tnyIsian')]])->value('idIsian');

			if($request->hasFile('nmFile')){
				$filequiz = new FileQ();
				$file=$request->file('nmFile');
				$filename=$file->getClientOriginalName();
				$file->move('assets/filequiz', $filename);
				$filequiz->nmFile = $filename;
				$filequiz->idIsian = $idIsian;
				$filequiz->save();
				return back()->with('sukses','File uploaded!');
			}else{
				return back()->with('sukses','Upload file failed! Please try again.');
			}
		}else{
			echo "Questions session not founded!";
		}
	}
}