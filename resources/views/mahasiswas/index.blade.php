@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2 mb-5 d-flex justify-content-center">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" name="search">
                        <button class="input-group-text btn btn-primary">Search</button>
                    </div>
                </form>

                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('mahasiswas.create') }}"> Input Mahasiswa</a>
                </div>
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
            <th>Nim</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($mahasiswa as $Mahasiswa)
            <tr>
                <td>{{ $Mahasiswa->Nim }}</td>
                <td>{{ $Mahasiswa->Nama }}</td>
                <td><img width="100px" src="{{asset('storage/'.$Mahasiswa->Foto)}}"></td>
                <td>{{ $Mahasiswa->kelas->nama_kelas }}</td>
                <td>{{ $Mahasiswa->Jurusan }}</td>
                <td>
                    <form action="{{ route('mahasiswas.destroy', $Mahasiswa->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('mahasiswas.show', $Mahasiswa->Nim) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('mahasiswas.edit', $Mahasiswa->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger confirm-delete">Delete</button>
                        <a class="btn btn-warning" href="{{ route('mahasiswas.nilai', $Mahasiswa->Nim) }}">Nilai</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection