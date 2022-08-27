<?php

namespace App\Http\Controllers;
use  Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;


class MedicineController extends Controller
{
    public function supmedicine()
    {
        return view('medicine.supmedicine');
    }

    public function supmedicineinfo(Request $request)
    {
        //return $request->file('medi_image')->getClientOriginalName();

        // $validator = Validator::make($request-> all(),
        //     [
        //         'medicine_name' => 'required|unique:medicines|regex:/^[A-Z a-z]+$/',
        //         'price' => 'required|regex:/^([0-9])+$/i',
        //         'details' => 'required|regex:/^[A-Z a-z]+$/',
        //         'availability' => 'required|regex:/^([0-9])+$/i',
        //         //'medi_image' => 'required|mimes:jpg,png'
        //     ]
        // );
        // if($validator->fails())
        // {
        //     return response()->json($validator->errors(),422);
        // }

        Log::info('This is some useful information.');
        $medi = new Medicine();
       // $medi->productpic = $request->medi_image;
        $medi->medicine_name = $request->medicine_name;
        $medi->price = $request->price;
        $medi->details = $request->details;
        $medi->availability= $request->availability;
       // $medi->supplier_id = $user;
        $medi->save();
        return response()->json(
            [
                "msg"=>"Update",
                "data"=>$medi 
            ]
            );
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
     function medicinedetails(){

        $med = Medicine::all();

        return response()->json($med);
}


}
