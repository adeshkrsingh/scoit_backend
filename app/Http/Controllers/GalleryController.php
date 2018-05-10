<?php

namespace App\Http\Controllers;

use Auth;
use App\gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = gallery::all();
        return View('gallery.index')->with('image', $image);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('gallery.create');
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
                $fileloc = "uploads/gallery/y".$year."/m".$month."/d".$day;
                $file->move($fileloc,$picture);
                $images[]=$picture;

                $imageurl = URL('/')."/".$fileloc."/".$picture;

                $x = new  gallery;
                $x->title               =       $request->input('title');
                $x->type               =       $request->input('type');
                $x->drive_link               =       $request->input('drive_link');
                $x->uploaded_by               =       Auth::id();
                $x->image_url                    =       $imageurl;
                $x->save();
            }
        }

        $request->session()->flash('message', 'Successfully Uploaded New image !');
        return Redirect('gallery');
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
        $x = gallery::find($id);
        $x->delete();
        
        $request->session()->flash('message', 'Successfully Deleted the image !');
        return Redirect('gallery');
    }

    public $successStatus = 200;

    public function apiGallery()
    {
        $eventlist = gallery::where('type', '=', 'gallery')->get();
        return response()->json(['data' =>  $eventlist,  ]);
    }

}
