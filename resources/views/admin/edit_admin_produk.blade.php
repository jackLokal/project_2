@extends('temp.admindas')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ngedit produknya lho ges</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update_produk', ['id_produk' => $produk->id_produk]) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
                                <div class="mb-3 row">
                                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                            value="{{ $produk->nama_produk }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jumlah_produk" class="col-sm-2 col-form-label">Stok Produk</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="jumlah_produk"
                                            name="jumlah_produk" value="{{ $produk->jumlah_produk }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="harga" class="col-sm-2 col-form-label">Harga Produk</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="harga" name="harga"
                                            value="{{ $produk->harga }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="javascript:history.back()" style="color: white"
                                        class="btn btn-warning">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
