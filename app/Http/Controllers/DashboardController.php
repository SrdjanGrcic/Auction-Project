<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stamp;
use App\User;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.userDashboard');
    }

    public function current()
    {
        $stamps = Stamp::orderBy('created_at', 'desc')->get();

        return view('dashboard.currentAuction')->with('stamps', $stamps);
    }

    public function bidForm(){
        return view('dashboard.bidForm');
    }

    public function auctionResults(){
        return view('dashboard.results');
    }

    public function allUsers(){
        $users = User::orderBy('name', 'asc')->get();

        return view('pages.users')->with('users', $users);
    }    
    
    public function addStamp(){
        return view('dashboard.addStamp');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
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
        $stamp->price = $request->input('price');
        $stamp->user_id = auth()->user()->id;
        $stamp->stamp_image = $fileNameToStore;
        $stamp->save();

        return redirect('/dashboard/current')->with('success', 'Stamp created');
    }
}
