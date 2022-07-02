<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    
    <table border="1" class="table">
    <thead class="thead-dark">
        <h3 colspan="2" align="center">New Medicine Added</h3>
        <h4 colspan="2" align="right"><a href="dashboard" style="btn btn-danger">Back</a></h4>
    <tr>
        <th>Serial</th>
        <th>Medicine Name</th>
        <th>Price</th>
        <th>Medicine Type</th>
        <th>Availability</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <h1>{{$supplier->supplier_name}}</h1>
        
    @foreach ($medicines as $m)
    <tr>
        <td>{{$m->medicine_id}}</td>
        <td><a href="{{route('medicine.edit',['id'=>$m->medicine_id])}}">{{$m->medicine_name}}</a></td>
        <td>{{$m->price}}</td>
        <td>{{$m->details}}</td>
        <td>{{$m->availability}}</td>
        <td><a class="btn btn-primary" href="{{route('medicine.edit',['id'=>$m->medicine_id])}}">Edit</a></td>
        <td><a class="btn btn-danger" href="{{route('medicine.delete',['id'=>$m->medicine_id])}}">Delete</a></td>
    </tr>
    @endforeach
   
    </tbody>
    </table>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
    </body>
  
</html>
