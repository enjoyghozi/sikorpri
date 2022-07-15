<?php

namespace App\Http\Controllers;

use App\Models\Daftar_unit;
use App\Models\Purnatugas;
use Illuminate\Http\Request;

class PurnatugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Daftar_unit::all();
        $purna = Purnatugas::all();
        return view('purnatugas.purnatugas', compact('purna', 'unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $nm = $request->bukti;
        $namaFile = time().rand(100,999).".".$namaFile = $nm->getClientOriginalName();

        $purna = new Purnatugas;
        $purna ->nama_anggota = $request->nama_anggota;
        $purna ->nip = $request->nip;
        $purna ->unit = $request->nama_unit;
        $purna ->bukti = $namaFile;

        $nm->move(public_path().'/img', $namaFile);
        $purna->save();
        
            
        return redirect('/purnatugas')->with('toast_success', 'Berhasil Menyimpan Transaksi!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
