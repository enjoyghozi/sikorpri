<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taliasih;

class TaliasihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dttaliasih = Taliasih::paginate(10); 
        return view('taliasih.taliasih', compact('dttaliasih'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taliasih.create-taliasih');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        Taliasih::create([
            'unit' => $request->unit,
            'tanggal' => $request->tanggal,
            'nominal' => $request->nominal,
        ]);

        return redirect('taliasih');
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
}
