<?php

namespace App\Http\Controllers;

use App\participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = participant::all();
        return View('participants.index')->with('info', $info);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(participant $participant)
    {
        $x = participant::find($id);
        $x->delete();
        
        $request->session()->flash('message', 'Successfully Deleted Participants info !');
        return Redirect('participants');
    }

    public $successStatus = 200;

    public function apiParticipants()
    {
        $eventlist = participant::all();
        return response()->json(['data' =>  $eventlist,  ]);
    }


    public function apiParticipantsRegister(Request $request)
    {
       
                $x = new participant;
                $x->name               =       $request->input('name');
                $x->rollno               =       $request->input('rollno');
                $x->mobile               =       $request->input('mobile');
                $x->email               =       $request->input('email');
                $x->event_id               =       $request->input('event_id');
                $x->message               =       $request->input('message');
                $x->drive_link               =       $request->input('drive_link');
                $x->extra1               =       $request->input('extra1');
                $x->uploaded_by               =      'scoit page user directly';
                $x->save();
            
        

                return response()->json(['data' =>  'Registered for the event successfully',  ]);
    }
}
