<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Murid;
use App\Keanggotaan;
use App\Kelas;
use App\Guru;
use App\Info;

class DashMuridController extends Controller {
	public function index(Request $request){
		$idMurid = $request->session()->get('idMurid');
		$data_kelas = Kelas::all();
		if($request->session()->has('idMurid')){
			$data_keanggotaan = Keanggotaan::where('idMurid', $idMurid)->get();
			$murid = Murid::find($idMurid);
			return view('dashmurid',['data_keanggotaan'=> $data_keanggotaan, 'murid'=> $murid, 'data_kelas'=> $data_kelas]);
		}else{
			echo "Student session not found!";
		}
	}

	public function updateaccount (Request $request){
		$idMurid = $request->session()->get('idMurid');
		if($request->session()->has('idMurid')){
			$murid= Murid::find($idMurid);
			$murid->update([
				'nmMurid' => $request->nmMurid
			]);
			return back()->with('sukses','Account Updated!');
		}else {
			echo "Student session not found!";
		} 
	}

	public function updatepass (Request $request){
		$idMurid = $request->session()->get('idMurid');
		if($request->session()->has('idMurid')){
			if($request->newpass == $request->newpass1){
				$murid = Murid::find($idMurid);
				if($murid->pwdMurid == $request->oldpass){
					$murid->update([
						'pwdMurid' => $request->newpass
					]);
					return redirect('/login')->with('sukses','Account updated! Please login with your new password.');
				}else{
					return redirect('/login')->with('error','Failed! Wrong current password.');
				}
			}else{
				return back()->with('error','Failed! New Password does not match.');
			}
		}else {
			echo "Student session not found!";
		} 
	}

	public function enrollclass(Request $request){
		$idMurid = $request->session()->get('idMurid');
		$idKelas = Kelas::where('kodeKelas', '=', request('kodeKelas'))->value('idKelas');
		if(!empty($idKelas)){
			$cariakun = Keanggotaan::where([['idMurid', '=', $idMurid],['idKelas', '=', $idKelas]])->first();
			if(empty($cariakun)){
				\App\Keanggotaan::create([
				'idMurid'=>$idMurid,
				'idKelas'=>$idKelas
				]);

				$kelas = Kelas::find($idKelas);
				$kuotaKelas = Keanggotaan::where('idKelas', '=', $idKelas)->count();

				$kelas->update([
					'kuotaKelas' => $kuotaKelas
				]);
			}

			$request->session()->put('idKelas', $idKelas);
				
			if($request->session()->has('idKelas')){
				return redirect('/class/');
			}else{
				echo "Class session not founded!";
			}
		}else{
			return back()->with('error','Failed! Class code not found, please try again.');
		}
	}

	public function class (Request $request){
		$idKelas = $request->session()->get('idKelas');
		if($request->session()->has('idKelas')){
			$kelas = Kelas::find($idKelas);
			$nmGuru = Guru::where('idGuru', $kelas->idGuru)->value('nmGuru');
			$data_info = Info::where('idKelas', $idKelas)->orderBy('tgldibuatInfo','desc')->get();
			return view('class',['kelas'=> $kelas, 'nmGuru'=> $nmGuru, 'data_info'=> $data_info]);
		}else{
			echo "Class session not founded!";
		}
	}

	public function detailclass (Request $request, $idKelas){
		$request->session()->put('idKelas', $idKelas);
		if($request->session()->has('idKelas')){
			return redirect('/class/');
		}else{
			echo "Class session not founded!";
		}	
	}
}