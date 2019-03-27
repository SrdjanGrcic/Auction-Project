<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Stamp;
use App\User;
use App\Bid;

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
        return view('dashboard.Dashboard');
    }

    public function stampsOffer()
    {
        $stamps = Stamp::orderBy('created_at', 'desc')->get();

        return view('dashboard.stampsOffer')->with('stamps', $stamps);
    }

    public function createBidView(Request $request){

        $stamp = DB::table('stamps')->where('id', $request->stamp_id)->first();
        return view('dashboard.bidForm')->with('stamp', $stamp);
    }

    public function createBid(Request $request){
        $this->validate($request, [
            'bid' => 'required',
        ]);

        //Create Bid
        $bid = new Bid;
        $bid->stamp_id = $request->stamp_id;
        $bid->bid_value = $request->input('bid');
        $bid->user_id = auth()->user()->id;
        $bid->save();
        
        db::table('stamps')
            ->whereId($request->stamp_id)->increment('total_bids');

        return redirect('/dashboard/stamps_offer')->with('success', 'Bid made!');
    }
    
    public function auctionResults(){
        return view('dashboard.results');
    }

    public function showAllUsers(){
        $users = User::orderBy('name', 'asc')->get();

        return view('pages.users')->with('users', $users);
    }

    public function adminStamps(){
        
        $stamps = DB::table('stamps')
            ->select(
                'stamps.id',
                'stamps.name',
                'stamps.collection',
                'stamps.price',
                'stamps.stamp_image',
                'stamps.total_bids',
                'users.name as userName'                
            )
            ->join(
                'users',
                'users.id', 'stamps.user_id'
            )
            ->orderBy('stamps.created_at', 'desc')
            ->get();

        return view('dashboard.Stamps')->with('stamps', $stamps);
    }

    public function showBids(){
        $bids = Bid::orderBy('bid_value', 'desc')->get();

        $bidsData = DB::table('bids')
            ->select(
                'stamps.name',
                'stamps.price',
                'bids.bid_value',
                'users.name as userName'
            )
            ->join(
                'stamps',
                'stamps.id','bids.stamp_id'
            )
            ->join(
                'users',
                'users.id', 'bids.user_id'
            )
            ->orderBy('stamps.name', 'asc')
            ->orderBy('bids.bid_value', 'desc')
            ->get();

        return view('dashboard.bidsList')->with('bids', $bidsData);
    }
    
    public function addStamp(){
        return view('dashboard.addStamp');
    }

    //edit stamp view
    public function createEditStampView(Request $request){

        $stamp = DB::table('stamps')->where('id', $request->stamp_id)->first();

        //$stamp = Stamp::find($request->stamp_id);

        return view('dashboard.editStampView')->with('stamp', $stamp);
    }

    public function updateStamp(Request $request){
        \Debugbar::info($request->name);
        $stamp = DB::table('stamps')->where('id', $request->stamp_id)->first();
        \Debugbar::log('Update this db stamp: '.$stamp->name);
        if($stamp!==null){
            $this->validate($request, [
                'name' => 'required',
                'collection' => 'required',
                'price' => 'required',
                'stamp_image' => 'image|nullable|max:1999'
            ]);
            \Debugbar::log('Update this request stamp: '.$request->name);
            \Debugbar::log('Update this db stamp: '.$stamp->name);
        //Create Stamp
       // $stamp = Stamp::find($request->stamp_id);
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

        return redirect('/dashboard/stamps')->with('success', 'Stamp created');
        }
    }
    
    //Create new stamp
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'collection' => 'required',
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
        $stamp->collection = $request->input('collection');
        $stamp->price = $request->input('price');
        $stamp->user_id = auth()->user()->id;
        $stamp->stamp_image = $fileNameToStore;
        $stamp->total_bids = 0;
        $stamp->save();

        return redirect('/dashboard/stamps')->with('success', 'Stamp created');
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
