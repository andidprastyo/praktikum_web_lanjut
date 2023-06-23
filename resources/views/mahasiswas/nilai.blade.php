@extends('layouts.layout')
@section('content')
    <div class="mt-2 mb-5 d-flex justify-content-center align-items-center flex-column">
        <h2 class="mb-5">JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        <h1>KARTU HASIL STUDI (KHS)</h1>
    </div>
    <table class="mb-3">
        <tr>
            <td><h5><b>Nama</b></h5></td>
            <td><h5>: {{ $mahasiswa->Nama }}</h5></td>
        </tr>
        <tr>
            <td><h5><b>NIM</b></h5></td>
            <td><h5>: {{ $mahasiswa->Nim }}</h5></td>
        </tr>
        <tr>
            <td><h5><b>Kelas</b></h5></td>
            <td><h5>: {{ $mahasiswa->kelas->nama_kelas }}</h5></td>
        </tr>
    </table>
    <table class="table table-bordered">
        <tr>
            <th style="width: 500px"><p><b>Mata Kuliah</b></p></th>
            <th><p><b>SKS</b></p></th>
            <th><p><b>Semester</b></p></th>
            <th><p><b>Nilai</b></p></th>
        </tr>
        @foreach ($mahasiswaMatakuliah as $item)
        <tr>
            <td>{{ $item->matakuliah->nama_matkul }}</td>
            <td>{{ $item->matakuliah->sks }}</td>
            <td>{{ $item->matakuliah->semester }}</td>
            <td>{{ $item->nilai }}</td>
        </tr>
        @endforeach
    </table>
@endsection
