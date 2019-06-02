<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\State;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('revalidate');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        // $lid =Auth::user()->id;
        // return $role;
        switch($role){
            case 1:
                $states=State::where('status',1)->get();
                // $districts=District::all();
                return view('Admin.home')->with(['states'=>$states]);
                // return view('Admin.state');
            break;
            case 2:
                // Session(['lid' => '$lid']);
                return redirect('/owner');
            break;
            case 3:
                // Session(['lid' => '$lid']);
                return redirect('/vhome');
            break;
            case 4:
                return redirect('/user');
            break;
        }
        
    }

    // public function test()
    // {
    //     return Auth::user();
    // // return Auth::logout();
    // }
}
