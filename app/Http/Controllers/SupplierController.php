<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Suptoken;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
//use Hash;
use Session;
use DateTime;

class SupplierController extends Controller
{
    public function suplogin()
    {
        return view ("supplier.suplogin");
    }

    public function supregistration()
    {
        return view ("supplier.supregistration");
    }

    public function supregister(Request $req)
    {
        
        $validator = Validator::make($req-> all(),
            [
                'supplier_name'=>'required',
                'supplier_email'=>'required|unique:suppliers|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
                'supplier_mob'=>'required|regex:/^([0]{1}[1]{1}[7-9]{1}[0-9]{8})+$/i',
                'supplier_add'=>'required',
                'password'=>'required|max:8|min:5|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/',
                'confirm_password' =>'required|min:5|same:password'
            ],
            // [
            //     'supplier_mob.regex'=>'Your phone number is invalid or should not exceed 11 numbers',
            //     'supplier_email.regex'=>'Email must contain @ and .com',
            //     'password.min' =>'Password must be at least 5 numbers',
            //     'password.regex' =>'Password must contain atleast one upper and lower case letters and digit and @!$#% symbols',
            //     'confirm_password.same'=>'Password must be same',
            //     'confirm_password.min' =>'Password must be at least 5 numbers',
            // ]

        );
        if($validator->fails())
        {
            return response()->json($validator->errors(),422);
        }
        $supplier = new supplier();
        $supplier->supplier_name = $req->supplier_name;
        $supplier->supplier_email = $req->supplier_email;
        $supplier->supplier_mob = $req->supplier_mob;
        $supplier->supplier_add = $req->supplier_add;
        $supplier->password = $req->password;
        $supplier->confirm_password = $req->confirm_password;
        $res = $supplier->save();

        // if($res)
        // {
        //     return back()->with('success','You have successfully created a new supplier');
        // }else{
        //     return back()->with('error','There was an error');
        // }
    }

    // public function suplog(Request $req)
    // {
    //     $validator = Validator::make($req-> all(),
    //         [
    //             'supplier_email'=>'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
    //             'password'=>'required|max:8|min:5|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/'
    //         ],
    //         // [
    //         //     'supplier_email.regex'=>'Invalid Email',
    //         //     'password.regex'=>'Password Incorrect',
    //         // ]
    //     );
    //     if($validator->fails())
    //     {
    //         return response()->json($validator->errors(),422);
    //     }
    //     $user = Supplier::where('supplier_email', '=', $req->supplier_email)
    //     ->where('password',$req->password)->first();
    //      if($user){
    //          //session()->put('logged',$user->supplier_id);

    //          return response()->json('dashboard');    
    //      }

    //     // else {

    //     //session()->flash('msg','User not valid');

    //     //    return back()->with('error','Email or password incorrect');

    //     // }
    // }

    public function suplog(Request $request)
    {
        $supplier = Supplier::where('supplier_email',$request->email)->where('password',$request->password)->first();
        if($supplier)
        {
            $api_token = Str::random(64);
            $token = new Suptoken();
            $token->supid = $supplier->supplier_id;
            $token->token = $api_token;
            $token->created_at = new DateTime();
            $token->save();
            return $token;
        }
        return "No user available";
    }

    public function dashboard()
    {
        $user=Supplier::where('supplier_id',session()->get('logged'))->first();
        return view('supplier.dashboard')->with('user',$user);        
        //return response()->json($user);
    }

    public function singlesupplier(Request $req){
       
        $sup = Supplier::where('id',$req->id)->first();
        if($sup){
            return response()->json($st,300);
        }
        return response()->json(["msg"=>"notfound"],404);
  }
    public function supplierupdate(Request $req){
        $sup = Supplier::where('id',$req->id)->first();
    
        $st->name = $req->name;
        $st->email = $req->email;
        $st->sid = $req->sid;
        $res = $st->save();
        if($res){

            return response()->json(["msg"=>"Supplier update successfull"],200);
        }
        
    }

    public function supllierdelete(Request $req){

        $st = Student::where('id',$req->id)->first();
        $res = $st->delete();
        if($res){
        
        return response()->json(["msg"=>"Supplier delete successfull"],200);
    }
    else{
        return response()->json(["msg"=>"Error"],403);
    }
    }
}
