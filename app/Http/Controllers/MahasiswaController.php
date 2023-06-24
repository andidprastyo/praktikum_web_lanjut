<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Mahasiswa_Matakuliah;
use Illuminate\Support\Facades\Storage;
use PDF;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')) {
            $mahasiswa = Mahasiswa::where('Nama','Like','%'.$request->search.'%')->paginate(10);
        } else {
            $mahasiswa = Mahasiswa::with('kelas')->get();
            $mahasiswa = Mahasiswa::orderBy('id', 'desc')->paginate(10);
        }

        return view('mahasiswas.index', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Kelas = Kelas::all();
        return view('mahasiswas.create', ['Kelas' => $Kelas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Foto' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required'
        ]);

        $mahasiswa = new Mahasiswa;
        $mahasiswa->Nim = $request->get('Nim');
        $mahasiswa->Nama = $request->get('Nama');
        $mahasiswa->Foto = $request->get('Foto');
        $mahasiswa->Jurusan = $request->get('Jurusan');
        $mahasiswa->No_Handphone = $request->get('No_Handphone');

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');
        $mahasiswa->kelas()->associate($kelas);        

        if($request->file('Foto')) {
            $image_name = $request->file('Foto')->store('images', 'public');
            $mahasiswa->Foto = $image_name;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Display the specified resource.
     */
    public function show($Nim)
    {
        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();

        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Mahasiswa = Mahasiswa::with('kelas')->where('id', $id)->first();
        $Kelas = Kelas::all();

        return view('mahasiswas.edit', compact('Mahasiswa', 'Kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Foto' => 'required',
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->Nim = $request->get('Nim');
        $mahasiswa->Nama = $request->get('Nama');
        $mahasiswa->Foto = $request->get('Foto');
        $mahasiswa->Jurusan = $request->get('Jurusan');
        $mahasiswa->No_Handphone = $request->get('No_Handphone');

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');
        $mahasiswa->kelas()->associate($kelas);        

        if($mahasiswa->Foto && file_exists(storage_path('app/public/' . $mahasiswa->Foto))) {
            Storage::delete('public/' . $mahasiswa->Foto);
        }
        $image_name = $request->file('Foto')->store('images', 'public');
        $mahasiswa->Foto = $image_name;
        
        $mahasiswa->save();

        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mahasiswa::find($id)->delete();
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }

    /**
     * Display the specified resource.
     */
    public function nilai(string $Nim)
    {
        $Mahasiswa = Mahasiswa::with('kelas', 'matakuliah')->where('Nim', $Nim)->first();

        return view('mahasiswas.nilai', compact('Mahasiswa'));
    }

    /**
     * Display the specified resource.
     */
    public function khs(string $Nim)
    {
        $Mahasiswa = Mahasiswa::with('matakuliah')->where('Nim', $Nim)->first();
        $pdf = PDF::loadview('mahasiswas.khs', ['mahasiswa' => $Mahasiswa]);
        return $pdf->stream();
    }
}
