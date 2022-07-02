<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Hash;
use Session;
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
        $req -> validate(
            [
                'supplier_name'=>'required',
                'supplier_email'=>'required|unique:suppliers|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
                'supplier_mob'=>'required|regex:/^[0-9]{11}+$/',
                'supplier_add'=>'required',
                'password'=>'required|max:8|min:5'
            ],
            [
                'supplier_email.regex'=>'Invalid Email',
            ]

        );
        $supplier = new supplier();
        $supplier->supplier_name = $req->supplier_name;
        $supplier->supplier_email = $req->supplier_email;
        $supplier->supplier_mob = $req->supplier_mob;
        $supplier->supplier_add = $req->supplier_add;
        $supplier->password = $req->password;
        $res = $supplier->save();

        if($res)
        {
            return back()->with('success','You have successfully created a new supplier');
        }else{
            return back()->with('error','There was an error');
        }
    }

    public function suplog(Request $req)
    {
        $req -> validate(
            [
                'supplier_email'=>'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
                'password'=>'required|max:8|min:5'
            ],
            [
                'supplier_email.regex'=>'Invalid Email',
            ]
        );
        $user = Supplier::where('supplier_email', '=', $req->supplier_email)
        ->where('password',$req->password)->first();
        if($user){
            session()->put('logged',$user->supplier_id);
            return redirect()->route('dashboard');    
        }

        else {

          session()->flash('msg','User not valid');

        return back();

        }
    }
    public function dashboard()
    {
        $user=Supplier::where('supplier_id',session()->get('logged'))->first();
        return view('supplier.dashboard')->with('user',$user);

        
    }
}
