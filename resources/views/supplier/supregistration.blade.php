@extends('layouts.loggedin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Supplier Registeration</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4.col-md-offset-4" style="margin: top 20px;"> 
                <form action="{{route('sup-register')}}" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                    @endif
                    @csrf
                    <fieldset>
                        <h1 colspan="2" align="center">Register</h1>
                        <hr>
                        <table colspan="2" align="center">
                            <tr align="right">
                                <td>Name:</td>
                                <td><input type="text" name="supplier_name" placeholder="Enter supplier name" value="{{old('supplier_name')}}">
                                <br>
                                <span class="text-danger">
                                        @error('supplier_name')
                                        {{$message}}
                                        @enderror
                                </span>
                            </td>
                                
                            </tr>
                            <tr align="right">
                                <td>Email:</td>
                                <td><input type="email" name="supplier_email" placeholder="Enter email address" value="{{old('supplier_email')}}">
                                <br>
                                <span class="text-danger">
                                        @error('supplier_email')
                                        {{$message}}
                                        @enderror
                                </span>
                            </td>
                               
                            </tr>
                            <tr align="right">
                                <td>Moblie number:</td>
                                <td><input type="integer" name="supplier_mob" placeholder="Enter supplier moblie number" value="{{old('supplier_mob')}}">
                                <br>
                                <span class="text-danger">
                                        @error('supplier_mob')
                                        {{$message}}
                                        @enderror
                                </span>
                            </td>
                            </tr>
                            <tr align="right">
                                <td>Address:</td>
                                <td><input type="text" name="supplier_add" placeholder="Enter supplier address" value="{{old('supplier_add')}}">
                                <br>
                                <span class="text-danger">
                                        @error('supplier_add')
                                        {{$message}}
                                        @enderror
                                </span>
                            </td>
                            </tr>
                            <tr align="right">
                                <td>Password:</td>
                                <td><input type="password" name="password" placeholder="Enter supplier password">
                                <br>
                                <span class="text-danger">
                                        @error('password')
                                        {{$message}}
                                        @enderror
                                </span>
                            </td>
                            </tr>
                            <tr align="right">
                                <td>Confirm Password:</td>
                                <td><input type="password" name="confirm_password" placeholder="Enter supplier password">
                                <br>
                                <span class="text-danger">
                                        @error('confirm_password')
                                        {{$message}}
                                        @enderror
                                </span>
                            </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input class="btn btn-primary" type="submit" value="Register"></td>
                            </tr>
                            <tr>  
                                <td colspan="2" align="center"><a href="suplogin">Already Registered! Click Here</a></td>
                            </tr>
                        </table>
                    </fieldset>
                   
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
@endsection