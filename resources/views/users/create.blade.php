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
                        <form action="{{ route('users.add.store') }}" method="POST" enctype="">

                            @if (Session::get('failed'))
                            <div class="alert alert-danger">{{Session::get('failed')}}
                            </div>
                        @endif
                        {{-- munculin error dari $request->validate --}}
                        @if ($errors->any())
                         <div class="alert alert-danger">
                            <ol>
                                @foreach ($errors->all() as $error)
                                  <li>{{$error}}</li>
                                @endforeach
                            </ol>
                         </div>
                        @endif
                        
                            @csrf

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="name" class="form-label">Nama</label>
                                    {{-- old: mengambil isi input sebelum submit --}}
                                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                                </div>
                                <label for="email" class="form-label">Email</label>
                                {{-- old: mengambil isi input sebelum submit --}}
                                <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
                            </div>
                            <div class="form-group">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-select">
                                    <option hidden selected disabled>Pilih</option>
                                    <option value="Guru" {{old('role')=='Guru'?'selected': ''}}>Guru</option>
                                    <option value="Murid" {{old('role')=='Murid'?'selected': ''}}>Murid</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" name="password" id="password" class="form-control" value="{{ old('password') }}">
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