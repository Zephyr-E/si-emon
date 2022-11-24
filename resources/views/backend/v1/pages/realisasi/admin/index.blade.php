@extends('backend.v1.templates.index')

@section('content')
<div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Realisasi</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Triwulan</th>
                            <th>Pagu</th>
                            <th>Target</th>
                            <th>Satuan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($realisasis as $realisasi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $realisasi->kegiatan->kode ." - ". $realisasi->kegiatan->nama }}</td>
                            <td>{{ date('d-m-Y', strtotime($realisasi->tanggal)) }}</td>
                            <td>{{ $realisasi->triwulan }}</td>
                            <td>@currency($realisasi->pagu)</td>
                            <td>{{ $realisasi->target }}</td>
                            <td>{{ $realisasi->satuan }}</td>
                            <td>{{ $realisasi->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection