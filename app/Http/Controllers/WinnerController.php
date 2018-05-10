<?php

namespace App\Http\Controllers;

use Auth;
use App\winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = winner::all();
        return View('winner.index')->with('info', $info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('winner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        
        $x = new  winner;
        $x->name               =       $request->input('title');
        $x->roll_no               =       $request->input('roll_no');
        $x->event               =       $request->input('event');
        $x->status               =       $request->input('status');
        $x->message               =       $request->input('message');
        $x->uploaded_by               =       Auth::id();
        $x->rank                    =       '';
        $x->save();

        $request->session()->flash('message', 'Successfully Uploaded New Competitor Details !');
        return Redirect('winner');
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
       return "invalid request";
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
        return "Invalid Request";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $x = winner::find($id);
        $x->delete();
        
        $request->session()->flash('message', 'Successfully Deleted the winner info !');
        return Redirect('winner');
    }

    public function declareShortlisted(Request $request, $id)
    {
        $x = winner::find($id);
        $x->status               =       'shortlisted';
        $x->uploaded_by               =       Auth::id();
        $x->save();
        
        $request->session()->flash('message', 'Successfully modified the winner info !');
        return Redirect('winner');
    }

    public function declareCompleted(Request $request, $id)
    {
        $x = winner::find($id);
        $x->status               =       'completed';
        $x->uploaded_by               =       Auth::id();
        $x->save();
        
        $request->session()->flash('message', 'Successfully modified the winner info !');
        return Redirect('winner');
    }

    public function declareWinner(Request $request, $id)
    {
        $x = winner::find($id);
        $x->status               =       'winner';
        $x->uploaded_by               =       Auth::id();
        $x->save();
        
        $request->session()->flash('message', 'Successfully modified the winner info !');
        return Redirect('winner');
    }

    public $successStatus = 200;

    public function apiShortlisted()
    {
        $eventlist = winner::where('status', '=' , 'shortlisted')->get();
        return response()->json(['data' =>  $eventlist,  ]);
    }

    public function apiWinner()
    {
        $eventlist = winner::where('status', '=' , 'winner')->get();
        return response()->json(['data' =>  $eventlist,  ]);
    }
}
