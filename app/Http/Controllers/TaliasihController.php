<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taliasih;
use App\Models\Daftar_unit;
use App\Models\Anggota;
use App\Models\BayarTaliasih;
use App\Models\Pembayaran;


class TaliasihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dttaliasih = Taliasih::latest()->get(); 
        return view('taliasih.taliasih', compact('dttaliasih'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request) {
            $byr = BayarTaliasih::where('daftar_unit_id', 'like', '%' .$request->search. '%')->take(1)->latest()->get();
        }else {
            $byr = BayarTaliasih::where('created_at')->take(1)->latest();
        }
        $unit = Daftar_unit::all();
        $anggota = Anggota::all();
        return view('taliasih.create-taliasih', compact('unit','byr', 'request','anggota'));
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

            $dtTaliasih = new Taliasih;
            $dtTaliasih->nama_unit = $request->unit;
            $dtTaliasih->jumlah_anggota = $request->jumlah_anggota;
            $dtTaliasih->total = $request->total;
            $dtTaliasih->foto = $namaFile;

            $nm->move(public_path().'/img', $namaFile);
            $dtTaliasih->save();

            return redirect()->back()->with('toast_success', 'Berhasil Menyimpan Taliasih!');
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
        $tasih = Taliasih::findorfail($id);
        return view('taliasih.edit-taliasih', compact('tasih'));
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
        $tasih = Taliasih::findorfail($id);
        $tasih->update($request->all());

        return redirect('taliasih')->with('toast_success', 'Data Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasih = Taliasih::findorfail($id);
        $tasih->delete();
        return back();
    }

    public function cetakTaliasihPertanggal($tglawal, $tglakhir){
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakTaliasih = Taliasih::whereBetween('created_at', [$tglawal, $tglakhir])->get();
        return view ('taliasih.cetak-taliasih', compact('cetakTaliasih'));
    }
}
