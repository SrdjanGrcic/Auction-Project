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
    
    public function auctionResults(){
        return view('dashboard.results');
    }

    public function showAllUsers(){
        $users = User::orderBy('name', 'asc')->get();

        return view('dashboard.users')->with('users', $users);
    }

    public function createAdminStampsView(){
        
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
}
