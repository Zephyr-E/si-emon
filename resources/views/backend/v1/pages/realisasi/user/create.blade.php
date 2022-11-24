@extends('backend.v1.templates.index')

@section('content')
<h2>Tambah Realisasi</h2>
<div class="row mb-3">
    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Tanggal {{ date('d M Y') }}, Triwulan
                            ke-{{ $triwulan }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Pagu Anggaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($pagu)</div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Target</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $target . ' ' . $satuan }}</div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Anggaran Terserap</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($terserap)</div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Sisa Anggaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">@currency($sisa)</div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('realisasi.store') }}" method="POST">
            @csrf
            <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" hidden>
            <input type="text" name="triwulan" value="{{ $triwulan }}" hidden>
            <div class="form-group">
                <label for="kegiatan_id">Kegiatan</label>
                <select class="selectpicker form-control" name="kegiatan_id" id="kegiatan_id" required>
                    <option value="">Pilih</option>
                    @foreach ($kegiatans as $kegiatan)
                    <option value="{{ $kegiatan->id }}">{{ $kegiatan->kode .' - '. $kegiatan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pagu">Pagu</label>
                <input type="number" class="form-control" name="pagu" id="pagu" placeholder="Masukkan Pagu" required>
            </div>
            <div class="form-group">
                <label for="target">Target</label>
                <input type="number" class="form-control" name="target" id="target" placeholder="Masukkan Target"
                    required>
            </div>
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Masukkan Satuan"
                    required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea type="text" class="form-control" rows="3" name="keterangan" id="keterangan"
                    required></textarea>
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('realisasi.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection