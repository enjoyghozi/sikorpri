<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtTransaksi = Transaksi::latest()->get();
        return view('transaksi.transaksi', compact('dtTransaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $nm = $request->foto;
        $namaFile = time().rand(100,999).".".$namaFile = $nm->getClientOriginalName();

            $dtTransaksi = new Transaksi;
            $dtTransaksi->nama_unit = $request->namaunit;
            $dtTransaksi->total_pembayaran = $request->total;
            $dtTransaksi->tanggal_pembayaran = $request->tanggal;
            $dtTransaksi->foto_bukti = $namaFile;

            $nm->move(public_path().'/img', $namaFile);
            $dtTransaksi->save();

            return redirect('transaksi')->with('toast_success', 'Berhasil Menyimpan Transaksi!');
    
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