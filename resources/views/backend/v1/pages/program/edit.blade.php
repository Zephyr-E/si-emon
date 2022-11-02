@extends('backend.v1.templates.index')

@section('content')
<h2>Perbaharui Program</h2>
<div class="card">
    <div class="card-body">
        <form action="{{ route('program.update', $program) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" class="form-control" name="kode" id="kode" placeholder="Masukkan Kode" value="{{ $program->kode }}" required>
            </div>
            <div class="form-group">
                <label for="nama">Program</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Program" value="{{ $program->nama }}" required>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Masukkan Tahun" value="{{ $program->tahun }}" required>
            </div>
            <div class="form-group">
                <label for="indikator">Indikator</label>
                <textarea name="indikator" class="form-control" id="indikator" id="indikator" cols="30" rows="5"
                required>{{ $program->indikator }}</textarea>
            </div>
            <div class="form-group">
                <label for="pagu">Pagu</label>
                <input type="number" class="form-control" name="pagu" id="pagu" placeholder="Masukkan Pagu" value="{{ $program->pagu }}" required>
            </div>
            <div class="form-group">
                <label for="satuan_indikator">Target Fisik</label>
                <input type="text" class="form-control" name="satuan_indikator" id="satuan_indikator" placeholder="Masukkan Target Fisik" value="{{ $program->satuan_indikator }}" required>
            </div>
            <div class="form-group">
                <label for="target_satuan">Satuan</label>
                <input type="text" class="form-control" name="target_satuan" id="target_satuan" placeholder="Masukkan Satuan" value="{{ $program->target_satuan }}" required>
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Perbaharui</button>
                <a href="{{ route('program.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection