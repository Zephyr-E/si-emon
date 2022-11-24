@extends('backend.v1.templates.index')

@section('content')
<!-- Row -->
<div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
        <a href="{{ route('user.create') }}" class="btn btn-primary btn-add text-white">
            <i class="fas fa-plus fa-sm"></i> Tambah User
        </a>
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Rule</th>
                            <th>Jabatan</th>
                            <th>Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-nowrap">
                                <div class="btn-group">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm">
                                        <i class="fas fa-pen text-primary"></i>
                                        Edit
                                    </a>
                                    &nbsp;
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm text-danger"
                                            onclick="return confirm('Yakin Ingin Hapus User?')">
                                            <i class="fas fa-trash text-danger"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $user->nip }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->rule }}</td>
                            <td>{{ $user->jabatan }}</td>
                            <td>
                                <ol>
                                    @if ($user->jabatan == 'Kepala Bidang')
                                    @foreach ($user->kegiatan as $kegiatan)
                                    <li>{{ $kegiatan->nama }}</li>
                                    @endforeach
                                    @else
                                    Tidak Ada
                                    @endif
                                </ol>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection