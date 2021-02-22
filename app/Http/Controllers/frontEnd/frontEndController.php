<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class frontEndController extends Controller
{
    public function index(){
        return view('frontEnd.index');
    }
    public function clientlogin(){
        return view('frontEnd.pages.clientlogin');
    }

    public function register(){
        return view('frontEnd.pages.register');

    }
    public function save(Request $request){
        $clientemail=Client::where('email',$request->email)->first();
    	 $clientphone=Client::where('phone',$request->phone)->first();

        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'organization'=>'required',
            'street'=>'required',
            'city'=>'required',
            'phone'=>'required|unique:clients',
            'email'=>'required|unique:clients',
        ]);

        $store_data= new Client();
        $password=$request->password;
        $con_password=$request->confirm_password;

        if($password == $con_password){
        $store_data->firstName=$request->firstName;
        $store_data->lastName=$request->lastName;
        $store_data->organization=$request->organization;
        $store_data->street=$request->street;
        $store_data->city=$request->city;
        $store_data->phone=$request->phone;
        $store_data->email=$request->email;
        $store_data->password=md5($request->password);
        $store_data->save();
        Toastr::success('You are register successfully', 'success!');
        return redirect('/client');
        }else{
            Toastr::warning('Password does not match');
        return redirect()->back();
            // return redirect('/client/register')->with('message', 'password does not match');
        }
        
    }

    public function login(Request $request){
        $clients=Client::where('phone',$request->phone)->first();
        $clientId=$clients->id;
       if($clients){
           if($clients->password == md5($request->password) ){
               Toastr::success('you are login successfully','success!');
               return view('frontEnd.pages.license',compact('clientId'));
           }else{
            Toastr::warning('password does not match');
            return redirect()->back();;
           }
       }else{
        Toastr::warning('password or phone does not match');
        return redirect()->back();
    }
    }
    
    // public function generatekey(Request $request){
    //     $clients=Client::where('id',$request->id)->first(); 
    //     if($clients){
    //         $clientId = $clients->id; 
    //         $expireDate = "2021-05-21"; ///Date() + $request->month * 30;
    //         $plainKey = $clientId . "#" . $expireDate;
    //         $encryptedkey = base64_encode($plainKey);
            // $clients->License_Key = $encryptedkey;
            // $clients->expire_date = $expireDate;
            // $clients->save();
    //     }

    // }
    // public function validatekey(Request $request){
    //     $encryptedkey = $request->key;
    //     $plainKey = base64_decode($encryptedkey);
    //     $keys = explode("#", $plainKey);
    //     $clientId = $keys[0];
    //     $expireDate = $keys[1];
    //     if($expireDate <= Date()){
    //         return "expired";
    //     }
    //     else {
    //         return "Not expired";
    //     }
    // }

    public function generatekey(Request $request){
        
        $client=Client::where('id',$request->clientID)->first();
        if($client){
            if($request->months== "1"){
                $clientId = $client->id;
                $expireDate = Carbon::now()->addDays(90);
                $client->expire_date = $expireDate;
                $client->save();
                $plainKey = $clientId . "#" . $expireDate;
                $encryptedkey = base64_encode($plainKey);
                return view('frontEnd.pages.keypass',compact('clientId','encryptedkey'));
            }
            if($request->months== "2"){
                $clientId = $client->id;
                $expireDate = Carbon::now()->addDays(180);
                $client->expire_date = $expireDate;
                $client->save();
                $plainKey = $clientId . "#" . $expireDate;
                $encryptedkey = base64_encode($plainKey);
                return view('frontEnd.pages.keypass',compact('clientId','encryptedkey'));
            }
            if($request->months== "3"){
                $clientId = $client->id;
                $expireDate = Carbon::now()->addDays(365);
                $client->expire_date = $expireDate;
                $client->save();
                $plainKey = $clientId . "#" . $expireDate;
                $encryptedkey = base64_encode($plainKey);
                return view('frontEnd.pages.keypass',compact('clientId','encryptedkey'));
            }

        }else{
            Toastr::warning('client not found', 'warning !');
            return redirect()->back();
        }

    }

    public function savekey(Request $request){
        $client=Client::find($request->clientID);
        $client->licence_key = $request->license_key;
        $client->save();
        Toastr::success('Congratulations!! Your License Has Been Activated. It will work till'.$client->expire_date);
        return redirect('/client');
       
    }
}


