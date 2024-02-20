@extends('temp.admindas')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar usernya lho ges</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <form>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = ($data->currentPage() - 1) * $data->perPage() + 1; @endphp
                                    @foreach ($data as $da)
                                        @if ($da->IsDelete == 0)
                                            <tr>
                                                <td>{{ $da->nama }}</td>
                                                <td>{{ $da->user_type }}</td>
                                                <td class="text-center">
                                                    @if ($da->user_type != 'admin')
                                                        <a href="{{ route('admin.edit_user', $da->id_user) }}"
                                                            class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin.destroy_user', $da->id_user) }}"
                                                            class="delete-btn btn btn-danger"><i
                                                                class="fas fa-trash"></i></a>
                                                    @endif
                                                </td>
                                        @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                        {{ $data->links() }}

                        <a class="btn btn-primary float-right" href="{{ route('admin.create_user') }}">Tambah
                            User</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
