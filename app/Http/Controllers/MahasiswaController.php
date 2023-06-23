<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Mahasiswa_Matakuliah;

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
            'kelas_id' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required'
        ]);

        // $mahasiswa = new Mahasiswa;
        // $mahasiswa->Nim = $request->get('Nim');
        // $mahasiswa->Nama = $request->get('Nama');
        // $mahasiswa->Jurusan = $request->get('Jurusan');
        // $mahasiswa->No_Handphone = $request->get('No_Handphone');
        // $mahasiswa->save();

        // $kelas = new Kelas;
        // $kelas->id = $request->get('Kelas');

        // $mahasiswa->kelas()->associate($kelas);
        // $mahasiswa->save();

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswaMatakuliah = Mahasiswa_Matakuliah::where('mahasiswa_id', $mahasiswa->id)->get();

        return view('mahasiswas.nilai', compact('mahasiswa', 'mahasiswaMatakuliah'));
    }

    /**
     * Display the specified resource.
     */
    public function detail($Nim)
    {
        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();

        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Nim)
    {
        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
        $Kelas = Kelas::all();

        return view('mahasiswas.edit', compact('Mahasiswa', 'Kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Nim)
    {
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'kelas_id' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
        ]);

        Mahasiswa::find($Nim)->update($request->all());

        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nim)
    {
        Mahasiswa::find($Nim)->delete();
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
