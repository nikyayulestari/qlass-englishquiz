<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Murid;

class MuridController extends Controller {
	public function index(){
		return view('daftarmurid');
	}

	public function create(Request $request){
		$cariakun = Murid::where([['nmMurid', '=', request('nmMurid')],['pwdMurid', '=', request('pwdMurid')]])->first();
		
		if(!empty($cariakun)){
			return redirect('/murid')->with('error','Pendaftaran gagal! Silahkan coba lagi.');
		}else{
			\App\Murid::create([
			'nmMurid'=>request('nmMurid'),
			'pwdMurid'=>request('pwdMurid')
			]);
			$cariakun = Murid::where([['nmMurid', '=', request('nmMurid')],['pwdMurid', '=', request('pwdMurid')]])->first();
			$request->session()->put('idMurid', $cariakun->idMurid);
			return redirect('/login')->with('sukses','Pendaftaran berhasil! Selamat datang '.$cariakun->nmGuru);
		}
	}
}