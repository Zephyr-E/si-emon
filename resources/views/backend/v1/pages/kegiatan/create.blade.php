@extends('backend.v1.templates.index')

@section('content')
<h2>Tambah Kegiatan</h2>
<div class="card">
    <div class="card-body">
        <form action="{{ route('kegiatan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="program_id">Program</label>
                <select class="selectpicker form-control" name="program_id" id="program_id">
                    <option value="">Pilih</option>
                    @foreach ($programs as $program)
                    <option value="{{ $program->id }}">{{ $program->kode .' - '. $program->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" class="form-control" name="kode" id="kode" placeholder="Masukkan Kode" required>
            </div>
            <div class="form-group">
                <label for="nama">Kegiatan</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Kegiatan" required>
            </div>
            <div class="form-group">
                <label for="indikator">Indikator</label>
                <textarea name="indikator" class="form-control" id="indikator" id="indikator" cols="30" rows="5"
                    required></textarea>
            </div>
            <div class="form-group">
                <label for="target">Target</label>
                <input type="text" class="form-control" name="target" id="target" placeholder="Masukkan Target"
                    required>
            </div>
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Masukkan Satuan"
                    required>
            </div>
            <div class="form-group">
                <label for="pagu">Pagu</label>
                <input type="number" class="form-control" name="pagu" id="pagu" placeholder="Masukkan Pagu" required>
            </div>
            <div class="form-group">
                <label for="user_id">Kepala Bidang</label>
                <select class="selectpicker form-control" name="user_id" id="user_id" required>
                    <option value="">Pilih</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('kegiatan.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection