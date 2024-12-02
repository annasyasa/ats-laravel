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
                        <form action="{{ route('users.update', $users['id']) }}" method="POST" enctype="">
                            @csrf
                            @method('PATCH')

                            <div class="d-flex">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $users['name']}}">
                            </div>
                           @error('name')
                              <small class="text-danger">{{$message}}</small>>
                           @enderror
                           <div class="d-flex">
                           <label for="email" class="form-label">Email</label>
                                    {{-- old: mengambil isi input sebelum submit --}}
                                    <input type="text" name="email" id="email" class="form-control" value="{{ $users['email']}}">
                                </div>
                                @error('email')
                                <small class="text-danger">{{$message}}</small>>
                             @enderror
                             <div class="d-flex">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select">
                                <option hidden selected disabled>Pilih</option>
                                <option value="Guru" {{$users['role']=='Guru'?'selected': ''}}>Guru</option>
                                <option value="Murid" {{$users['role']=='Murid'?'selected': ''}}>Murid</option>
                            </select>
                        </div>
                           @error('role')
                               <small class="text-danger">{{$message}}</small>>
                           @enderror
                        
                        <div class="d-flex">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name="password" id="password" class="form-control" >
                        </div>
                            @error('password')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Kirim Data</button>
                        </form>
                        </div>
                        </form>
                        @endsection
                        