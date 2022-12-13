@extends('backend.v1.templates.index')

@section('content')
<h2>Perbaharui User</h2>
<div class="card">
    <div class="card-body">
        <form action="{{ route('user.update', $user) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP"
                    value="{{ $user->nip }}" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama"
                    value="{{ $user->nama }}" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username"
                    value="{{ $user->username }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password"
                    placeholder="Masukkan Password Baru">
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukkan Jabatan"
                    value="{{ $user->jabatan }}" required>
            </div>
            <div class="form-group">
                <label for="rule">Rule</label>
                <select class="selectpicker form-control" name="rule" id="rule">
                    <option value="">Pilih</option>
                    <option value="Admin" {{ ($user->rule == 'Admin') ? 'selected' : '' }}>Admin</option>
                    <option value="User" {{ ($user->rule == 'User') ? 'selected' : '' }}>User</option>
                </select>
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Perbaharui</button>
                <a href="{{ route('user.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection