<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Daftar_unit;
use App\Models\Anggota;
use App\Models\DetailPembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request) {
            $pembayaran = Pembayaran::where('daftar_unit_id', 'like', '%' .$request->search. '%')->take(1)->latest()->get();
        }else {
            $pembayaran = Pembayaran::where('created_at')->take(1)->latest();
        }
        $unit = Daftar_unit::all();
        $anggota = Anggota::all();
        return view('pembayaran.pembayaran', compact('pembayaran', 'unit', 'request', 'anggota'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Daftar_unit::all();
        return view('pembayaran.create-pembayaran', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pembayaran::create([
            'daftar_unit_id' => $request->daftar_unit_id,
            'rincian_pembayaran' => $request->rincian_pembayaran,
            
        ]);
            
            return redirect('/pembayaran')->with('toast_success', 'Berhasil menyimpan Anggota!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = Anggota::where('daftar_unit_id', $id)->get();
        $pembayaran = Pembayaran::where('daftar_unit_id')->take(1);
        return view ('pembayaran.show-pembayaran', compact('anggota', 'pembayaran'));
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
