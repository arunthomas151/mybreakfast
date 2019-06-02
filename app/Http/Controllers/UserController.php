<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use DateTime;
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

class UserController extends Controller
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
        // return $data;
        // $data = Profile::select('prid','image')->where('rid',$rid[0]->rid)->get();
        if(!$data->count())
        {
            $data = Profile::select('image')->where('prid',1)->get();
            return view('User.profile')->with(['data' => $data]);
        }
        else
        {
            return view('User.home1')->with(['data' => $data]);
        }
    }
    public function profile(){
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
    return view('User.viewprofile')->with(['data' => $data]);
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
    return redirect('uprofile');
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
    return view('User.profileedit')->with(['data' => $data,'states' => $states]);
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
        return redirect('uprofile');
}
    public function urooms(){
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
        ->join('districts','districts.did','=','homes.did')
        ->join('states','states.sid','=',"districts.sid")
        ->join('places','places.pid','=','homes.pid')
        ->select('rooms.*','roomtypes.*','rents.*','homes.*','districts.*','places.*','states.*')
        ->where('rooms.nrstatus', 1)        
        ->get();
        // return $room;
        $breakfast = DB::table('breakfasts')
        ->join('bfoods','bfoods.bfid','=', 'breakfasts.bfid')
        ->select('breakfasts.*','bfoods.*')
        ->where('breakfasts.bstatus',1)
        ->get();
        $states=State::where('status',1)->get();
        // return $breakfast;
        return view('User.rooms')->with(['data' => $data, 'room' => $room, 'breakfast' =>$breakfast,'states' => $states]);
    }
    public function roomsearch(Request $request){
        // return $request;
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
        ->join('districts','districts.did','=','homes.did')
        ->join('states','states.sid','=',"districts.sid")
        ->join('places','places.pid','=','homes.pid')
        ->select('rooms.*','roomtypes.*','rents.*','homes.*','districts.*','places.*','states.*')
        ->where('homes.did',$request->district1)
        ->where('rooms.nrstatus', 1)        
        ->get();
        // return $room;
        $breakfast = DB::table('breakfasts')
        ->join('bfoods','bfoods.bfid','=', 'breakfasts.bfid')
        ->select('breakfasts.*','bfoods.*')
        ->where('breakfasts.bstatus',1)
        ->get();
        $states=State::where('status',1)->get();
        // return $breakfast;
        return view('User.rooms')->with(['data' => $data, 'room' => $room, 'breakfast' =>$breakfast,'states' => $states]);
    }
    public function package(){
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
        ->get();
        // return $package;
        return view('User.packages')->with(['data' => $data, 'package' => $package]);
    }
    public function ubooking(){
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
        ->where('rbookings.rid',$rid[0]->rid)
        ->where('rbookings.rbstatus',2) 
        ->where('rbookings.codate', '>=', $today1)
        ->where('rbookings.cidate', '>=', $today1)
        ->orderBy('cidate', 'DESC')
        ->get();
        $obooking =DB::table('rbookings')
        ->join('rooms','rooms.nrid','=','rbookings.nrid')
        ->join('rents','rents.reid','=','rooms.reid')
        ->where('rbookings.rid',$rid[0]->rid)
        ->where('rbookings.rbstatus',1)
        ->where('rbookings.codate', '<', $today1)
        ->orderBy('cidate', 'DESC')
        ->get();
        // return $rbooking;
        return view('User.bookings')->with(['data' => $data,'rbooking' => $rbooking, 'obooking' => $obooking,'today' => $today]);
    }
    // public function bbooking(){
        // $rid = Register::select('rid')->where('lid',Auth::id())->get();
        // $data = Profile::select('prid','image')->where('rid',$rid[0]->rid)->get();
        // $rbooking =DB::table('bbookings')
        // ->join('rooms','rooms.nrid','=','rbookings.nrid')
        // ->join('rents','rents.reid','=','rooms.reid')
        // ->where('rbookings.rid',$rid[0]->rid)
        // ->where('rbookings.rbstatus',1)
        // ->get();
        // return view('User.bookings')->with(['data' => $data,'rbooking' => $rbooking]);
    // }
    public function vibooking(){
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
        ->where('vbookings.rid',$rid[0]->rid)
        ->where('vbookings.vbstatus',1)
        ->where('vbookings.vcodate', '>=', $today1)
        ->orderBy('vcodate', 'DESC')
        ->get();
        $obooking =DB::table('vbookings')
        ->join('vehicles','vehicles.vid','=','vbookings.vid')
        ->join('vehiclerents','vehiclerents.vid','vehicles.vid')
        ->join('rents','rents.reid','=','vehiclerents.reid')
        ->where('vbookings.rid',$rid[0]->rid)
        ->where('vbookings.vbstatus',1)
        ->where('vbookings.vcodate', '<', $today1)
        ->orderBy('vcidate', 'DESC')
        ->get();
        // return $rbooking;
        return view('User.vehiclebooking')->with(['data' => $data,'rbooking' => $rbooking,'obooking' => $obooking,'today' => $today]);
    }
    public function pibooking(){
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
        ->join('rents','rents.reid','=','packages.reid')
        ->join('rooms','rooms.nrid','=','packages.nrid')
        ->join('homes','homes.rmid','=', 'rooms.rmid')
        ->join('breakfasts','breakfasts.bid','=','packages.bid')
        ->join('bfoods','bfoods.bfid','=', 'breakfasts.bfid')
        ->join('vehicles','vehicles.vid','=','packages.vid')
        ->join('districts','districts.did','=','homes.did')
        ->join('states','states.sid','=',"districts.sid")
        ->join('places','places.pid','=','homes.pid')
        ->select('packages.*','rents.*','rooms.*','breakfasts.*','vehicles.*','bfoods.*','homes.*','pbookings.*','districts.*','places.*','states.*')
        ->where('pbookings.pbstatus', 1)        
        ->where('pbookings.rid',$rid[0]->rid)
        ->where('pbookings.pbdate','>=' ,$today1)
        ->orderBy('pbdate', 'DESC')
        ->get();
        $obooking = DB::table('pbookings')
        ->join('packages','packages.pkid','=','pbookings.pkid')
        ->join('rents','rents.reid','=','packages.reid')
        ->join('rooms','rooms.nrid','=','packages.nrid')
        ->join('homes','homes.rmid','=', 'rooms.rmid')
        ->join('breakfasts','breakfasts.bid','=','packages.bid')
        ->join('bfoods','bfoods.bfid','=', 'breakfasts.bfid')
        ->join('vehicles','vehicles.vid','=','packages.vid')
        ->join('districts','districts.did','=','homes.did')
        ->join('states','states.sid','=',"districts.sid")
        ->join('places','places.pid','=','homes.pid')
        ->select('packages.*','rents.*','rooms.*','breakfasts.*','vehicles.*','bfoods.*','homes.*','pbookings.*','districts.*','places.*','states.*')
        ->where('pbookings.pbstatus', 1)        
        ->where('pbookings.rid',$rid[0]->rid)
        ->where('pbookings.pbdate','<' ,$today1)
        ->orderBy('pbdate', 'DESC')
        ->get();
        // return $rbooking;
        return view('User.packagebooking')->with(['data' => $data,'rbooking' => $rbooking, 'obooking' => $obooking,'today' => $today]);
    }
    public function saveprofile(Request $request){
        // return $request;
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
        return redirect('user');
    }
    public function cpassword(){
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        return view('User.changepassword')->with(['data' => $data]);
    }
    public function savepassword(Request $request){
        User::where('id',Auth::id())->update([
            'password' => Hash::make($request['cpassword'])
        ]);
        return redirect('user');;
    }
    public function rbooking(Request $request){
        // return $request;
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $fdate = $request->codate;
        $tdate = $request->cidate;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $intreval = $datetime1->diff($datetime2);
        $days = $intreval->format('%a');
        $rents =DB::table('rooms')
        ->join('rents','rents.reid','=','rooms.reid')
        ->where('rooms.nrid',$request->roomid)
        ->select('rents.rent')
        ->get();
        $total = $days * $rents[0]->rent;
        $brents =DB::table('breakfasts')
        ->join('rents','rents.reid','=','breakfasts.reid')
        ->where('breakfasts.bid',$request->breakfastid)
        ->select('rents.rent')
        ->get();
        $total1 = $days * $brents[0]->rent;
        $gtotal = $total + $total1;
        Rbooking::create([
            'rid'=> $rid[0]->rid,
            'nrid' => $request['roomid'],
            'bid' => $request['breakfastid'],
            'cidate' => $request['cidate'],
            'codate' => $request['codate'],
            'nop' => $request['nop'],
            'amount' => $gtotal,
            'rbstatus' => 2
        ]);
        if($request['needv'] == 1)
        {
            $data = DB::table('registers')
            ->join('profiles','profiles.rid','=','registers.rid')
            ->select('registers.u_name','profiles.image','profiles.prid')
            ->where('registers.rid',$rid[0]->rid)
            ->get();
            $roomid = $request['roomid'];
            $vehicle = DB::table('registers')
            ->join('vehicles','vehicles.rid','=','registers.rid')
            ->join('vehiclerents','vehiclerents.vid','=','vehicles.vid')
            ->join('rents','rents.reid','=','vehiclerents.reid')
            ->join('districts','districts.did','=','registers.u_did')
            ->join('states','states.sid','=',"districts.sid")
            ->join('profiles','profiles.rid','=','registers.rid')
            ->join('places','places.pid','=','profiles.placeid')
            ->select('vehicles.*','vehiclerents.*','rents.*','districts.*','places.*','states.*')
            ->where('vehicles.vstatus', 1) 
            ->where('registers.u_did',$request->disis)       
            ->get();
            // return $vehicle;
            return view('User.vehicle')->with(['data' => $data , 'vehicle' => $vehicle , 'roomid' => $roomid]);
        }
        else
        {
            return $this->payment1($request);
        }
    }
    public function vbooking(Request $request){
        // return $request;
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $fdate = $request->codate;
        $tdate = $request->cidate;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $intreval = $datetime1->diff($datetime2);
        $days = $intreval->format('%a');
        $rents =DB::table('vehicles')
        ->join('vehiclerents','vehiclerents.vid','=','vehicles.vid')
        ->join('rents','rents.reid','=','vehiclerents.reid')
        ->where('vehicles.vid',$request->vehicleid)
        ->select('rents.rent')
        ->get();
        $total = $days * $rents[0]->rent;
        Vbooking::create([
            'rid'=> $rid[0]->rid,
            'vid' => $request['vehicleid'],
            'nrid' => $request['roomid1'],
            'vcidate' => $request['cidate'],
            'vcodate' => $request['codate'],
            'vnop' => $request['nop'],
            'vamount' => $total,
            'vbstatus' => 2
        ]);
        return $this->payment2($request);
    }
    public function payment1(Request $request){
        // return $request;
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $pay = Rbooking::where('nrid',$request->roomid)->where('cidate',$request->cidate)
        ->get();
        $vpay = Vbooking::where('vid',1)
        ->get();
        return view('user.paymentc')->with(['data' => $data,'pay' => $pay ,'vpay' => $vpay]);
    }
    public function payment2(Request $request){
        // return $request;
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $pay = Rbooking::where('nrid',$request->roomid1)->where('cidate',$request->cidate)
        ->get();
        $vpay = Vbooking::where('vid',$request->vehicleid)->where('vcidate',$request->cidate)
        ->get();
        return view('user.paymentc')->with(['data' => $data,'pay' => $pay , 'vpay' => $vpay]);
    }
    public function pbooking(Request $request){
        // return $request;
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        Pbooking::create([
            'rid'=> $rid[0]->rid,
            'pkid' => $request['pkid'],
            'pbdate' => $request['cidate'],
            'pnop' => $request['nop'],
            'pbstatus' => 2
        ]);
        return $this->payment3($request);
    }
    public function payment3(Request $request){
        // return $request;
        $rid = Register::select('rid')->where('lid',Auth::id())->get();
        $data = DB::table('registers')
        ->join('profiles','profiles.rid','=','registers.rid')
        ->select('registers.u_name','profiles.image','profiles.prid')
        ->where('registers.rid',$rid[0]->rid)
        ->get();
        $pay = DB::table('pbookings')
        ->join('packages','packages.pkid','=','pbookings.pkid')
        ->join('rents','rents.reid','=','packages.reid')
        // ->where('pkid',$request->pkid)
        ->where('pbdate',$request->cidate)
        ->get();
        return view('user.paymentp')->with(['data' => $data,'pay' => $pay]);
    }
    public function ravailability(Request $request){
        $availability = Rbooking::where('nrid' , $request->nrid)
        ->where('rbstatus',1)
        ->where('codate','>=',$request->cidate)
        ->where('cidate','<=',$request->codate)
        ->get();
        if(!$availability->count())
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }
    public function vavailability(Request $request){
        $availability = Vbooking::where('vid' , $request->vehicleid)
        ->where('vbstatus',1)
        ->where('vcodate','>',$request->vcidate)
        ->where('vcidate','<',$request->vcodate)
        ->get();
        if(!$availability->count())
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }
    public function pavailability(Request $request){
        $availability = Pbooking::where('pkid' , $request->pkid)
        ->where('pbstatus',1)
        ->where('pbdate',$request->cidate)
        ->get();
        if(!$availability->count())
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }
    public function rbookcancel(Request $request){
        // return $request;
        Rbooking::where('rbid',$request->biikid)->update(['rbstatus' => 0]);
        return redirect('ubooking');
    }
    public function vbookcancel(Request $request){
        // return $request;
        Vbooking::where('vbid',$request->bookvid)->update(['vbstatus' => 0]);
        return redirect('vibooking');
    }
    public function pbookcancel(Request $request){
        // return $request;
        Pbooking::where('pbid',$request->pakgid)->update(['pbstatus' => 0]);
        return redirect('pibooking');
    }
    public function roomrating(Request $request){
        // return $request;
        $cou = Rrating::select('rcount')->where('rrid',$request['roomid1'])->get();
        $c = $cou[0]->rcount ;
        switch($request['rating'])
        {
            case 1:
                $c = $c - 5;
            break;
            case 2:
                $c = $c - 4;
            break;
            case 3:
                $c = $c - 3;
            break;
            case 4:
                $c = $c - 2;
            break;
            case 5:
                $c = $c - 1;
            break;
        }
        // return $c;
        Rbooking::where('rbid',$request->roombkid)->update(['rbstatus' => 2]);
        Rrating::where('rrid',$request['roomid1'])->update(['rcount' => $c]);
        return redirect('ubooking');

    }
    public function ratingpackage(Request $request){
        // return $request;
        $cou = Prating::select('pcount')->where('pkid',$request['packid'])->get();
        $c = $cou[0]->pcount ;
        switch($request['rating'])
        {
            case 1:
                $c = $c - 5;
            break;
            case 2:
                $c = $c - 4;
            break;
            case 3:
                $c = $c - 3;
            break;
            case 4:
                $c = $c - 2;
            break;
            case 5:
                $c = $c - 1;
            break;
        }
        // return $c;
        Prating::where('pkid',$request['packid'])->update(['pcount' => $c]);
        Pbooking::where('pbid',$request->packagebkid)->update(['pbstatus' => 2]);
        return redirect('pibooking');
    }
    public function ratingvehicle(Request $request){
        // return $request;
        $cou = Vrating::select('vcount')->where('vid',$request['vehicid'])->get();
        $c = $cou[0]->vcount ;
        switch($request['rating'])
        {
            case 1:
                $c = $c - 5;
            break;
            case 2:
                $c = $c - 4;
            break;
            case 3:
                $c = $c - 3;
            break;
            case 4:
                $c = $c - 2;
            break;
            case 5:
                $c = $c - 1;
            break;
        }
        // return $c;
        Vrating::where('vid',$request['vehicid'])->update(['vcount' => $c]);
        Vbooking::where('vbid',$request->vbookid)->update(['vbstatus' => 2]);
        return redirect('vibooking');
    }
    public function payment(Request $request){
        // return $request;
        Rbooking::where('rbid',$request->roomid)->update(['rbstatus' => 1]);
        Vbooking::where('vbid',$request->vehiid)->update(['vbstatus' => 1]);
        return redirect('user');
    }
    public function upayment(Request $request){
        // return $request;
        Pbooking::where('pbid',$request->pkid)->update(['pbstatus' => 1]);
        return redirect('user');
    }
    public function rcapacity(Request $request){
        $availability = DB::table('rooms')
        ->join('roomtypes','roomtypes.tid','=','rooms.tid')
        ->where('nrid' , $request->nrid)
        // ->where('capacity','>=',$request->cpy)
        ->select('roomtypes.capacity')
        ->get();
        if($availability->count())
        {
            return $availability[0]->capacity;
        }
    }
    public function vcapacity(Request $request){
        $availability = Vehicle::select('nofseat')
        ->where('vid' , $request->vid)
        ->get();
        if($availability->count())
        {
            return $availability[0]->nofseat;
        }
    }
    public function pcapacity(Request $request){
        $availability = DB::table('packages')
        ->join('rooms','rooms.nrid','=','packages.nrid')
        ->join('roomtypes','roomtypes.tid','=','rooms.tid')
        ->select('roomtypes.capacity')
        ->where('packages.pkid' , $request->pkid)
        ->get();
        if($availability->count())
        {
            return  $availability[0]->capacity;;
        }
    }
}