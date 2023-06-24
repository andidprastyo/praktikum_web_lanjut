@extends('layouts.layout')
@section('content')
    <div class="mt-2 mb-5 d-flex justify-content-center align-items-center flex-column">
        <h2 class="mb-5">JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        <h1>KARTU HASIL STUDI (KHS)</h1>
    </div>
    <table class="mb-3">
        <tr>
            <td><h5><b>Nama</b></h5></td>
            <td><h5><b>:</b></h5></td>
            <td><h5>{{ $Mahasiswa->Nama }}</h5></td>
        </tr>
        <tr>
            <td><h5><b>NIM</b></h5></td>
            <td><h5><b>:</b></h5></td>
            <td><h5>{{ $Mahasiswa->Nim }}</h5></td>
        </tr>
        <tr>
            <td><h5><b>Kelas</b></h5></td>
            <td><h5><b>:</b></h5></td>
            <td><h5>{{ $Mahasiswa->kelas->nama_kelas }}</h5></td>
        </tr>
    </table>
    <table class="table table-bordered">
        <tr>
            <th style="width: 500px"><p class="m-0"><b>Mata Kuliah</b></p></th>
            <th><p class="m-0"><b>SKS</b></p></th>
            <th><p class="m-0"><b>Semester</b></p></th>
            <th><p class="m-0"><b>Nilai</b></p></th>
        </tr>
        @foreach ($Mahasiswa->matakuliah as $item)
            <tr>
                <td>{{ $item->nama_matkul }}</td>
                <td>{{ $item->sks }}</td>
                <td>{{ $item->semester }}</td>
                <td>{{ $item->pivot->nilai }}</td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center mt-5">
        <a href="{{ route('mahasiswas.khs', $Mahasiswa->Nim) }}" class="btn-lg text-decoration-none text-white font-weight-bold border border-danger rounded-0 shadow" style="background-image: linear-gradient(rgba(220, 53, 69, .5), #dc3545)">Cetak ke PDF</a>
    </div>
@endsection
