<?php

namespace App\Http\Controllers;
use  Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Supplier;

class MedicineController extends Controller
{
    public function supmedicine()
    {
        return view('medicine.supmedicine');
    }

    public function supmedicineinfo(Request $request)
    {
        //return $request->file('medi_image')->getClientOriginalName();

        $request -> validate(
            [
                'medicine_name' => 'required|unique:medicines|regex:/^[A-Z a-z]+$/',
                'price' => 'required|regex:/^([0-9])+$/i',
                'details' => 'required|regex:/^[A-Z a-z]+$/',
                'availability' => 'required|regex:/^([0-9])+$/i',
                'medi_image' => 'required|mimes:jpg,png'
            ],
            [
                'availability.regex' => 'Please insert numbers only',
                'price.regex' => 'Please insert numbers only',
                'details.regex' => 'Medicine Type must not contain numbers',
                'medicine_name.regex' => 'Medicine Name must not contain numbers',
                'medicine_name.unique' => 'You or another supplier already insert this Medicine Name',
                'medi_image.required' => 'Please Insert jpg or png images',
            ]
        );
        $medifileName = $request->medicine_name.'.'.$request->file('medi_image')->getClientOriginalExtension();
        $request->file('medi_image')->storeAs('public/mediimage/', $medifileName);
        //$request->file('medi_image')->store('public/uploads');  // storage->public->uploads
        $user=session()->get('logged');
        //$supplier = Supplier::where('supplier_id', $user)->get();
        $medi = new Medicine();
        $medi->productpic = $medifileName;
        $medi->medicine_name = $request->medicine_name;
        $medi->price = $request->price;
        $medi->details = $request->details;
        $medi->availability = $request->availability;
        $medi->supplier_id = $user;
        $medi->save();
        if($medi)
        {
            //$request->session()->put('medicine_name', $medi->medicine_name);
            //$request->session()->put('price', $medi->price);
            //$request->session()->put('details', $medi->details);
            //$request->session()->put('availability', $medi->availability);
            //return back()->with('success','You have successfully added a new medicine list');
            return redirect('supmedicinelist')->with('status','Successfully added a new Medicine');
        }else{
            return back()->with('error','There was an error');
        }
        
    }

    public function supmedicinecreate()
    {
        return view('medicine.supmedicinecreate');
    }

    public function supmedicinelist(Request $request)
    {
        $medicines = Medicine::paginate(2);
        $user=session()->get('logged');
        $supplier = Supplier::where('supplier_id', session()->get('logged'))->first();
      //  $medicines = Medicine::paginate(5);
       // return view('medicine/supmedicinelist')->with('medicines',$medicines)
                                            //   ->with('supplier',$supplier);


         $medicines=DB::table('medicines')
         ->join('suppliers','medicines.supplier_id','=','suppliers.supplier_id')
         ->where('suppliers.supplier_id',$user)->select('medicines.*','suppliers.*')              
         ->get();
                                             
         return view('medicine/supmedicinelist',compact('medicines'))->with('medicines',$medicines)->with ('supplier',$supplier);
                                               
    }

    public function supmedicineget()
    {
        return view('medicine.supmedicineget')->with('medicine_name',$req->medicine_name)->with('price',$req->price)->with('details',$req->details)->with('availability',$req->availability);
    }

    public function supmedicinedetails(Request $req)
    {
        return view('medicine.supmedicineget')->with('medicine_name',$req->medicine_name)->with('price',$req->price)->with('details',$req->details)->with('availability',$req->availability);
    }

    public function supmedicineedit($id)
    {
        $medi = Medicine::where('medicine_id',$id)->get();
        
        return view('medicine.supmedicineedit')->with('medi',$medi);
    }

    public function editmedicine(Request $req)
    {
        $medi = Medicine::where('medicine_name',$req->medicine_name)->first();
        if($medi)
        {
            $medi->price = $req->price;

        $medi->availability = $req->availability;

        $medi->save(); // update
        
        session()->flash('msg','Medicine Updated Successfully');
        return redirect('supmedicinelist');
        }
        else{
            session()->flash('msg','Medicine is not available');

            return back();
        }
    }

    public function supmedicinedelete($medicine_id) {

        Medicine::destroy($medicine_id);
    
         return redirect()->back();
    
     }
}
