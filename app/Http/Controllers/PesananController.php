<?php

namespace App\Http\Controllers;

use App\Pesanan;
use Illuminate\Http\Request;
use Session;
class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ps = Pesanan::paginate(10);
        return view('Pesanan.index',compact('ps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pesanan.create');
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
            'total_pesanan' => 'required|',
            'uang_muka' => 'required|',
            'sisa_bayar' => 'required|',
            'tanggal_pesan' => 'required|',
        ]);
        $ps = new Pesanan;
        $ps->total_pesanan = $request->total_pesanan;
        $ps->uang_muka = $request->uang_muka;
        $ps->sisa_bayar = $request->sisa_bayar;
        $ps->tanggal_pesan = $request->tanggal_pesan;
        $ps->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$ps->total_pesanan</b>"
        ]);
        return redirect()->route('pesanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ps = Pesanan::findOrFail($id);
        return view('pesanan.show',compact('ps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ps = Pesanan::findOrFail($id);
        return view('pesanan.edit',compact('ps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'total_pesanan' => 'required|',
            'uang_muka' => 'required|',
            'sisa_bayar' => 'required|',
            'tanggal_pesan' => 'required|',      
      ]);
        $ps = Pesanan::findOrFail($id);
        $ps->total_pesanan = $request->total_pesanan;
        $ps->uang_muka = $request->uang_muka;
        $ps->sisa_bayar = $request->sisa_bayar;
        $ps->tanggal_pesan = $request->tanggal_pesan;
        $ps->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$ps->total_pesanan</b>"
        ]);
        return redirect()->route('pesanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $ps = Pesanan::findOrFail($id);
        $ps->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('pesanan.index');
    }
}
