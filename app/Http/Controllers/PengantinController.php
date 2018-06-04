<?php

namespace App\Http\Controllers;

use App\Pengantin;
use Illuminate\Http\Request;
use App\Organizer;
use Session;
use App\Pesanan;
class PengantinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $p = Pengantin::with('Organizer')->get();
        return view('pengantin.index',compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $o = Organizer::all();
        $ps = Pesanan::all();
        return view('pengantin.create',compact('o','ps'));
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
            'nama_mempelai_pria' => 'required|',
            'nama_mempelai_wanita' => 'required|',
            'tanggal_pernikahan' => 'required|',
            'no_telepon' => 'required|unique:pengantins',
            'id_organizer' => 'required',
            'pesanan' => 'required'
        ]);
        $p = new Pengantin;
        $p->nama_mempelai_pria = $request->nama_mempelai_pria;
        $p->nama_mempelai_wanita = $request->nama_mempelai_wanita;
        $p->tanggal_pernikahan = $request->tanggal_pernikahan;
        $p->no_telepon = $request->no_telepon;
        $p->id_organizer = $request->id_organizer;
        $p->save();
        // attach fungsinya untuk melampirkan data,yang dilampirkan disini ialah data dari method Pesanan
        //  yang ada di model pengantin
        $p->Pesanan()->attach($request->pesanan);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$p->nama_mempelai_pria</b>"
        ]);
        return redirect()->route('pengantin.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengantin  $pengantin
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $p = Pengantin::findOrFail($id);
        return view('pengantin.show',compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengantin  $pengantin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = Pengantin::findOrFail($id);
        $o = Organizer::all();
        $selectedo = Pengantin::findOrFail($id)->id_organizer;
        $selected = $p->Pesanan->pluck('id')->toArray();
        $ps = Pesanan::all();
        // dd($selected);
        return view('pengantin.edit',compact('p','o','selectedo','selected','ps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengantin  $pengantin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_mempelai_pria' => 'required|',
            'nama_mempelai_wanita' => 'required|',
            'tanggal_pernikahan' => 'required|',
            'no_telepon' => 'required|unique:pengantins',
            'id_organizer' => 'required',
            'pesanan' => 'required'
        ]);
        $p = Pengantin::findOrFail($id);
        $p->nama_mempelai_pria = $request->nama_mempelai_pria;
        $p->nama_mempelai_wanita = $request->nama_mempelai_wanita;
        $p->tanggal_pernikahan = $request->tanggal_pernikahan;
        $p->no_telepon = $request->no_telepon;
        $p->id_organizer = $request->id_organizer;
        $p->save();
        $p->Pesanan()->sync($request->pesanan);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$p->nama_mempelai_pria</b>"
        ]);
        return redirect()->route('pengantin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengantin  $pengantin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Pengantin::findOrFail($id);
        $p->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('pengantin.index');
    }
}
