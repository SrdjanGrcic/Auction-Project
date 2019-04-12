<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bid;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bids = Bid::orderBy('bid_value', 'desc')->get();

        $bidsData = DB::table('bids')
            ->select(
                'stamps.name',
                'stamps.collection',
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

        return redirect('/dashboard/stamps/offer')->with('success', 'Bid made!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stamp = DB::table('stamps')->where('id', $id)->first();
        return view('dashboard.bidForm')->with('stamp', $stamp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
