@extends('template.app', ['title' => 'Edit Absen || ROMBEL'])

@section('content-dinamis')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elefiveer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('post.update', $post['id']) }}" method="POST" enctype="">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="string" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $post->name) }}" placeholder="Siapa namanya?">
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nis</label>
                                <input type="string" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis', $post->nis) }}" placeholder="Masukkan Nis kamu atuh">
                            
                                <!-- error message untuk nis -->
                                @error('nis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="absen" class="font-weight-bold">Absen</label>
                                <select name="absen" id="absen" class="form-control">
                                    <option value="hadir" {{$post['absen'] == 'hadir' ? 'selected' : ''}}>Hadir</option>
                                    <option value="sakit" {{$post['absen'] == 'sakit' ? 'selected' : ''}}>Sakit</option>
                                    <option value="alpa" {{$post['absen'] == 'alpa' ? 'selected' : ''}}>Alpa</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <button type="reset" class="btn btn-md btn-warning">Reset</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>
</html>

@endsection