@extends('backend.v1.templates.index')

@section('content')
<div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <form action="{{ route('report.print') }}" method="GET" target="_blank">
                @csrf
                <div class="form-group col-4">
                    <label for="jenis">Jenis</label>
                    <select class="selectpicker form-control" name="jenis" id="jenis" required>
                        <option value="">Pilih</option>
                        <option value="program">Program</option>
                        <option value="kegiatan">Kegiatan</option>
                        <option value="realisasi">Realisasi</option>
                    </select>
                </div>
                <div class="form-group pt-3">
                    <button class="btn btn-primary" type="submit">Print</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection