@extends('template.app', ['title' => 'Tugas || ROMBEL'])

@section('content-dinamis')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elefiveer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">TUGAS PPLG SELASMA</h3>        
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('tgs.create') }}" class="btn btn-md btn-success mb-3">+ TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tugas</th>
                                <th scope="col">Mapel</th>
                                <th scope="col">Noted</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                             @if(count($tugas)> 0)
                              @foreach ($tugas as $index => $tgs)
                                <tr>
                                    <td>{{ ($tugas->currentPage() - 1) * $tugas->perpage() + ($index + 1) }}</td>
                                    <td>{{ $tgs->tugas }}</td>
                                    <td>{{ $tgs->mapel }}</td>
                                    <td>{{ $tgs->note }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tgs.delete', $tgs['id']) }}" method="POST">
                                            <a href="{{ route('tgs.show', $tgs->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('tgs.edit', $tgs->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                              @else
                                  <div class="alert alert-danger">
                                      Data belum Tersedia.
                                  </div>
                              @endif
                            </tbody>
                          </table>  
                          {{ $tugas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>
@endsection