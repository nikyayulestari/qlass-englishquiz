<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Kelas;
use App\Info;
use App\FileQ;
use Carbon\Carbon;

class DashGuruController extends Controller {
	public function index(Request $request){
		$idGuru = $request->session()->get('idGuru');
		if($request->session()->has('idGuru')){
			$data_kelas= Kelas::where('idGuru', $idGuru)->get();
			$guru = Guru::find($idGuru);
			return view('dashguru',['data_kelas'=> $data_kelas, 'guru'=> $guru]);
		}else{
			echo "Teacher session not found!";
		}
	}

	public function updateaccount (Request $request){
		$idGuru = $request->session()->get('idGuru');
		if($request->session()->has('idGuru')){
			$guru= Guru::find($idGuru);
			$guru->update([
				'nmGuru' => $request->nmGuru
			]);
			return back()->with('sukses','Account Updated!');
		}else {
			echo "Teacher session not found!";
		} 
	}

	public function updatepass (Request $request){
		$idGuru = $request->session()->get('idGuru');
		if($request->session()->has('idGuru')){
			if($request->newpass == $request->newpass1){
				$guru = Guru::find($idGuru);
				if($guru->pwdGuru == $request->oldpass){
					$guru->update([
						'pwdGuru' => $request->newpass
					]);
					return redirect('/login')->with('sukses','Account updated! Please login with your new password.');
				}else{
					return redirect('/login')->with('error','Failed! Wrong current password.');
				}
			}else{
				return back()->with('error','Failed! New Password does not match.');
			}
		}else {
			echo "Teacher session not found!";
		} 
	}

	public function createclass(Request $request){
		$idGuru = $request->session()->get('idGuru');
		$cariakun = Kelas::where([['nmKelas', '=', request('nmKelas')],['idGuru', '=', $idGuru]])->first();
		
		if(!empty($cariakun)){
			return redirect('/login')->with('error','Failed! Please try again.');
		}else{
			$kuotaKelas=0;
			$a1=str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789',5);
			$a2=str_shuffle($a1);
			$kodeKelas=substr($a2,0,6);
			$cariakun = Kelas::where('kodeKelas', $kodeKelas)->first();
			while (!empty($cariakun)) {
				$kodeKelas=substr($a2,0,6);
				$cariakun = Kelas::where('kodeKelas', $kodeKelas)->first();
			}
			\App\Kelas::create([
			'nmKelas'=>request('nmKelas'),
			'kuotaKelas'=>$kuotaKelas,
			'kodeKelas'=>$kodeKelas,
			'idGuru'=>$idGuru
			]);
			$cariakun = Kelas::where('kodeKelas', $kodeKelas)->first();
			$request->session()->put('idKelas', $cariakun->idKelas);
			return redirect('/dashguru')->with('sukses', $cariakun->nmKelas.' created!');
		}
	}

	public function editclass (Request $request){
		$idKelas = $request->session()->get('idKelas');
		$kelas = Kelas::find($idKelas);
		$kelas->update([
			'nmKelas' => $request->nmKelas
		]);
		return redirect('/detailclass')->with('sukses','Class Updated!');
	}

	public function detailclass (Request $request, $idKelas){
		$request->session()->put('idKelas', $idKelas);
		if($request->session()->has('idKelas')){
			return redirect('/detailclass/');
		}else{
			echo "Class session not founded!";
		}	
	}

	public function detail (Request $request){
		$idKelas = $request->session()->get('idKelas');
		if($request->session()->has('idKelas')){
			$kelas = Kelas::find($idKelas);
			$nmGuru = Guru::where('idGuru', $kelas->idGuru)->value('nmGuru');
			$data_info = Info::where('idKelas', $idKelas)->orderBy('tgldibuatInfo','desc')->get();
			return view('classdetail',['kelas'=> $kelas, 'nmGuru'=> $nmGuru, 'data_info'=> $data_info]);
		}else{
			echo "Class session not founded!";
		}
	}

	public function createannounce (Request $request){
		$idKelas = $request->session()->get('idKelas');
		if(!empty($idKelas)){
			\App\Info::create([
				'judulInfo'=>request('judulInfo'),
				'tgldibuatInfo'=>Carbon::now(),
				'isiInfo'=>request('isiInfo'),
				'idKelas'=>$idKelas
			]);
			return redirect('/detailclass')->with('sukses','Announcement created!');
		}else{
			echo "Class session not found!";
		}
	}

	public function update(Request $request,$idInfo){
		$info = Info::find($idInfo);
		if(!empty($info)){
			$info->update([
				'judulInfo' => $request->judulInfo,
				'isiInfo' => $request->isiInfo
			]);
			return redirect('/detailclass')->with('sukses','Info Updated!');
		}else{
			echo "Announcement session not found!";
		}
	}

	public function deleteFile($idFile){
		$fileQ = \App\FileQ::where('idFile',$idFile);
		$fileQ->delete($fileQ);
		return back()->with('sukses','File deleted!');
	}

	public function delete($idInfo){
		$info = Info::find($idInfo);
		if (!empty($info)) {
			$info->delete($info);
			return redirect('/detailclass')->with('sukses','Announcement deleted!');
		}else{
			return redirect('/detailclass')->with('error','Failed! Please try again.');
		}
	}

	public function logout(){
		session_start();
		session_destroy();
		return redirect('/');
		//$_SESSION["idGuru"];
		
		//$request->session()->delete('idGuru');

		

		
		//$request->session()->put('idGuru','');
		//$request->session()->put('_previous', $_SERVER['HTTP_HOST']);
		//session_unset('idGuru');
		//dd($request->session());
		
	}
}