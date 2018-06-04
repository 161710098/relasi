<?php

namespace App\Http\Controllers;

use App\Organizer;
use Illuminate\Http\Request;
use Session;
class OrganizerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $a = Organizer::all();
        return view('organizer.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizer.create');
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
            'nama_paket' => 'required|unique:organizers',
            'harga' => 'required|',
            'email' => 'required|unique:organizers',
            'no_telepon' => 'required|unique:organizers'
        ]);
        $a = new Organizer;
        $a->nama_paket = $request->nama_paket;
        $a->harga = $request->harga;
        $a->email = $request->email;
        $a->no_telepon = $request->no_telepon;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$a->nama_paket</b>"
        ]);
        return redirect()->route('organizer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a = Organizer::findOrFail($id);
        return view('organizer.show',compact('a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $a = Organizer::findOrFail($id);
        return view('organizer.edit',compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_paket' => 'required|',
            'harga' => 'required|',
            'email' => 'required|',
            'no_telepon' => 'required|'
        ]);
        $a = Organizer::findOrFail($id);
        $a->nama_paket = $request->nama_paket;
        $a->harga = $request->harga;
        $a->email = $request->email;
        $a->no_telepon = $request->no_telepon;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$a->nama</b>"
        ]);
        return redirect()->route('organizer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $a = Organizer::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('organizer.index');
    }
}
