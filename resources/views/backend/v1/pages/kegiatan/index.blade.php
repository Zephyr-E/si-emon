@extends('backend.v1.templates.index')

@section('content')
<!-- Row -->
<div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary btn-add text-white">
            <i class="fas fa-plus fa-sm"></i> Tambah Kegiatan
        </a>
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Kegiatan</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Program</th>
                            <th>Kegiatan</th>
                            <th class="text-nowrap">Indikator Kegiatan</th>
                            <th>Target</th>
                            <th>Satuan</th>
                            <th>Pagu</th>
                            <th class="text-nowrap">Kepala Bidang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatans as $kegiatan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-nowrap">
                                <div class="btn-group">
                                    <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-sm">
                                        <i class="fas fa-pen text-primary"></i>
                                        Edit
                                    </a>
                                    &nbsp;
                                    <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm text-danger"
                                            onclick="return confirm('Yakin Ingin Hapus Kegiatan?')">
                                            <i class="fas fa-trash text-danger"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $kegiatan->program->kode ." - ". $kegiatan->program->nama }}</td>
                            <td>{{ $kegiatan->kode ." - ". $kegiatan->nama }}</td>
                            <td>{{ $kegiatan->indikator }}</td>
                            <td>{{ $kegiatan->target }}</td>
                            <td>{{ $kegiatan->satuan }}</td>
                            <td>@currency($kegiatan->pagu)</td>
                            <td>{{ $kegiatan->user->nama }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection