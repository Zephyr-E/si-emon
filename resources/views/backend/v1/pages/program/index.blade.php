@extends('backend.v1.templates.index')

@section('content')
<!-- Row -->
<div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
        <a href="{{ route('program.create') }}" class="btn btn-primary btn-add text-white">
            <i class="fas fa-plus fa-sm"></i> Tambah Program
        </a>
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Program</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Program</th>
                            <th>Tahun</th>
                            <th class="text-nowrap">Indikator Program</th>
                            <th class="text-nowrap">Target</th>
                            <th>Satuan</th>
                            <th>Pagu</th>
                            <th>Kepala Dinas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($programs as $program)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-nowrap">
                                <div class="btn-group">
                                    <a href="{{ route('program.edit', $program->id) }}" class="btn btn-sm">
                                        <i class="fas fa-pen text-primary"></i>
                                        Edit
                                    </a>
                                    &nbsp;
                                    <form action="{{ route('program.destroy', $program->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm text-danger"
                                            onclick="return confirm('Yakin Ingin Hapus Program?')">
                                            <i class="fas fa-trash text-danger"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $program->kode ." - ". $program->nama }}</td>
                            <td>{{ $program->tahun }}</td>
                            <td>{{ $program->indikator }}</td>
                            <td>{{ $program->target }}</td>
                            <td>{{ $program->satuan }}</td>
                            <td>@currency($program->pagu)</td>
                            <td>{{ $program->otorisasi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection