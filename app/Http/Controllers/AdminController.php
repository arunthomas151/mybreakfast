<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
use App\Rbooking;
use App\Vbooking;
use App\Pbooking;
use App\Rrating;
use App\Vrating;
use App\Prating;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function home(){
        $states=State::where('status',1)->get();
        return view('Admin.home')->with(['states'=>$states]);
    }
    public function state(){
        $states=State::where('status',1)->get();
        $districts=District::where('status',2)->get();
        return view('Admin.state')->with(['states'=>$states,'districts'=>$districts]);
    }
    public function district(Request $request){
        // return $request;
        // $districts = DB::table('districts')
        // ->join('states','states.sid','=','districts.sid')
        // ->where('districts.sid',$request->sid)
        // ->where('districts.status',1)
        // ->get();
        $states=State::where('status',1)->get();
        $districts=District::where('status',1)
        ->where('sid',$request->sid)
        ->get();
        // return $districts;
        return view('Admin.state')->with(['states'=>$states,'districts'=>$districts]);
    }
    public function addstate(Request $request){
        State::create([
            's_name'=>$request['sname'] 
        ]);
        $states=State::where('status',1)->get();
        return view('Admin.state')->with(['states'=>$states]);
    }
    public function adddistrict(Request $request){
        District::create([
            'sid'=>$request['state'],
            'd_name'=>$request['dname']
        ]);
        $states=State::where('status',1)->get();
        return view('Admin.state')->with(['states'=>$states]);
    }
    public function userlist()
    {
        $users=DB::table('registers')
            ->join('districts','districts.did','=','registers.u_did')
            ->join('states','states.sid','=',"districts.sid")
            ->select('registers.*','districts.d_name','states.s_name')
            ->get();
        $states=State::where('status',1)->get();
        return view('Admin.userlist')->with(['users'=>$users,'states'=>$states]);
    }
    public function house(){
        $house = DB::table('homes')
        ->join('districts','districts.did','=','homes.did')
        ->join('states','states.sid','=',"districts.sid")
        ->join('places','places.pid','=','homes.pid')
        ->select('homes.*','districts.*','places.*','states.*')
        ->where('homes.rmstatus', 1)
        ->get();
        $states=State::where('status',1)->get();
        return view('Admin.houses')->with(['states'=>$states , 'house' => $house]);
    }

    public function rooms(Request $request){
        // return $request;
        $room = DB::table('rooms')
        ->join('homes','homes.rmid','=','rooms.rmid')
        ->join('roomtypes','roomtypes.tid','=','rooms.tid')
        ->join('rents','rents.reid','=','rooms.reid')
        ->join('districts','districts.did','=','homes.did')
        ->join('states','states.sid','=',"districts.sid")
        ->join('places','places.pid','=','homes.pid')
        ->select('rooms.*','roomtypes.*','rents.*','homes.*','districts.*','places.*','states.*')
        ->where('rooms.nrstatus', 1) 
        ->where('rooms.rmid',$request->homeid)       
        ->get();
        // return $room;
        $states=State::where('status',1)->get();
        return view('Admin.rooms')->with(['states'=>$states , 'room' => $room]);
    }
    public function vehicles()
    {
        $vehicle =DB::table('vehicles')
        ->join('vehiclerents','vehiclerents.vid','=','vehicles.vid')
        ->join('rents','rents.reid','=','vehiclerents.reid')
        ->join('registers','registers.rid','=','vehicles.rid')
        ->join('districts','districts.did','=','registers.u_did')
        ->join('states','states.sid','=','districts.sid')
        ->join('profiles','profiles.rid','=','vehicles.rid')
        ->join('places','places.pid','=','profiles.placeid') 
        ->select('vehicles.*','vehiclerents.*','rents.*','districts.*','places.*','states.*')
        ->where('vehicles.vstatus',1)
        ->get();
        // return $vehicle;
        $states=State::where('status',1)->get();
        return view('Admin.vehicles')->with(['states'=>$states ,'vehicle' => $vehicle]);
    }
    public function packages()
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
        // return $package;
        $states=State::where('status',1)->get();
        return view('Admin.package')->with(['states'=>$states ,'package' => $package]);
    }
    public function breakfasts()
    {
        $breakfast =DB::table('breakfasts')
        ->join('rents','rents.reid','=','breakfasts.reid')
        ->join('bfoods','bfoods.bfid','=','breakfasts.bfid')
        ->join('categories','categories.cid','=','bfoods.cid')
        ->select('breakfasts.*','rents.*','bfoods.*','categories.*')
        ->where('breakfasts.bstatus',1)
        ->get();
        $states=State::where('status',1)->get();
        return view('Admin.breakfast')->with(['states' => $states, 'breakfast' => $breakfast]);
    }

    public function districta(Request $request){
        return District::where('sid', $request->sid)->where('status',1)->get();
    }
    public function search(Request $request)
    {
        // return $request;
        $users=DB::table('registers')
            ->join('districts','districts.did','=','registers.u_did')
            ->join('states','states.sid','=',"districts.sid")
            ->select('registers.*','districts.d_name','states.s_name')
            ->where('registers.u_did',$request['district1'])
            ->where('registers.type',$request['type'])
            ->get();
        // return $users;
        $states=State::where('status',1)->get();
        return view('Admin.userlist')->with(['users'=>$users,'states'=>$states]);
    }
    // public function userblock(Request $request)
    // {
    //     $block=Register::where('id',$request->uid)->update(['status'=>0]);
    //     $block1=User::where('id',$block->lid)->update(['status'=>0]);
    //     $users=Register::where('status',1)->get();
    //     $users1=Register::where('status',0)->get();
    //     $states=State::where('status',1)->get();
    //     $districts=District::where('status',1)->get();
    //     return view('Admin.userlist')->with(['users'=>$users,'users1'=>$users1,'states'=>$states,'districts'=>$districts]);
    // }
    // public function userunblock(Request $request)
    // {
    //     $block=Register::where('id',$request->ubid)->update(['status'=>1]);
    //     // $block1=User::where('id',$block->lid)->update(['status'=>1]);
    //     $users=Register::where('status',1)->get();
    //     $users1=Register::where('status',0)->get();
    //     $states=State::where('status',1)->get();
    //     $districts=District::where('status',1)->get();
    //     return view('Admin.userlist')->with(['users'=>$users,'users1'=>$users1,'states'=>$states,'districts'=>$districts]);
    // }
    public function cpassword(){
        $states=State::where('status',1)->get();
        return view('Admin.changepassword')->with(['states' => $states]);
    }
    public function savepassword(Request $request){
        // return $request;
        User::where('id',Auth::id())->update([
            'password' => Hash::make($request['npassword'])
        ]);
        return redirect('admin');
    }
    public function ckeckpassword(Request $request){
        // return $request;
        $id = Auth::id();
        $data = User::find($id)->password;
        if(Hash::check($request->opassword , $data))
        {
            return 1;
        }
        else
        {
           return 0;
        }
    }
    public function savedistrict(Request $request){
        // return $request;
        District::create([
            'sid' => $request['state1'],
            'd_name'=> $request['district'],
        ]);
        return redirect('state');
    }
    public function savestate(Request $request){
        // return $request;
        State::create([
            's_name'=> $request['state'],
        ]);
        return redirect('state');
    }
    public function editstate(Request $request){
        // return $request;
        State::where('sid',$request->sid)->update([
            's_name'=> $request['state2'],
        ]);
        return redirect('state');
    }
    public function editdistrict(Request $request){
        // return $request;
        District::where('did',$request->did)->update([
            'sid' => $request['state3'],
            'd_name'=> $request['district2'],
        ]);
        return redirect('state');
    }
    public function checkstate(Request $request){
        $data = State::where('s_name',$request->s_name)->get();
        if(!$data->count())
        {
            return 0;
        }
        else
        {
           return 1;
        }
    }
    public function checkdistrict(Request $request){
        $data = District::where('d_name',$request->d_name)
        ->where('sid',$request->sid)
        ->get();
        if(!$data->count())
        {
            return 0;
        }
        else
        {
           return 1;
        }
    }
    public function adprofile(){
        $states=State::where('status',1)->get();
        return view('Admin.profile')->with(['states' => $states]);
    }

    
}
