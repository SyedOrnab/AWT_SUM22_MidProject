@extends('layouts.loggedindash')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div style="margin: top 20px;" align="center"> 
               <h3 colspan="2" align="center">Welcome {{$user->supplier_name}}</h3>
               <hr>
               <a href="supmedicine" class="btn btn-primary">Medicine Insert</a>
               <a href="{{route('medicine.list')}}" class="btn btn-primary">Medicine List</a>
               <a href="{{route('medicine.details')}}" class="btn btn-primary">Medicine Details</a>
               <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
@endsection