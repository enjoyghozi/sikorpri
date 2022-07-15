<?php

namespace App\Http\Controllers;

use App\Exports\UnitExport;
use App\Imports\UnitImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Anggota;

use App\Models\Daftar_unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $daftar_unit = Daftar_unit::get();
        return view('unit.unit', compact('daftar_unit'));
    }

    public function unitexport() {
        return Excel::download(new UnitExport,'unit.xlsx');
    }

    public function unitimportexcel(Request $request) {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataUnit', $namaFile);

        Excel::import(new UnitImport, public_path('/DataUnit/'.$namaFile));
        return redirect('/unit');
    }

    public function create()
    {
        return view ('unit.create-unit');
    }

    public function edit($id)
    {
        $daftar_unit = Daftar_unit::findorfail($id);
        return view ('unit.edit-unit', compact('daftar_unit'));
    }

    public function update (Request $request, $id)
    {
        $daftar_unit = Daftar_unit::findorfail($id);
        $daftar_unit-> update($request->all());
        return redirect('/unit')->with('toast_success', 'Berhasil mengubah unit!');

    }

    public function destroy($id)
    {
        $daftar_unit = Daftar_unit::findorfail($id);
        $daftar_unit->delete();
        return back();
    }

    public function show ($id)
    {
        $anggota = Anggota::where('daftar_unit_id', $id)->get();
        return view ('unit.show-unit', compact('anggota'));
    }


    public function store (Request $request)
    {
        // dd($request->all());
        Daftar_unit::create([
            'nama' => $request->nama,
            
        ]);
            
        return back()->with('toast_success', 'Berhasil menyimpan unit!');;
    }

    public function cetakunit(Request $request)
    {
        $cetakUnit = Daftar_unit::all();
        return view ('unit.cetak-unit', compact('cetakUnit'));
    }

    public function cetakAnggotaperunit($id)
    {
        $cetakAnggota = Anggota::where('daftar_unit_id', $id)->get();
        return view ('unit.cetak-anggotaperunit', compact('cetakAnggota'));
    }

}
