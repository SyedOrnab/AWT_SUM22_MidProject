@extends('layouts.loggedindash')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<form action="{{route('supmedicine.info')}}" method="post" enctype="multipart/form-data">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                    @endif
                    @csrf
                    <fieldset>
                        <h1 colspan="2" align="center">Insert Medicine</h1>
                        <hr>
                        <table colspan="2" align="center">
                            <tr align="right">
                                <td>Medicine Name:</td>
                                <td><input type="text" name="medicine_name" placeholder="Enter medicine name" value="{{old('medicine_name')}}">
                                <br>
                                <span class="text-danger">
                                        @error('medicine_name')
                                        {{$message}}
                                        @enderror
                                </span>
                            </td>
                                
                            </tr>
                            <tr align="right">
                                <td>Price:</td>
                                <td><input type="integer" name="price" placeholder="Enter price" value="{{old('price')}}">
                                <br>
                                <span class="text-danger">
                                        @error('price')
                                        {{$message}}
                                        @enderror
                                </span>
                            </td>
                               
                            </tr>
                            <tr align="right">
                                <td>Medicine Type:</td>
                                <td><input type="text" name="details" placeholder="Enter medicine type" value="{{old('details')}}">
                                <br>
                                <span class="text-danger">
                                        @error('details')
                                        {{$message}}
                                        @enderror
                                </span>
                            </td>
                            </tr>
                            <tr align="right">
                                <td>Availability:</td>
                                <td><input type="integer" name="availability" placeholder="How much medicines are available" value="{{old('availability')}}">
                                <br>
                                <span class="text-danger">
                                        @error('availability')
                                        {{$message}}
                                        @enderror
                                </span>
                            </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input type="file" name="medi_image"></td>
                                
                                <span class="text-danger">
                                        @error('medi_image')
                                        {{$message}}
                                        @enderror
                                </span>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input class="btn btn-primary" type="submit" value="Insert"></td>
                            </tr>
                        </table>
                    </fieldset>
                   
                </form>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
@endsection


