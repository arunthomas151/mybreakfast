<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
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

class VehicleController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function home(){

        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        if(!$data->count())
        {
            $data = Profile::select('image')->where('prid',1)->get();
            return view('Vehicle.profile')->with(['data' => $data]);
        }
        else
        {
            return view('Vehicle.home')->with(['data' => $data]);
        }
    }
    public function saveprofile(Request $request){
        $pid = "" ;
        $rid = Register::select('rid','u_did')->where('lid',Auth::id())->get();
        $p = $rid[0]->rid;
        $d = $rid[0]->u_did;
        $place = Place::select('pid')->where('pname',$request['place'])->where('did',$d)->get();
        if(!$place->count())
        {
            $place = Place::create([
                'did'=> $d,
                'pname' => $request['place'],
            ]);
                $pid=$place->id;
        }
        else
        {
            $pid = $place[0]->pid;
        }
        $file_path = 'images/user/';
        $image = Input::file('pic');
        $imgPath = time() . $image->getClientOriginalName();                      
        $image->move($file_path, $imgPath);
        Profile::create([
            'rid'=> $p,
            'address' => $request['address'],
            'image' => $imgPath,
            'placeid' => $pid,
            'adharno' => $request['idno'],
        ]);
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        return redirect('vehicleprofile');
    }
    public function vprofile(){
        $data=DB::table('logins')
        ->join('registers','registers.lid','=', 'logins.id')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->join('places','places.pid','=','profiles.placeid')
        ->join('districts','districts.did','=','registers.u_did')
        ->join('states','states.sid','=',"districts.sid")
        ->select('registers.*','profiles.*','districts.*','states.*','places.*')
        ->where('registers.lid', Auth::id())
        ->get();
        // return $data; 
    return view('Vehicle.viewprofile')->with(['data' => $data]);
}
public function eprofile(){
    $data=DB::table('logins')
    ->join('registers','registers.lid','=', 'logins.id')
    ->join('profiles','profiles.rid','=','registers.rid')
    ->join('places','places.pid','=','profiles.placeid')
    ->join('districts','districts.did','=','registers.u_did')
    ->join('states','states.sid','=',"districts.sid")
    ->select('registers.*','profiles.*','districts.*','states.*','places.*')
    ->where('registers.lid', Auth::id())
    ->get();
    $states=State::where('status',1)->get();
    // return $data;
    return view('Vehicle.profileedit')->with(['data' => $data,'states' => $states]);
}
public function edit(Request $request){
    // return $request;
    $pid= "" ;
    $rid = Register::select('rid','u_did')->where('lid',Auth::id())->get();
    // return $rid;
    $reg = Register::where('rid',$rid[0]->rid)->update([
        'u_name' => $request['name'],
        'u_mob' => $request['mobile'],
        'u_did' => $request['district']]);
    //   return  $request['district'];
    $place = Place::select('pid')->where('pname',$request['place'])->where('did',$request['district'])->get();
    // return $place;
    if(!$place->count())
    {
        $place = Place::create([
            'did'=> $request['district'],
            'pname' => $request['place'],
        ]);
            $pid=$place->id;
    }
    else
    {
        $pid = $place[0]->pid;
    }
    Profile::where('rid',$rid[0]->rid)->update(['address' => $request['address'],
        'placeid' => $pid,
        'adharno' => $request['idno']]);
        return redirect('vehicleprofile');
}
public function addvehicle(Request $request){
    // return $request;
    $reid = "" ;
    $rid = Register::select('rid')->where('lid',Auth::id())->get();
    $rent = Rent::select('reid')->where('rent',$request['vrmnt'])->get();
    if(!$rent->count())
    {
        $rent = Rent::create([
            'rent'=> $request['vrmnt'],
        ]);
            $reid = $rent->id;
    }
    else
    {
        $reid=$rent[0]->reid;
    }
    // return $reid;
    $file_path = 'images/vehicle/';
    $image = Input::file('pic');
    $imgPath = time() . $image->getClientOriginalName();                      
    $image->move($file_path, $imgPath);
    $vehi = Vehicle::create([
        'rid' => $rid[0]->rid,
        'vrno' => $request['vno'],
        'voname' => $request['voname'],
        'vdname' => $request['vdname'],
        'vdlicence' => $request['dlno'],
        'nofseat' => $request['nofseat'],
        'vcontact' => $request['contact'],
        'vimage' => $imgPath
    ]);
    // return $vehi;
    Vehiclerent::create([
        'vid' => $vehi->id,
        'rkm' =>$request['klmtr'],
        'wtime' => $request['wtime'],
        'reid' => $reid
    ]);
    Vrating::create([
        'vid' => $vehi->id,
        'vcount' => 50
    ]);
    return redirect('/viewvehicles');
}
public function vvehicles(){
    $rid = Register::select('rid')->where('lid',Auth::id())->get();
    $data = DB::table('registers')
    ->join('profiles','profiles.rid','=','registers.rid')
    ->select('registers.u_name','profiles.image','profiles.prid')
    ->where('registers.rid',$rid[0]->rid)
    ->get();
    $vehicle =DB::table('vehicles')
    ->join('vehiclerents','vehiclerents.vid','=','vehicles.vid')
    ->join('rents','rents.reid','=','vehiclerents.reid')
    ->select('vehicles.*','vehiclerents.*','rents.*')
    ->where('vehicles.rid',$rid[0]->rid)
    ->get();
    // return $vehicle;
    return view('Vehicle.viewvehicles')->with(['data' => $data,'vehicle' => $vehicle]);
}
public function avehicles(){
    $rid = Register::select('rid')->where('lid',Auth::id())->get();
    $data = DB::table('registers')
            ->join('profiles','profiles.rid','=','registers.rid')
            ->select('registers.u_name','profiles.image','profiles.prid')
            ->where('registers.rid',$rid[0]->rid)
            ->get();
    return view('Vehicle.vehicles')->with(['data' => $data]);
}
public function editvehicle(Request $request){
    $rid = Register::select('rid')->where('lid',Auth::id())->get();
    $data = DB::table('registers')
    ->join('profiles','profiles.rid','=','registers.rid')
    ->select('registers.u_name','profiles.image','profiles.prid')
    ->where('registers.rid',$rid[0]->rid)
    ->get();
    $vehicle =DB::table('vehicles')
    ->join('vehiclerents','vehiclerents.vid','=','vehicles.vid')
    ->join('rents','rents.reid','=','vehiclerents.reid')
    ->select('vehicles.*','vehiclerents.*','rents.*')
    ->where('vehicles.vid',$request->vid)
    ->get();
    // return $vehicle;
    return view('Vehicle.editvehicle')->with(['data' => $data,'vehicle' => $vehicle]);
}
public function savevehicle(Request $request){
    // return $request;
    $reid = "" ;
    $rent = Rent::select('reid')->where('rent',$request['vrmnt'])->get();
    if(!$rent->count())
    {
        $rent = Rent::create([
            'rent'=> $request['vrmnt'],
        ]);
            $reid = $rent->id;
    }
    else
    {
        $reid=$rent[0]->reid;
    }
    // return $reid;
    $file_path = 'images/vehicle/';
    $image = Input::file('pic');
    $imgPath = time() . $image->getClientOriginalName();                      
    $image->move($file_path, $imgPath);
    $vehi = Vehicle::where('vid',$request->vid)->update([
        'voname' => $request['voname'],
        'vdname' => $request['vdname'],
        'vdlicence' => $request['dlno'],
        'nofseat' => $request['nofseat'],
        'vcontact' => $request['contact'],
        'vimage' => $imgPath
    ]);
    Vehiclerent::where('vid',$request->vid)->update([
        'rkm' =>$request['klmtr'],
        'wtime' => $request['wtime'],
        'reid' => $reid
    ]);
    return redirect('/viewvehicles');
}
public function cpassword(){
    $rid = Register::select('rid')->where('lid',Auth::id())->get();
    $data = DB::table('registers')             
    ->join('profiles','profiles.rid','=','registers.rid')             
    ->select('registers.u_name','profiles.image','profiles.prid')             
    ->where('registers.rid',$rid[0]->rid)             
    ->get();
    return view('Vehicle.changepassword')->with(['data' => $data]);
}
public function savepassword(Request $request){
    return $request;
}
public function vbookingvowner(){
    $rid = Register::select('rid')->where('lid',Auth::id())->get();
    $data = DB::table('registers')             
    ->join('profiles','profiles.rid','=','registers.rid')             
    ->select('registers.u_name','profiles.image','profiles.prid')             
    ->where('registers.rid',$rid[0]->rid)             
    ->get();
    $rbooking =DB::table('vbookings')
    ->join('vehicles','vehicles.vid','=','vbookings.vid')
    ->join('vehiclerents','vehiclerents.vid','vehicles.vid')
    ->join('rents','rents.reid','=','vehiclerents.reid')
    ->join('registers','registers.rid','=','vbookings.rid')
    ->where('vehicles.rid',$rid[0]->rid)
    ->where('vbookings.vbstatus',1)
    ->orderBy('vbid', 'DESC')
    ->get();
    // return $rbooking;
    return view('Vehicle.vehiclebooking')->with(['data' => $data, 'rbooking' => $rbooking]);
}
}
