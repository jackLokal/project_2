@extends('temp.admindas')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail transaksinya lho ges</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <p><label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                            <label>:</label>
                            {{ $transaksi->created_at ? $transaksi->created_at->format('d M Y H:i:s') : '-' }}
                        </p>
                        <p><label class="col-sm-2 col-form-label">Nama Pembeli</label>
                            <label>:</label>
                            {{ $transaksi->nama_pembeli }}
                        </p>
                        <p><label class="col-sm-2 col-form-label">Total Harga</label>
                            <label>:</label>
                            {{ $transaksi->total }}
                        </p>
                        <form>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah Dibeli</th>
                                        <th>Harga</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transaksi->detail as $index => $detail)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $detail->produk->nama_produk }}</td>
                                            <td>{{ $detail->jumlah }}</td>
                                            <td>{{ $detail->produk->harga }}</td>
                                            <td>{{ $detail->subtotal }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada detail penjualan tersedia.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </form>
                        <a href="javascript:history.back()" style="color: white"
                                        class="btn btn-warning">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
