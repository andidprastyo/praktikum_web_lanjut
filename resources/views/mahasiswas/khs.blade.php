@extends('layouts.layout')
@section('content')
    <div class="mt-2 mb-5 d-flex justify-content-center align-items-center flex-column">
        <h5 class="mb-5">JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h5>
        <h4 style="line-height: 0">KARTU HASIL STUDI (KHS)</h4>
    </div>
    <table class="mb-3">
        <tr>
            <td><p style="line-height: 0.2"><b>Nama</b></p></td>
            <td><p style="line-height: 0.2"><b>:</b></p></td>
            <td><p style="line-height: 0.2">{{ $mahasiswa->Nama }}</p></td>
        </tr>
        <tr>
            <td><p style="line-height: 0.2"><b>NIM</b></p></td>
            <td><p style="line-height: 0.2"><b>:</b></p></td>
            <td><p style="line-height: 0.2">{{ $mahasiswa->Nim }}</p></td>
        </tr>
        <tr>
            <td><p style="line-height: 0.2"><b>Kelas</b></p></td>
            <td><p style="line-height: 0.2"><b>:</b></p></td>
            <td><p style="line-height: 0.2">{{ $mahasiswa->kelas->nama_kelas }}</p></td>
        </tr>
    </table>
    <table class="table table-bordered">
        <tr>
            <th><p class="m-0"><b>Mata Kuliah</b></p></th>
            <th><p class="m-0"><b>SKS</b></p></th>
            <th><p class="m-0"><b>Semester</b></p></th>
            <th><p class="m-0"><b>Nilai</b></p></th>
        </tr>
        @foreach ($mahasiswa->matakuliah as $item)
            <tr>
                <td>{{ $item->nama_matkul }}</td>
                <td>{{ $item->sks }}</td>
                <td>{{ $item->semester }}</td>
                <td>{{ $item->pivot->nilai }}</td>
            </tr>
        @endforeach
    </table>
@endsection
