@extends('template.app', ['title' => 'Edit Tugas || ROMBEL'])

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
                        <form action="{{ route('tgs.update', $tgs['id']) }}" method="POST" enctype="">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label class="font-weight-bold">Tugas</label>
                                <input type="string" class="form-control @error('tugas') is-invalid @enderror" name="tugas" value="{{ old('tugas', $tgs->tugas) }}" placeholder="tugasnya diganti jadi apa ?">
                                @error('tugas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Mapel</label>
                                <input type="string" class="form-control @error('mapel') is-invalid @enderror" name="mapel" value="{{ old('mapel', $tgs->mapel) }}" placeholder="ini tugas untuk mapel apa?">
                            
                                <!-- error message untuk mapel -->
                                @error('mapel')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Noted</label>
                                <input type="string" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ old('note', $tgs->note) }}" placeholder="kasih notes dong!!">
                            
                                <!-- error message untuk note -->
                                @error('note')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
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