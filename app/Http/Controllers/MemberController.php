<?php

namespace App\Http\Controllers;

use Auth;
use App\member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = member::all();
        return View('members.index')->with('info', $info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('members.create');
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


        $input=$request->all();
        $images=array();
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
                $fileloc = "uploads/members/y".$year."/m".$month."/d".$day;
                $file->move($fileloc,$picture);
                $images[]=$picture;

                $imageurl = URL('/')."/".$fileloc."/".$picture;

                $x = new  member;
                $x->name               =       $request->input('title');
                $x->roll_no               =       $request->input('roll_no');
                $x->year               =       $request->input('year');
                $x->member_type               =       $request->input('member_type');
                $x->extra1               =       $request->input('extra1');
                $x->facebook_link               =       $request->input('fb_link');
                $x->linkedin_link               =       $request->input('linkedin_link');
                $x->uploaded_by               =       Auth::id();
                $x->photo                    =       $imageurl;
                $x->save();
            }
        }

        $request->session()->flash('message', 'Successfully Uploaded New Member Details !');
        return Redirect('members');
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
        $x = member::find($id);
        $x->delete();
        
        $request->session()->flash('message', 'Successfully Deleted the Member info !');
        return Redirect('members');
    }

    public $successStatus = 200;

    public function apiMembers()
    {
        $eventlist = member::all();
        return response()->json(['data' =>  $eventlist,  ]);
    }
}
