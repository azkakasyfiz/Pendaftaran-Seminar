<?php

namespace App\Http\Controllers;

use App\Webinar;
use Illuminate\Http\Request;

class WebinarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $webinar = Webinar::all();
        $webinarLatest = Webinar::orderBy('created_at', 'desc')->limit(1)->first();
    	return view('main', ['webinar' => $webinar, 'webinarLatest' => $webinarLatest]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judulwebinar' => 'required',
            'platform' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'keterangan1' => '',
            'keterangan2' => '',
            'poster' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'linkmateri' => 'required'
        ]);


        // menyimpan data file yang diupload ke variabel $participant
        $poster = $request->file('poster');

        $nama_file = time() . "_" . $poster->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_poster';
        $poster->move($tujuan_upload, $nama_file);

        Webinar::create([
            'judulwebinar' => $request->judulwebinar,
            'platform' => $request->platform,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'keterangan1' => $request->keterangan1,
            'keterangan2' => $request->keterangan2,
            'poster' => $nama_file,
            'linkmateri' => $request->linkmateri
        ]);

        return redirect('/admindashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function show(Webinar $webinar)
    {
        //
        return view('join',compact('webinar'));
    }

    public function input(Webinar $webinar)
    {
        //
        return view('admininputwebinar',compact('webinar'));
    }

    public function detail(Webinar $webinar)
    {
        //
        return view('detail',compact('webinar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function edit(Webinar $webinar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Webinar $webinar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webinar $webinar)
    {
        //
    }
}
