@extends('layouts.loggedin')
@section('content')
<form action="{{route('supmedicine.info')}}" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                    @endif
                    @csrf
                    <fieldset>
                        <h1 colspan="2" align="center">Medicine Info</h1>
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
                            <tr align="right">
                                <td colspan="2" align="center"><input type="submit" value="Add"></td>
                            </tr>
                        </table>
                    </fieldset>
                   
                </form>
@endsection


