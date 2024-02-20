@extends('temp.admindas')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar produknya lho ges</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-12">
                <div class="card mt-4">
                    <div class="card-body"> <!-- Tombol Tambah -->
                        <!-- Formulir dengan Tabel -->
                        <form>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = ($data->currentPage() - 1) * $data->perPage() + 1; @endphp
                                    @foreach ($data as $da)
                                        @if ($da->IsDelete == 0)
                                            <tr>
                                                <td>{{ $da->nama_produk }}</td>
                                                <td>{{ $da->jumlah_produk }}</td>
                                                <td>{{ $da->harga }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.edit_produk', $da->id_produk) }}"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.destroy_produk', $da->id_produk) }}"
                                                        class="delete-btn btn btn-danger"><i
                                                            class="fas fa-trash"></i></a>
                                                </td>
                                        @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                        {{ $data->links() }}
                        <a class="btn btn-primary float-right" href="{{ route('admin.create_produk') }}">Tambah
                            Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
