@extends('template.app', ['title' => 'Tampilan Tugas || ROMBEL'])

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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                   <div id="back-wrap">
                      <a href="{{ route('tugas.index')}}" class="btn-back">Kembali</a>
                   </div>
                   <div id="receipt">
                    <a href="{{ route('download', $tgs['id'])}}" class="btn-print">Cetak (.pdf)</a>
                   </div>
                    <div class="card-body">
                        <h4>Tugas : {{ $tgs['tugas'] }}</h4>
                        <h4>Mata Pelajaran :{{ $tgs['mapel'] }}</h4>
                        <h4>Deskripsi Tugas :{{ $tgs['note'] }}</h4>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

@endsection
