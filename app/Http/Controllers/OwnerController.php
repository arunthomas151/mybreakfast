<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
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


class OwnerController extends Controller
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
            return view('Owner.profile')->with(['data' => $data]);
        }
        else
        {
            return view('Owner.home')->with(['data' => $data]);
        }
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
        return view('Owner.viewprofile')->with(['data' => $data]);
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
        return view('Owner.profileedit')->with(['data' => $data,'states' => $states]);
    }
    public function edit(Request $request){
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
            return redirect('vprofile');
    }
    public function saveimage(Request $request){
        $file_path = 'images/user/';
        $image = Input::file('pic');
        $imgPath = time() . $image->getClientOriginalName();                      
        $image->move($file_path, $imgPath);
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $prid = Profile::select('prid')->where('rid',$rid[0]->rid)->get();
        // return $prid;
        Profile::where('prid',$prid[0]->prid)->update(['image' => $imgPath]);
        return redirect('vprofile');
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
        return redirect('vprofile');
    }
    public function arooms(){
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $states=State::where('status',1)->get();
        return view('Owner.house')->with(['states'=>$states,'data'=>$data]);
    }
    public function avehicles(){
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        return view('Owner.vehicles')->with(['data' => $data]);
    }
    public function apackages(){
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $room = DB::table('homes')
        ->join('rooms','rooms.rmid','=', 'homes.rmid')
        ->select('rooms.nrid','homes.rname')
        ->where('homes.rid',$rid[0]->rid)
        ->get();
        $breakfast = DB::table('breakfasts')
        ->join('bfoods','bfoods.bfid','=', 'breakfasts.bfid')
        ->select('breakfasts.*','bfoods.*')
        ->where('breakfasts.rid',$rid[0]->rid)
        ->get();
        $vehicle = Vehicle::where('vehicles.rid',$rid[0]->rid)->get();
        // return $vehicle;
        return view('Owner.packages')->with(['data' => $data ,'room' => $room ,'breakfast' => $breakfast ,'vehicle' => $vehicle]);
    }
    public function abreakfasts(){
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $cate = Category::where('cstatus',1)->get();
        return view('Owner.breakfasts')->with(['data' => $data, 'cate' => $cate]);
    }
    public function foods(Request $request){
        return Bfood::where('cid', $request->cid)->where('bfstatus',1)->get();
    }
    public function edithouse(Request $request){
        if ($request->vrooms == 1) {
            $homeid = $request->homeid;
            return $this->houseedit($request);
        } else {
            $homeid = $request->homeid;
            return $this->viewroom($request);
        }
    }
    public function viewroom(Request $request){
        // return $request;
        $rmid = $request->homeid;
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $room = DB::table('rooms')
        ->join('homes','homes.rmid','=','rooms.rmid')
        ->join('roomtypes','roomtypes.tid','=','rooms.tid')
        ->join('rents','rents.reid','=','rooms.reid')
        ->select('rooms.*','roomtypes.*','rents.*','homes.*')
        ->where('rooms.rmid', $request->homeid)        
        ->get();
        return view('Owner.viewrooms')->with(['data' => $data, 'room' => $room,'rmid' => $rmid]);
    }
    public function viewaddroom(Request $request){
        $rmid = $request['homeid'];
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $types = Roomtype::where('tstatus',1)->get();
        return view('Owner.rooms')->with(['data' => $data, 'rmid' => $rmid, 'types' => $types]);
    }
    public function editroom(Request $request){
        // return $request;
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $types = Roomtype::where('tstatus',1)->get();
        $room = DB::table('rooms')
        ->join('roomtypes','roomtypes.tid','=','rooms.tid')
        ->join('rents','rents.reid','=','rooms.reid')
        ->select('rooms.*','roomtypes.*','rents.*')
        ->where('rooms.nrid', $request->roomid)
        ->get();
        // return $room;
        return view('Owner.editroom')->with(['data' => $data, 'types' => $types, 'room' => $room]);
    }
    public function saveroom(Request $request){
        // return $request;
        $reid = "" ;
        $rent = Rent::select('reid')->where('rent',$request['rmnt'])->get();
        if(!$rent->count())
        {
            $rent = Rent::create([
                'rent'=> $request['rmnt'],
            ]);
                $reid = $rent->id;
        }
        else
        {
            $reid=$rent[0]->reid;
        }
        $file_path = 'images/room/';
        $image = Input::file('pic');
        $imgPath = time() . $image->getClientOriginalName();                      
        $image->move($file_path, $imgPath);
        Room::where('nrid',$request->roomid)->update([
            'tid' => $request['type'],
            'capacity' => $request['roomcp'],
            'nrimage' => $imgPath,
            'reid' => $reid
        ]);
        return redirect('vhouse');
    }
    public function houseedit(Request $request){
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $house = DB::table('homes')
        ->join('districts','districts.did','=','homes.did')
        ->join('states','states.sid','=',"districts.sid")
        ->join('places','places.pid','=','homes.pid')
        ->select('homes.*','districts.*','places.*','states.*')
        ->where('homes.rmid',$request->homeid)
        ->get();
        $states=State::where('status',1)->get();
        // return $house;
        return view('Owner.edithouse')->with(['data' => $data,'house' => $house,'states' => $states]);
    }
    public function vhouse(){
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $house = DB::table('homes')
        ->join('districts','districts.did','=','homes.did')
        ->join('states','states.sid','=',"districts.sid")
        ->join('places','places.pid','=','homes.pid')
        ->select('homes.*','districts.*','places.*','states.*')
        ->where('homes.rid',$rid[0]->rid)
        ->get();
        // return $house;
        return view('Owner.viewhouse')->with(['data' => $data,'house' => $house]);
    }
    public function savehouse(Request $request){
        // return $request;
        $pid = "" ;
        $place = Place::select('pid')->where('pname',$request['place'])->where('did',$request['district'])->get();
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
        $file_path = 'images/house/';
        $image = Input::file('pic');
        $imgPath = time() . $image->getClientOriginalName();                      
        $image->move($file_path, $imgPath);
        $house = Home::where('rmid',$request->homeid)->update([
            'rname' => $request['hname'],
            'rcontact' => $request['contact'],
            'did' => $request['district'],
            'pid' => $pid,
            'lmark' => $request['lmark'],
            'himage' => $imgPath]);
        return redirect('vhouse');
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
        return view('Owner.viewvehicles')->with(['data' => $data,'vehicle' => $vehicle]);
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
        return view('Owner.editvehicle')->with(['data' => $data,'vehicle' => $vehicle]);
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
        return redirect('/vvehicles');
    }
    public function vpackages(){
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
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
        ->where('packages.rid',$rid[0]->rid)
        ->get();
        // return $package;
        return view('Owner.viewpackages')->with(['data' => $data,'package' => $package]);
    }
    public function editpackage(Request $request){
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $package =DB::table('packages')
        ->join('rents','rents.reid','=','packages.reid')
        ->join('rooms','rooms.nrid','=','packages.nrid')
        ->join('homes','homes.rmid','=', 'rooms.rmid')
        ->join('breakfasts','breakfasts.bid','=','packages.bid')
        ->join('bfoods','bfoods.bfid','=', 'breakfasts.bfid')
        ->join('vehicles','vehicles.vid','=','packages.vid')
        ->select('packages.*','rents.*','rooms.*','breakfasts.*','vehicles.*','bfoods.*','rooms.nrid','homes.rname')
        ->where('packages.pkid',$request->pkid)
        ->get();
        $room = DB::table('homes')
        ->join('rooms','rooms.rmid','=', 'homes.rmid')
        ->select('rooms.nrid','homes.rname')
        ->where('homes.rid',$rid[0]->rid)
        ->get();
        $breakfast = DB::table('breakfasts')
        ->join('bfoods','bfoods.bfid','=', 'breakfasts.bfid')
        ->select('breakfasts.*','bfoods.*')
        ->where('breakfasts.rid',$rid[0]->rid)
        ->get();
        $vehicle = Vehicle::where('vehicles.rid',$rid[0]->rid)->get();
        // return $package;
        return view('Owner.editpackage')->with(['data' => $data,'package' => $package ,'room' => $room ,'breakfast' => $breakfast ,'vehicle' => $vehicle]);
    }
    public function savepackage(Request $request){
        return $request;
        $reid = "" ;
        $rent = Rent::select('reid')->where('rent',$request['amnt'])->get();
        if(!$rent->count())
        {
            $rent = Rent::create([
                'rent'=> $request['amnt'],
            ]);
                $reid = $rent->id;
        }
        else
        {
            $reid=$rent[0]->reid;
        }
        $file_path = 'images/package/';
        $image = Input::file('pic');
        $imgPath = time() . $image->getClientOriginalName();                      
        $image->move($file_path, $imgPath);
        $pack = Package::where('pkid',$request->pkid)->update([
            'pkname' => $request['pname'],
            'pkinfo' => $request['pinfo'],
            'nrid' => $request['roomid'],
            'bid' => $request['breakfastid'],
            'vid' => $request['vehicleid'],
            'pstime' =>$request['pstime'],
            'petime' =>$request['petime'],
            'pkimage' => $imgPath,
            'reid' => $reid
        ]);
        return redirect('/vpackages');
    }
    public function vbreakfasts(){
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $breakfast =DB::table('breakfasts')
        ->join('rents','rents.reid','=','breakfasts.reid')
        ->join('bfoods','bfoods.bfid','=','breakfasts.bfid')
        ->join('categories','categories.cid','=','bfoods.cid')
        ->select('breakfasts.*','rents.*','bfoods.*','categories.*')
        ->where('breakfasts.rid',$rid[0]->rid)
        ->get();
        // return $breakfast;
        return view('Owner.viewbreakfasts')->with(['data' => $data,'breakfast' => $breakfast]);
    }
    public function editbreakfast(Request $request){
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $breakfast =DB::table('breakfasts')
        ->join('rents','rents.reid','=','breakfasts.reid')
        ->join('bfoods','bfoods.bfid','=','breakfasts.bfid')
        ->join('categories','categories.cid','=','bfoods.cid')
        ->select('breakfasts.*','rents.*','bfoods.*','categories.*')
        ->where('breakfasts.bid',$request->bid)
        ->get();
        $cate = Category::where('cstatus',1)->get();
        // return $breakfast;
        return view('Owner.editbreakfast')->with(['data' => $data,'breakfast' => $breakfast,'cate' => $cate]);
    }
    public function savebreakfast(Request $request){
        $reid = "" ;
        $rent = Rent::select('reid')->where('rent',$request['amnt'])->get();
        if(!$rent->count())
        {
            $rent = Rent::create([
                'rent'=> $request['amnt'],
            ]);
                $reid = $rent->id;
        }
        else
        {
            $reid=$rent[0]->reid;
        }
        $file_path = 'images/breakfast/';
        $image = Input::file('pic');
        $imgPath = time() . $image->getClientOriginalName();                      
        $image->move($file_path, $imgPath);
        $pack = Breakfast::where('bid',$request->bid)->update([
            'bfid' => $request['food'],
            'description' => $request['binfo'],
            'bimage' => $imgPath,
            'reid' => $reid
        ]);
        return redirect('/vbreakfasts');
    }
    public function bookings(){
        $today = Carbon::now();
        $today1 = $today->format("m/d/Y");
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $rbooking =DB::table('rbookings')
        ->join('rooms','rooms.nrid','=','rbookings.nrid')
        ->join('rents','rents.reid','=','rooms.reid')
        ->join('homes','homes.rmid','=','rooms.rmid')
        ->join('registers','registers.rid','=','rbookings.rid')
        ->join('breakfasts','breakfasts.bid','=','rbookings.bid')
        ->join('bfoods','bfoods.bfid','=','breakfasts.bfid')
        ->where('homes.rid',$rid[0]->rid)
        ->where('rbookings.codate','>',$today1)
        ->where('rbookings.rbstatus',1)
        ->orderBy('rbid', 'DESC')
        ->get();
        // return $rbooking;
        return view('Owner.bookings')->with(['data' => $data ,'rbooking' => $rbooking]);
    }
    public function vbookingowner(){
        $today = Carbon::now();
        $today1 = $today->format("m/d/Y");
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
        ->where('vbookings.vcodate','>',$today1)
        ->where('vbookings.vbstatus',1)
        ->orderBy('vbid', 'DESC')
        ->get();
        return view('Owner.vehiclebooking')->with(['data' => $data, 'rbooking' => $rbooking]);
    }
    public function pbookingowner(){
        $today = Carbon::now();
        $today1 = $today->format("m/d/Y");
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $rbooking = DB::table('pbookings')
        ->join('packages','packages.pkid','=','pbookings.pkid')
        ->join('registers','registers.rid','=','pbookings.rid')
        ->join('rents','rents.reid','=','packages.reid')
        ->join('rooms','rooms.nrid','=','packages.nrid')
        ->join('homes','homes.rmid','=', 'rooms.rmid')
        ->join('breakfasts','breakfasts.bid','=','packages.bid')
        ->join('bfoods','bfoods.bfid','=', 'breakfasts.bfid')
        ->join('vehicles','vehicles.vid','=','packages.vid')
        ->select('packages.*','rents.*','rooms.*','breakfasts.*','vehicles.*','bfoods.*','homes.*','pbookings.*','registers.*')
        ->where('pbookings.pbstatus', 1) 
        ->where('pbookings.pbdate','>=',$today1)       
        ->where('packages.rid',$rid[0]->rid)
        ->orderBy('pbid', 'DESC')
        ->get();
        // return $rbooking;
        return view('Owner.packagebooking')->with(['data' => $data,'rbooking' => $rbooking]);
    }
    public function districtr(Request $request){
        // return  $request;
        return District::where('sid', $request->sid)->where('status',1)->get();
    }
    public function addroom(Request $request){
        // return $request;
        // $reid= "" ;
        $pid= "" ;
        $place = Place::select('pid')->where('pname',$request['place'])->where('did',$request['district'])->get();
        // return $place;
        if(!$place->count())
        {
            $place = Place::create([
                'did'=> $request['district'],
                'pname' => $request['place'],
            ]);
            // return $place;
                $pid=$place->id;
        }
        else
        {
            $pid = $place[0]->pid;
        }
        $file_path = 'images/house/';
        $image = Input::file('pic');
        $imgPath = time() . $image->getClientOriginalName();                      
        $image->move($file_path, $imgPath);
        // return $reid;
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $room = Home::create([
            'rid' => $rid[0]->rid,
            'rname' => $request['hname'],
            'rcontact' => $request['contact'],
            'did' => $request['district'],
            'pid' => $pid,
            'himage' =>$imgPath,
            'lmark' => $request['lmark']]);
        $rmid = $room->id;
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $types = Roomtype::where('tstatus',1)->get();
        return view('Owner.rooms')->with(['rmid' => $rmid, 'data' => $data, 'types' => $types]);    
    }
    public function addnewroom(Request $request){
        // return $request;
        $reid = "" ;
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $rent = Rent::select('reid')->where('rent',$request['rmnt'])->get();
        if(!$rent->count())
        {
            $rent = Rent::create([
                'rent'=> $request['rmnt'],
            ]);
                $reid = $rent->id;
        }
        else
        {
            $reid=$rent[0]->reid;
        }
        $file_path = 'images/room/';
        $image = Input::file('pic');
        $imgPath = time() . $image->getClientOriginalName();                      
        $image->move($file_path, $imgPath);
        $room = Room::create([
            'rmid' => $request['homeid'],
            'tid' => $request['type'],
            'capacity1' => $request['roomcp'],
            'nrimage' => $imgPath,
            'reid' => $reid
        ]);
        Rrating::create([
            'rrid' => $room->id,
            'rcount' => 50
        ]);
        $rmid = $request['homeid'];
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $types = Roomtype::where('tstatus',1)->get();
        return view('Owner.rooms')->with(['rmid' => $rmid, 'data' => $data, 'types' => $types]);
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
        return redirect('/vvehicles');
    }
    public function addpackage(Request $request){
        // return $request;
        $reid = "" ;
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $rent = Rent::select('reid')->where('rent',$request['amnt'])->get();
        if(!$rent->count())
        {
            $rent = Rent::create([
                'rent'=> $request['amnt'],
            ]);
                $reid = $rent->id;
        }
        else
        {
            $reid=$rent[0]->reid;
        }
        $file_path = 'images/package/';
        $image = Input::file('pic');
        $imgPath = time() . $image->getClientOriginalName();                      
        $image->move($file_path, $imgPath);
        $pack = Package::create([
            'rid' => $rid[0]->rid,
            'pkname' => $request['pname'],
            'pkinfo' => $request['pinfo'],
            'nrid' => $request['roomid'],
            'bid' => $request['breakfastid'],
            'vid' => $request['vehicleid'],
            'pstime' =>$request['pstime'],
            'petime' =>$request['petime'],
            'pkimage' => $imgPath,
            'reid' => $reid
        ]);
        Prating::create([
            'pkid' => $pack->id,
            'pcount' => 50
        ]);
        return redirect('/vpackages');
    }
    public function addbreakfast(Request $request){
        // return $request;
        $reid = "" ;
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $rent = Rent::select('reid')->where('rent',$request['amnt'])->get();
        if(!$rent->count())
        {
            $rent = Rent::create([
                'rent'=> $request['amnt'],
            ]);
                $reid = $rent->id;
        }
        else
        {
            $reid=$rent[0]->reid;
        }
        $file_path = 'images/breakfast/';
        $image = Input::file('pic');
        $imgPath = time() . $image->getClientOriginalName();                      
        $image->move($file_path, $imgPath);
        $pack = Breakfast::create([
            'rid' => $rid[0]->rid,
            'bfid' => $request['food'],
            'description' => $request['binfo'],
            'bimage' => $imgPath,
            'reid' => $reid
        ]);
        return redirect('/vbreakfasts');
    }
    public function cpassword(){
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        return view('Owner.changepassword')->with(['data' => $data]);
    }
    public function savepassword(Request $request){
        // return $request;
        User::where('id',Auth::id())->update([
            'password' => Hash::make($request['cpassword'])
        ]);
        return redirect('owner');;
    }
    public function roomcapacity(Request $request){
        $room = Roomtype::select('capacity')->where('tid',$request->tid)->get();
        return $room[0]->capacity;
    }
    public function bookingsearch(Request $request){
        // return $request;
        $today = Carbon::now();
        $today1 = $today->format("m/d/Y");
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $rbooking =DB::table('rbookings')
        ->join('rooms','rooms.nrid','=','rbookings.nrid')
        ->join('rents','rents.reid','=','rooms.reid')
        ->join('homes','homes.rmid','=','rooms.rmid')
        ->join('registers','registers.rid','=','rbookings.rid')
        ->join('breakfasts','breakfasts.bid','=','rbookings.bid')
        ->join('bfoods','bfoods.bfid','=','breakfasts.bfid')
        ->where('homes.rid',$rid[0]->rid)
        ->where('rbookings.cidate','<=',$request->cidate)
        ->where('rbookings.codate','>=',$request->cidate)
        ->where('rbookings.rbstatus',1)
        ->orderBy('rbid', 'DESC')
        ->get();
        // return $rbooking;
        return view('Owner.bookings')->with(['data' => $data ,'rbooking' => $rbooking]);
    }
    public function pbookingsearch(Request $request){
        $today = Carbon::now();
        $today1 = $today->format("m/d/Y");
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $rbooking = DB::table('pbookings')
        ->join('packages','packages.pkid','=','pbookings.pkid')
        ->join('registers','registers.rid','=','pbookings.rid')
        ->join('rents','rents.reid','=','packages.reid')
        ->join('rooms','rooms.nrid','=','packages.nrid')
        ->join('homes','homes.rmid','=', 'rooms.rmid')
        ->join('breakfasts','breakfasts.bid','=','packages.bid')
        ->join('bfoods','bfoods.bfid','=', 'breakfasts.bfid')
        ->join('vehicles','vehicles.vid','=','packages.vid')
        ->select('packages.*','rents.*','rooms.*','breakfasts.*','vehicles.*','bfoods.*','homes.*','pbookings.*','registers.*')
        ->where('pbookings.pbstatus', 1) 
        ->where('pbookings.pbdate','>=',$request->cidate)       
        ->where('packages.rid',$rid[0]->rid)
        ->orderBy('pbid', 'DESC')
        ->get();
        // return $rbooking;
        return view('Owner.packagebooking')->with(['data' => $data,'rbooking' => $rbooking]);
    }
    public function vbookingsearch(Request $request){
        $today = Carbon::now();
        $today1 = $today->format("m/d/Y");
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
        ->where('vbookings.vcidate','<=',$request->cidate)
        ->where('vbookings.vcodate','>=',$request->cidate)
        ->where('vbookings.vbstatus',1)
        ->orderBy('vbid', 'DESC')
        ->get();
        return view('Owner.vehiclebooking')->with(['data' => $data, 'rbooking' => $rbooking]);
    }
}
