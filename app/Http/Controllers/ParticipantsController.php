<?php

namespace App\Http\Controllers;

use App\Participant;
use App\Webinar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Mail\MagangEmail;
use Illuminate\Support\Facades\Mail;

class ParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participant = Participant::all();
        $judulWebinar = Webinar::select('id','judulwebinar')->get();
        return view('/admindashboard', ['participant' => $participant, 'judulWebinar' => $judulWebinar]);
    }

    public function indexparticipant()
    {
        $participant = Participant::all()->unique('email');
    	return view('/adminparticipant', ['participant' => $participant]);
    }

    public function search(Request $request)
    {
        $search = $request->get('id');
        $participant = Participant::where('id_webinar', $search)->get();
        $judulWebinar = Webinar::select('id', 'judulwebinar')->get();
        return view('/admindashboard', ['participant' => $participant, 'judulWebinar' => $judulWebinar]);
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
        $email = $request->email;
        $id_webinar = $request->id_webinar;

        $request->validate([
            'nama' => 'required',
            'institusi' => 'required',
            'nohandphone' => 'required',
            'email' => ['required', Rule::unique('participants')->where(function ($query) use ($email, $id_webinar) {
                return $query->where('email', $email)
                    ->where('id_webinar', $id_webinar);
            })],
            'id_webinar' => 'required',
            'buktipembayaran' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);


        // menyimpan data file yang diupload ke variabel $participant
        $buktipembayaran = $request->file('buktipembayaran');

        $nama_file = time() . "_" . $buktipembayaran->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $buktipembayaran->move($tujuan_upload, $nama_file);

        Participant::create([
            'nama' => $request->nama,
            'institusi' => $request->institusi,
            'nohandphone' => $request->nohandphone,
            'email' => $request->email,
            'id_webinar' => $request->id_webinar,
            'buktipembayaran' => $nama_file
        ]);

        return redirect('/success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
        return view('adminsendlink', compact('participant'));
    }
    public function show1(Participant $participant)
    {
        //
        return view('adminsendcertificate', compact('participant'));
    }
    public function sendToAll()
    {
        $participant = Participant::select('email')->distinct()->get();
        return view('adminsendlink', compact('participant'));
    }

    public function sendByWebinar(Request $request)
    {
        $idWebinar = $request->get('id');
        $participant = Participant::select('email')->where('id_webinar', $idWebinar)->distinct()->get();
        $judulWebinar = Webinar::select('judulwebinar')->where('id', $idWebinar)->first();
        return view('adminsendlink', ['participant' => $participant, 'judulWebinar' => $judulWebinar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }
}
