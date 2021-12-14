<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Murid;

class GuruController extends Controller {
	public function index(){
		return view('login');
	}

	public function masuk(Request $request){
		$cariakun = Guru::where([['emailGuru', '=', request('nameemail')],['pwdGuru', '=', request('pwd')]])->first();
		if(!empty($cariakun)){
			$request->session()->put('idGuru', $cariakun->idGuru);
			return redirect('/dashguru')->with('sukses','Selamat datang! '.$cariakun->nmGuru);
		}else{
			$cariakun = Murid::where([['nmMurid', '=', request('nameemail')],['pwdMurid', '=', request('pwd')]])->first();
			if(!empty($cariakun)){
				$request->session()->put('idMurid', $cariakun->idMurid);
				return redirect('/dashmurid')->with('sukses','Selamat datang! '.$cariakun->nmMurid);
			}else{
				return redirect('/login')->with('error','Mohon periksa kembali email dan password kamu.');
			}
		}
		
	}

	public function daftarguru(){
		return view('daftarguru');
	}

	public function create(Request $request){
		$cariakun = Guru::where('emailGuru', request('emailGuru'))->first();
		
		if(!empty($cariakun)){
			return redirect('/guru/daftar')->with('error','Pendaftaran gagal! Silahkan coba lagi.');
		}else{
			\App\Guru::create([
			'emailGuru'=>request('emailGuru'),
			'nmGuru'=>request('nmGuru'),
			'pwdGuru'=>request('pwdGuru')
			]);
			$cariakun = Guru::where('emailGuru', request('emailGuru'))->first();
			$request->session()->put('idGuru', $cariakun->idGuru);
			return redirect('/dashguru')->with('sukses','Pendaftaran berhasil! Selamat datang '.$cariakun->nmGuru);
		}
	}
}