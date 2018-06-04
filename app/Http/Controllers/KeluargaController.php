<?php

namespace App\Http\Controllers;

use App\Keluarga;
use App\Pengantin;
use Illuminate\Http\Request;
use Session;
class KeluargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
         $k = Keluarga::with('Pengantin')->get();
        return view('keluarga.index',compact('k'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $p = Pengantin::all();
        return view('keluarga.create',compact('p'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'nama_kepala_keluarga' => 'required|',
            'alamat' => 'required|',
            'agama' => 'required|',
            'no_telepon' => 'required|',
            'id_pengantin' => 'required'
        ]);
        $k = new Keluarga;
        $k->nama_kepala_keluarga = $request->nama_kepala_keluarga;
        $k->alamat = $request->alamat;
        $k->agama = $request->agama;
        $k->no_telepon = $request->no_telepon;
        $k->id_pengantin = $request->id_pengantin;
        $k->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$k->nama_kepala_keluarga</b>"
        ]);
        return redirect()->route('keluarga.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $k = Keluarga::findOrFail($id);
        return view('keluarga.show',compact('k'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        $k = Keluarga::findOrFail($id);
        $p = Pengantin::all();
        $selectedp = Keluarga::findOrFail($id)->id_pengantin;
        return view('keluarga.edit',compact('p','k','selectedp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_kepala_keluarga' => 'required|',
            'alamat' => 'required|',
            'agama' => 'required|',
            'no_telepon' => 'required|',
            'id_pengantin' => 'required'
        ]);
        $k = Keluarga::findOrFail($id);
        $k->nama_kepala_keluarga = $request->nama_kepala_keluarga;
        $k->alamat = $request->alamat;
        $k->agama = $request->agama;
        $k->no_telepon = $request->no_telepon;
        $k->id_pengantin = $request->id_pengantin;
        $k->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$k->nama_kepala_keluarga</b>"
        ]);
        return redirect()->route('keluarga.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $k = Keluarga::findOrFail($id);
        $k->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('keluarga.index');
    }
}
