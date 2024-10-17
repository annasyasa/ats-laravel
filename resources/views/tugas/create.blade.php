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
                        <form action="{{ route('tgs.store') }}" method="POST" enctype="">
                        
                            @csrf


                            <div class="form-group">
                                <label class="font-weight-bold">Tugas</label>
                                <input type="text" class="form-control @error('tugas') is-invalid @enderror" name="tugas" value="{{ old('tugas') }}" placeholder="Ada tugas apa nih ??">
                            
                                <!-- error message untuk title -->
                                @error('tugas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Mapel</label>
                                <textarea class="form-control @error('mapel') is-invalid @enderror" name="mapel" rows="5" placeholder="Masukkan mapel">{{ old('mapel') }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('mapel')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Noted</label>
                                <textarea class="form-control @error('note') is-invalid @enderror" name="note" rows="5" placeholder="notenya apaa">{{ old('note') }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('note')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
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