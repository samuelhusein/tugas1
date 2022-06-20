<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Tugas TP1</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Pendaftaran Mahasiswa</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('registrasi.create') }}"> Daftarkan!</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>Nama Lengkap</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Gender</th>
<th>Foto</th>
<th>Sertifikat</th>
<th>CV</th>
</tr>
@foreach ($registrasi as $register)
<tr>
<td>{{ $register->id }}</td>
<td>{{ $register->nama_lengkap }}</td>
<td>{{ $register->tempat_lahir }}</td>
<td>{{ $register->tanggal_lahir }}</td>
<td>{{ $register->gender }}</td>
<td>{{ $register->loc_foto }}</td>
<td>{{ $register->loc_sertifikat }}</td>
<td>{{ $register->loc_cv }}</td>
</tr>
@endforeach
</table>
{!! $registrasi->links() !!}
</body>
</html>