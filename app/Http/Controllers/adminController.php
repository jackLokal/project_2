<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function index_user(Request $req)
    {
        if (!$req->session()->has('id_user') || $req->session()->get('user_type') !== 'admin') {
            return redirect('404');
        }

        $data = User::where('IsDelete', 0)->paginate(5);
        return view('admin.admin_user', compact('data'));
    }

    public function index_produk()
    {
        $data = produk::where('IsDelete', 0)->paginate(5);
        return view('admin.admin_produk', compact('data'));
    }

    public function index_transaksi()
    {
        $data = DB::table('transaksi')
            ->join('users', 'transaksi.id_user', '=', 'users.id_user')
            ->select('transaksi.*', 'transaksi.nama_pembeli', 'users.nama', 'transaksi.created_at', 'transaksi.total')
            ->where('transaksi.IsDelete', 0)
            ->paginate(5);

        return view('admin.admin_transaksi', compact('data'));
    }

    public function index_detail($id)
    {
        $transaksi = transaksi::with('detail.produk')->findOrFail($id);
        return view('admin.lihat_admin_transaksi', compact('transaksi'));
    }

    public function create_user()
    {
        return view('admin.tambah_admin_user');
    }

    public function create_produk()
    {
        return view('admin.tambah_admin_produk');
    }

    public function store_user(Request $req)
    {
        $user = new User();

        $user->nama = $req->nama;
        $user->password = Hash::make($req->password);
        $user->save();

        return redirect('/admin-user');
    }

    public function store_produk(Request $req)
    {
        $produk = new produk();

        $produk->nama_produk = $req->nama_produk;
        $produk->jumlah_produk = $req->jumlah_produk;
        $produk->harga = $req->harga;
        $produk->save();

        return redirect('/admin-produk');
    }

    public function edit_user($id)
    {
        $user = User::where('id_user', $id)->first();
        return view('admin.edit_admin_user', compact('user'));
    }

    public function edit_produk($id)
    {
        $produk = produk::where('id_produk', $id)->first();
        return view('admin.edit_admin_produk', compact('produk'));
    }

    public function update_user(Request $req, $id)
    {

        $this->validate($req, [
            'id_user' => 'required',
            'nama' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('id_user', $id)->first();
        $user->nama = $req->nama;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect('/admin-user');
    }

    public function update_produk(Request $req, $id)
    {
        $this->validate($req, [
            'id_produk' => 'required',
            'nama_produk' => 'required',
            'jumlah_produk' => 'required',
            'harga' => 'required',
        ]);

        $produk = produk::where('id_produk', $id)->first();
        $produk->nama_produk = $req->nama_produk;
        $produk->jumlah_produk = $req->jumlah_produk;
        $produk->harga = $req->harga;
        $produk->save();
        return redirect('/admin-produk');
    }

    public function destroy_user($id)
    {
        $user_entry = User::where('id_user', $id)->first();
        $user_entry->IsDelete = 1;
        $user_entry->save();

        return redirect('/admin-user');
    }

    public function destroy_produk($id)
    {
        $produk_entry = produk::where('id_produk', $id)->first();
        $produk_entry->IsDelete = 1;
        $produk_entry->save();

        return redirect('/admin-produk');
    }
}
