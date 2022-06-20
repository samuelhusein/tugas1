<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Tambah Mahasiswa</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Tambahkan Mahasiswa</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('registrasi.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('registrasi.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Lengkap:</strong>
<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
@error('nama_lengkap')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Tempat Lahir:</strong>
<input type="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Tempat lahir">
@error('tempat_lahir')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Tanggal Lahir:</strong>
<input type="date" name="tanggal_lahir" class="form-control" placeholder="dd-mm-yyyy">
@error('tanggal_lahir')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Jenis Kelamin:</strong>
<br>
<input type="radio" name="gender" id="" value="Laki-Laki"> <span>Laki-Laki</span>
<input type="radio" name="gender" id="" value="Wanita"> <span>Wanita</span>
@error('gender')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Foto:</strong>
<input type="file" name="loc_foto" class="form-control">
@error('loc_foto')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Sertifikat:</strong>
<input type="file" name="loc_sertifikat" class="form-control">
@error('loc_sertifikat')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>CV:</strong>
<input type="file" name="loc_cv" class="form-control">
@error('loc_cv')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Simpan</button>
<button type="reset" class="btn btn-danger ml-3">Reset</button>
</div>

</form>
<script>
    var drop = new Dropzone('#file', {
      url: "{{ route('registrasi.store') }}"
    });
  </script>
</body>
</html>