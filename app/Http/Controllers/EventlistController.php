<?php

namespace App\Http\Controllers;

use App\eventlist;
use Illuminate\Http\Request;

class EventlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventlist = eventlist::all();

        return View('eventlist.index')
            ->with('eventlist', $eventlist);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventlist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($files=$request->file('images')){
            foreach($files as $file){
                //$name=$file->getClientOriginalName();
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                //$picture = date('His').$filename;

                $picture = md5($filename).date('His').".".$extension;
                $year = date('Y');
                $month = date('M');
                $day = date('d');
                $fileloc = "uploads/events/y".$year."/m".$month."/d".$day;
                $file->move($fileloc,$picture);
                $images[]=$picture;

                $imageurl = URL('/')."/".$fileloc."/".$picture;

                $x = new eventlist;
                $x->title                =       $request->input('title');
                $x->introduction                =       $request->input('introduction');
                $x->date                =       $request->input('date');
                $x->timming                =       $request->input('timming');
                $x->venue                =       $request->input('venue');
                $x->problem_statement                =       $request->input('problem_statement');
                $x->rules                =       $request->input('rules');
                $x->procedure                =       $request->input('procedure');
                $x->contact                =       $request->input('contact');
                $x->uploaded_by                =       $request->input('uploaded_by');
                $x->type                =       $request->input('type');
                $x->image                =       $imageurl;
                $x->save();
            }
        } else {
                $x = new eventlist;
                $x->title                =       $request->input('title');
                $x->introduction                =       $request->input('introduction');
                $x->date                =       $request->input('date');
                $x->timming                =       $request->input('timming');
                $x->venue                =       $request->input('venue');
                $x->problem_statement                =       $request->input('problem_statement');
                $x->rules                =       $request->input('rules');
                $x->procedure                =       $request->input('procedure');
                $x->contact                =       $request->input('contact');
                $x->uploaded_by                =       $request->input('uploaded_by');
                $x->type                =       $request->input('type');
                $x->image                =       '';
                $x->save();
        }
    

            

            $request->session()->flash('message', 'Successfully Created new Event!');
            return Redirect('eventlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\eventlist  $eventlist
     * @return \Illuminate\Http\Response
     */
    public function show(eventlist $eventlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\eventlist  $eventlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, eventlist $eventlist)
    {
        $request->session()->flash('message', 'Not Allowed, please re insert!');
        return Redirect('eventlist');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\eventlist  $eventlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, eventlist $eventlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\eventlist  $eventlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $eventlist)
    {
        $x = eventlist::find($eventlist);
        $x->delete();
        
        $request->session()->flash('message', 'Successfully Deleted the Event!');
        return Redirect('eventlist');
    }




    public $successStatus = 200;

    public function apiCollegeEvents()
    {
        $eventlist = eventlist::where('type', '=', 'college')->get();
        return response()->json(['data' =>  $eventlist,  ]);
    }

    public function apiCollegeEventsDetails(Request $request, $id)
    {
        $eventlist = eventlist::find($id);
        return response()->json(['data' =>  $eventlist,  ]);
    }

    public function apiHostelEvents()
    {
        $eventlist = eventlist::where('type', '=', 'hostel')->get();
        return response()->json(['data' =>  $eventlist,  ]);
    }

    public function apiHostelEventsDetails(Request $request, $id)
    {
        $eventlist = eventlist::find($id);
        return response()->json(['data' =>  $eventlist,  ]);
    }

    public function apiEventsDetailsList(Request $request)
    {
        $eventlist = eventlist::all();
        return response()->json(['data' =>  $eventlist,  ]);
    }
    
}
