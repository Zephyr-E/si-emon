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
    <h1 class="text-center">Laporan Program</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
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
                <td>{{ $program->kode .' - '. $program->nama }}</td>
                <td>{{ $program->tahun }}</td>
                <td>{{ $program->indikator }}</td>
                <td>{{ $program->target }}</td>
                <td>{{ $program->satuan }}</td>
                <td>{{ $program->pagu }}</td>
                <td>{{ $program->otorisasi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>