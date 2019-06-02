<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\State;
use App\District;
use App\Register;
use App\User;
use App\Profile;
use App\Place;
use App\Roomtype;
use App\Rent;
use App\Home;
use App\Vehicle;
use App\Vehiclerent;
use App\Package;
use App\Breakfast;
use App\Room;
use App\Category;
use App\Bfood;

class GuestController extends Controller
{
    public static function index()
    {
        // return view('Admin.home');
        $states=State::where('status',1)->get();
        return view('Home.home')->with(['states'=>$states]);
    }

    public function state()
    {
        // return 'test';
        return State::where('status',1)->get();
        //return view('Home.index')->with(['states'=>$states]);
    }
    public function districtq(Request $request){
        // return  $request->all();
        // return 0;
        return District::where('sid', $request->sid)->where('status',1)->get();
    }
    public function contacts()
    {
        $states=State::where('status',1)->get();
        return view('Home.contacts')->with(['states'=>$states]);
    }
    public function gallery()
    {
        $rooms = Room::select('nrimage')->get();
        $vehicles = Vehicle::select('vimage')->get();
        $packages = Package::select('pkimage')->get();
        $states=State::where('status',1)->get();
        return view('Home.gallery')->with(['states'=>$states,'rooms' => $rooms ,'vehicles' => $vehicles ,'packages' => $packages]);
    }
    public function specials()
    {
        $package =DB::table('packages')
        ->join('rents','rents.reid','=','packages.reid')
        ->join('rooms','rooms.nrid','=','packages.nrid')
        ->join('homes','homes.rmid','=', 'rooms.rmid')
        ->join('breakfasts','breakfasts.bid','=','packages.bid')
        ->join('bfoods','bfoods.bfid','=', 'breakfasts.bfid')
        ->join('vehicles','vehicles.vid','=','packages.vid')
        ->join('districts','districts.did','=','homes.did')
        ->join('states','states.sid','=',"districts.sid")
        ->join('places','places.pid','=','homes.pid')
        ->select('packages.*','rents.*','rooms.*','breakfasts.*','vehicles.*','bfoods.*','homes.*','districts.*','places.*','states.*')
        ->where('packages.pkstatus', 1)        
        ->get();
        $states=State::where('status',1)->get();
        return view('Home.specials')->with(['states'=>$states,'package' => $package]);
    }
    public function rooms()
    {
        $room = DB::table('rooms')
        ->join('homes','homes.rmid','=','rooms.rmid')
        ->join('roomtypes','roomtypes.tid','=','rooms.tid')
        ->join('rents','rents.reid','=','rooms.reid')
        ->select('rooms.*','roomtypes.*','rents.*','homes.*')      
        ->get();
        $states=State::where('status',1)->get();
        return view('Home.rooms')->with(['states'=>$states,'room' => $room]);
    }
    public function valemail(Request $request){
        // return $request;
        $data = User::where('email',$request->email)->get();
        if(!$data->count())
        {
            return 0;
        }
        else
        {
           return 1;
        }
    }
    public function checkuser(Request $request){
        // return $request;
        $id = User::select('id')->where('email',$request->email)->get();
        $id1 = $id[0]->id;
        $data = User::find($id1)->password;
        if(Hash::check($request->password , $data))
        {
            return 1;
        }
        else
        {
           return 0;
        }
    }
}
