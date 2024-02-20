<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth(Request $req)
    {
        $data = DB::table('users')
            ->where('nama', '=', $req->nama)
            ->first(['id_user', 'user_type', 'password']);

        if ($data && Hash::check($req->password, $data->password)) {
            $req->session()->put('id_user', $data->id_user);
            $req->session()->put('user_type', $data->user_type);
            
            if ($data->user_type == 'admin') {
                return redirect('/admin-user');
            } 
            else if ($data->user_type == 'kasir'){
                return redirect('/kasir-transaksi');
            }else{
                return redirect('/');
            }
        } else {
            return redirect('/')->with('error', 'Username atau password yang anda masukkan salah!');
        }
    } 

    public function logout(Request $req){
        $req->session()->flush('id_user');
        return redirect('/');
    }
}
