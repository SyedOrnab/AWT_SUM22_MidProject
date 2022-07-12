@extends('layouts.loggedindash')
@section('content')
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    <h3 colspan="2" align="center">Medicine List</h3>
    <hr>
    <table border="1" class="table" class="col-5">
    <thead class="thead-dark">
    <tr>
        <th>Product Photo</th>
        <th>Medicine Name</th>
        <th>Price(BDT)</th>
        <th>Medicine Type</th>
        <th>Availability</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <h4 align="center">Medicine Added by {{$supplier->supplier_name}}</h4>
        <div align="right"><a class="btn btn-primary"  href="supmedicine" >Add</a></div>
    @foreach ($medicines as $m)
    <tr>
        
        <td>
            <img src="{{ asset('storage/mediimage/'.$m->productpic) }}" width="100px;" height="100px;" alt="image">
        </td>
        <td><a href="{{route('medicine.details',['medicine_name'=>$m->medicine_name,'details'=>$m->details,'price'=>$m->price,'availability'=>$m->availability])}}">{{$m->medicine_name}}</a></td>
        <td>{{$m->price}}</td>
        <td>{{$m->details}}</td>
        <td>{{$m->availability}}</td>
        <td><a class="btn btn-primary" href="{{route('medicine.edit',['id'=>$m->medicine_id])}}">Edit</a> || <a class="btn btn-danger" href="{{route('medicine.delete',['id'=>$m->medicine_id])}}">Delete</a></td>
    </tr>
    @endforeach
   
    </tbody>
    </table>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
    </body>
  
</html>
@endsection
