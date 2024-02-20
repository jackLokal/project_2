@extends('temp.admindas')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar transaksinya lho ges</h1>
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
                                        <th class="text-center">Nama Petugas</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Nama Pembeli</th>
                                        <th class="text-center">Tanggal Pembelian</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = ($data->currentPage() - 1) * $data->perPage() + 1; @endphp
                                    @foreach ($data as $da)
                                        @if ($da->IsDelete == 0)
                                            <tr>
                                                <td>{{ $da->nama }}</td>
                                                <td>{{ $da->total }}</td>
                                                <td>{{ $da->nama_pembeli }}</td>
                                                <td>{{ $da->created_at }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.index_detail', ['id' => $da->id_trans]) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                                </td>
                                        @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
