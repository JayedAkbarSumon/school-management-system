<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;

class AdminController extends Controller
{
    public function login(){
    	return view('login');
    }
    public function admin(){
    	return view('adminpanel');
    }
    public function addNewUser(){
    	return view('addUser');
    }
    public function userMaintain(){
        return view('maintainUser');
    }
    public function userLogin(Request $req){
    	 
    	$email = $req->email;
    	$password = $req->pass;
    	$user = User::where('email','=',$email)->where('password','=',$password)->first();
    	 if($user)
        {
        	Session::put('userid',$user->id);
            Session::put('username',$user->first_name);
            Session::put('useremail',$user->email);
            Session::put('usertype',$user->role);

            return redirect('/adminpanel');
        }
        else
        {
            return redirect()->back()->with('msg',"The email or password you entered is incorrect");
        }

    }
     public function userInfoSave(Request $reg){
        //dd('hi');
        $firstName = $reg->first_name;
        $lastName = $reg->last_name;
        $email = $reg->email;
        $password = $reg->password;
        $userType = $reg->role;
        $address = $reg->address;
        $phone = $reg->phone;
        $age = $reg->age;
        $gender = $reg->gender;

        
        

        //dd($gender);

        $obj = new User();
        $obj->first_name = $firstName;
        $obj->last_name = $lastName;
        $obj->age = $age;
        $obj->gender = $gender;
        $obj->address = $address;
        $obj->phone = $phone;
        $obj->email = $email;
        $obj->password = $password;
        $obj->role = $userType;

        if($reg->hasFile('img')){

           $obj->image = $reg->img->store('public/images');
        }
        
        if($obj->save()){
        return redirect()->back()->with('msg',"successfully saved");
        }
    }

    public function userLogout(Request $req){
       $req->session()->flush();
      return redirect('/');
    }
}
