@extends('backend.v1.templates.index')

@section('content')
<h2>Tambah Program</h2>
<div class="card">
    <div class="card-body">
        <form action="{{ route('program.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" class="form-control" name="kode" id="kode" placeholder="Masukkan Kode" required>
            </div>
            <div class="form-group">
                <label for="nama">Program</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Program" required>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Masukkan Tahun" required>
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
                <label for="otorisasi">Otorisasi</label>
                <input type="text" class="form-control" name="otorisasi" id="otorisasi" placeholder="Masukkan Otorisasi"
                    required>
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('program.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection