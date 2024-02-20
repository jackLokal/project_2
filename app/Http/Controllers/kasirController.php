<?php

namespace App\Http\Controllers;

use App\Models\detail;
use App\Models\produk;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kasirController extends Controller
{
    public function index_transaksi(Request $req)
    {
        if (!$req->session()->has('id_user') || $req->session()->get('user_type') !== 'kasir') {
            return redirect('404');
        }

        $data = DB::table('transaksi')->join('users', 'transaksi.id_user', '=', 'users.id_user')->select('transaksi.*', 'transaksi.nama_pembeli', 'users.nama', 'transaksi.created_at', 'transaksi.total')->where('transaksi.IsDelete', 0)->paginate(5);
        return view('kasir.kasir_transaksi', compact('data'));
    }

    public function index_detail($id)
    {
        $transaksi = transaksi::with('detail.produk')->findOrFail($id);
        return view('kasir.lihat_kasir_transaksi', compact('transaksi'));
    }

    public function index_produk()
    {
        $data = produk::where('IsDelete', 0)->paginate(5);
        return view('kasir.kasir_produk', compact('data'));
    }

    public function create_transaksi()
    {
        $produk = produk::all();
        return view('kasir.create_kasir_transaksi', compact('produk'));
    }

    public function store_transaksi(Request $req)
    {
        $totalHarga = 0;

        $transaksi = transaksi::create([
            'nama_pembeli' => $req->nama_pembeli,
            'id_user' => session('id_user'),
            'total' => array_sum($req->subtotal),
        ]);

        foreach ($req->id_produk as $key => $value) {
            // Ambil harga awal produk
            $produk = produk::find($value);
            $hargaAwal = $produk->harga;

            // Cek apakah stok mencukupi
            if ($produk->jumlah_produk < $req->jumlah[$key]) {
                return redirect()
                    ->back()
                    ->with('error', 'Stok produk ' . $produk->nama_produk . ' tidak mencukupi.');
            }

            // Hitung subtotal berdasarkan jumlah produk yang dimasukkan
            $subTotal = $hargaAwal * $req->jumlah[$key];
            $totalHarga += $subTotal;

            // Kurangi stok produk
            $produk->jumlah_produk -= $req->jumlah[$key];
            $produk->save();

            detail::create([
                'id_trans' => $transaksi->id_trans,
                'id_produk' => $value,
                'jumlah' => $req->jumlah[$key],
                'subtotal' => $subTotal,
            ]);
        }

        return redirect('/kasir-transaksi');
    }

    public function destroy($id_trans)
    {
        $transaksi_entry = transaksi::where('id_trans', $id_trans)->first();
        $transaksi_entry->IsDelete = 1;
        $transaksi_entry->save();

        return redirect('/kasir-transaksi');
    }
}
