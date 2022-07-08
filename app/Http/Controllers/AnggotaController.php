<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Golongan;
use App\Models\Daftar_unit;
use Illuminate\Http\Request;
use App\Exports\AnggotaExport;
use App\Imports\AnggotaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $anggota = Anggota::latest()->get();
        return view ('anggota.anggota', compact('anggota'));
    }

    public function anggotaexport() {
        return Excel::download(new AnggotaExport,'anggota.xlsx');
    }

    public function anggotaimportexcel(Request $request) {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataAnggota', $namaFile);

        Excel::import(new AnggotaImport, public_path('/DataAnggota/'.$namaFile));
        return redirect('anggota');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongan = Golongan::all();
        $unit = Daftar_unit::all();
        return view('anggota.create-anggota', compact('golongan', 'unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Anggota::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'golongan_id' => $request->golongan_id,
            'nominal' => $request->nominal,
            'daftar_unit_id' => $request->daftar_unit_id,
            
        ]);
            
            return redirect('/anggota')->with('toast_success', 'Berhasil menyimpan Anggota!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Daftar_unit::all();
        $anggota = Anggota::findorfail($id);
        $golongan = Golongan::all();
        return view ('anggota.edit-anggota', compact('anggota', 'unit', 'golongan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $anggota = Anggota::findorfail($id);
        $anggota-> update($request->all());
        return redirect('/anggota')->with('toast_success', 'Berhasil mengubah anggota!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::findorfail($id);
        $anggota->delete();
        return back();
        // return redirect('/anggota')->with('toast_success', 'Berhasil mengubah anggota!');

    }
}
