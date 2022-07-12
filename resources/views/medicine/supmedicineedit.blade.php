<html>
    <head>
    
    </head>
    <body>
        

    <form action="{{route('medi.edit')}}" method="post">
        @csrf
                    <fieldset align="center" >
                    @php
                    $title=" <script>alert('**You can edit price & availability only**')</script><h1 style='color:green'>Medicine Update</h1> ";
                    @endphp
                        <div><h1><?php echo $title;?></h1></div>
                        <hr> 
                        {{session()->get('msg')}}         
                        @foreach($medi as $med)             
                        <table colspan="2" align="center">
                        <tr align="right">
                                <td>Medicine Id:</td>
                                <td><input type="text" name="medicine_id" placeholder="Enter medicine id" value="{{$med->medicine_id}}">
                            </td>
                                
                            </tr>
                            <tr align="right">
                                <td>Medicine Name:</td>
                                <td><input type="text" name="medicine_name" placeholder="Enter medicine name" value="{{$med->medicine_name}}">
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
                                <td><input type="integer" name="price" placeholder="Enter price" value="{{$med->price}}">
                                <br>
                                <span class="text-danger">
                                        @error('price')
                                        {{$message}}
                                        @enderror
                                </span>
                            </td>
                            </tr>
                            <tr align="right">
                                <td>Availability:</td>
                                <td><input type="integer" name="availability" placeholder="How much medicines are available" value="{{$med->availability}}">
                                <br>
                                <span class="text-danger">
                                        @error('availability')
                                        {{$message}}
                                        @enderror
                                </span>
                            </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input type="submit" value="Update"></td>
                            </tr>
                        </table>
                        @endforeach
                    </fieldset>
                   
                </form>
    </body>
</html>