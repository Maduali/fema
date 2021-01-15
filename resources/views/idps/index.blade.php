  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <style>
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
            <div class="card" style="margin-top: 15px;">
                <div class="card-header"><img src="{{ URL::to('img/image2.png') }}" style="width:10vw; float: left;"></div>
  
                    <div class="card-body">
         <table class="table">
                      
                    <a href="{{ route('idps.create.step.one') }}" class="btn btn-primary pull-right">New IDP</a>

           
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                        <thead class="thead-dark">
                        <tr><form class="example" action="/action_page.php">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit">hello</i></button>
</form></tr>
                        <tr>
                            <th scope="col">Full Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Age</th>
                            <th scope="col">Location</th>
                            <th scope="col">Occupation</th>
                            <th scope="col">CoD</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($idps as $idp)
                            <tr>
                                <td>{{$idp->household_name}}</td>
                                <td>{{$idp->gender}}</td>
                                <td>{{\Carbon\Carbon::parse($idp->dob)->age}}</td>
                                <td>{{$idp->location}}</td>
                                <td>{{$idp->occupation}}</td>
                                <td>{{$idp->cause}}</td>
                                <td>{{$idp->status}}</td>
                                <td><a href="{{ route('admin.edit', $idp->main_id) }}"> edit</a>     
                                <a href="{{route('admin.delete', $idp->main_id )}}"> delete</a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
    <span style="float: right;">{{$idps->links("pagination::bootstrap-4")}}</span>
@extends('layouts.default')
@endsection