@extends('layouts.layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Mahasiswa
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('mahasiswas.update', $Mahasiswa->id) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Nim">Nim</label><br>
                            <input type="text" name="Nim" class="form-control" id="Nim"
                                value="{{ $Mahasiswa->Nim }}" ariadescribedby="Nim">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label><br>
                            <input type="text" name="Nama" class="form-control" id="Nama"
                                value="{{ $Mahasiswa->Nama }}" ariadescribedby="Nama">
                        </div>
                        <div class="form-group">
                            <label for="Kelas">Kelas</label><br>
                            <select name="Kelas" id="Kelas" class="form-control">
                                @foreach ($Kelas as $kelas)
                                    <option value="{{ $kelas->id }}" {{ $Mahasiswa->kelas_id == $kelas->id ? 'selected' : '' }}>{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Jurusan">Jurusan</label><br>
                            <input type="Jurusan" name="Jurusan" class="form-control" id="Jurusan"
                                value="{{ $Mahasiswa->Jurusan }}" ariadescribedby="Jurusan">
                        </div>
                        <div class="form-group">
                            <label for="No_Handphone">No_Handphone</label><br>
                            <input type="No_Handphone" name="No_Handphone" class="form-control" id="No_Handphone"
                                value="{{ $Mahasiswa->No_Handphone }}" ariadescribedby="No_Handphone">
                        </div>
                        <div class="form-group">
                            <label for="Foto">Foto</label>
                            <input type="file" class="form-control mb-2" name="Foto" value="{{$Mahasiswa->Foto}}">
                            <img width="150px" src="{{asset('storage/'.$Mahasiswa->Foto)}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
