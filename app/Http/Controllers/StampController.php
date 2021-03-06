<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stamp;

class StampController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stamps = Stamp::orderBy('created_at', 'desc')->get();

        return view('dashboard.stampsOffer')->with('stamps', $stamps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.addStamp');
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
            'name' => 'required',
            'collection' => 'required',
            'price' => 'required|integer',
            'stamp_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('stamp_image')){
            //get filename with the extention
            $filenameWithExt = $request->file('stamp_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('stamp_image')->getClientOriginalExtension();
            //Filename to  store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('stamp_image')->storeAs('public/stamp_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //Create Stamp
        $stamp = new Stamp;
        $stamp->name = $request->input('name');
        $stamp->collection = $request->input('collection');
        $stamp->price = $request->input('price');
        $stamp->user_id = auth()->user()->id;
        $stamp->stamp_image = $fileNameToStore;
        $stamp->total_bids = 0;
        $stamp->save();

        return redirect('/dashboard/stamps')->with('success', 'Stamp created');
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
        $stamp = Stamp::findOrFail($id);

        return view('dashboard.editStampView')->with('stamp', $stamp);
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
        $stamp = Stamp::findOrFail($id);
        
        if($stamp!=null){
            $this->validate($request, [
                'name' => 'required',
                'collection' => 'required',
                'price' => 'required|integer',
                'stamp_image' => 'image|nullable|max:1999'
            ]);

            $stamp->name = $request->name;
            $stamp->collection = $request->collection;
            $stamp->price = $request->price;
            
            //Handle File Upload
            if($request->hasFile('stamp_image')){
                //get filename with the extention
                $filenameWithExt = $request->file('stamp_image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get just ext
                $extension = $request->file('stamp_image')->getClientOriginalExtension();
                //Filename to  store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload image
                $path = $request->file('stamp_image')->storeAs('public/stamp_images', $fileNameToStore);

                $stamp->stamp_image = $fileNameToStore;
            }           
        
            $stamp->save();

            return redirect('/dashboard/stamps')->with('success', 'Stamp updated.');
        }
        else{
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stamp = Stamp::find($id);
        $stamp->delete();

        return redirect('/dashboard/stamps')->with('success', 'Stamp deleted.');
    }
}
