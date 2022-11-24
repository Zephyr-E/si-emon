<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ url('templates/backend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1 class="text-center">Laporan Kegiatan</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
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
                <td>{{ $kegiatan->program->kode .' - '. $kegiatan->program->nama }}</td>
                <td>{{ $kegiatan->kode .' - '. $kegiatan->nama }}</td>
                <td>{{ $kegiatan->indikator }}</td>
                <td>{{ $kegiatan->target }}</td>
                <td>{{ $kegiatan->satuan }}</td>
                <td>{{ $kegiatan->pagu }}</td>
                <td>{{ $kegiatan->user->nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>