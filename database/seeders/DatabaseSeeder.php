<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\produk;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id_user' => 1,
            'nama' => "jack",
            'password' => 123,
            'user_type' => "admin"
        ]);
        User::create([
            'id_user' => 2,
            'nama' => "juan",
            'password' => 123,
            'user_type' => "kasir"
        ]);

        produk::create([
            'id_produk' => 1,
            'nama_produk' => "Susu Kedelai",
            'jumlah_produk' => 200,
            'harga' => 123212
        ]);
        produk::create([
            'id_produk' => 2,
            'nama_produk' => "Susu Kambing",
            'jumlah_produk' => 200,
            'harga' => 123212
        ]);
        produk::create([
            'id_produk' => 3,
            'nama_produk' => "Susu Sapi",
            'jumlah_produk' => 200,
            'harga' => 123212
        ]);
        // produk::create([
        //     'id_produk' => 4,
        //     'nama_produk' => "Susu Kedelai",
        //     'jumlah_produk' => 200,
        //     'harga' => 123212
        // ]);
        // produk::create([
        //     'id_produk' => 5,
        //     'nama_produk' => "Susu Kedelai",
        //     'jumlah_produk' => 200,
        //     'harga' => 123212
        // ]);
        // produk::create([
        //     'id_produk' => 6,
        //     'nama_produk' => "Susu Kedelai",
        //     'jumlah_produk' => 200,
        //     'harga' => 123212
        // ]);

        // transaksi::create([
        //     'id_trans' => 1,
        //     'nama_pembeli' => "siapa tuh",
        //     'total' => 928323,
        //     'id_user' => 2
        // ]);
        // transaksi::create([
        //     'id_trans' => 2,
        //     'nama_pembeli' => "siapa tuh",
        //     'total' => 928323,
        //     'id_user' => 2
        // ]);
        // transaksi::create([
        //     'id_trans' => 3,
        //     'nama_pembeli' => "siapa tuh",
        //     'total' => 928323,
        //     'id_user' => 2
        // ]);
        // transaksi::create([
        //     'id_trans' => 4,
        //     'nama_pembeli' => "siapa tuh",
        //     'total' => 928323,
        //     'id_user' => 2
        // ]);
        // transaksi::create([
        //     'id_trans' => 5,
        //     'nama_pembeli' => "siapa tuh",
        //     'total' => 928323,
        //     'id_user' => 2
        // ]);
        // transaksi::create([
        //     'id_trans' => 6,
        //     'nama_pembeli' => "siapa tuh",
        //     'total' => 928323,
        //     'id_user' => 2
        // ]);
    }
}
