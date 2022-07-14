<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftar_unit;
use App\Models\Anggota;
use App\Models\BayarTaliasih;

class BayarTaliasihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request) {
            $byr = BayarTaliasih::where('daftar_unit_id', 'like', '%' .$request->search. '%')->take(1)->latest()->get();
        }else {
            $byr = BayarTaliasih::where('created_at')->take(1)->latest();
        }
        $unit = Daftar_unit::all();
        $anggota = Anggota::all();
        return view('taliasih.create-taliasih', compact('byr', 'unit', 'request', 'anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Daftar_unit::all();
        return view('taliasih.create-taliasih', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BayarTaliasih::create([
            'daftar_unit_id' => $request->daftar_unit_id,
            
        ]);
            
            return redirect('/create-taliasih');
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
