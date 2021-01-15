@extends('layouts.default')
@section('content')

<head>
<title>Laravel 8 - Add/remove multiple input fields dynamically using Jquery</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container">
<div class="card mt-3">
<div class="card-header"><strong>Step 4: Kids Info</strong></div>
<div class="card-body">
<form action="{{ route('idps.create.step.four.post') }}" method="POST">
@csrf
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
@if (Session::has('success'))
<div class="alert alert-success text-center">
<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
<p>{{ Session::get('success') }}</p>
</div>
@endif
<table class="table table-bordered" id="dynamicAddRemove">  
<tr>
<th>Kids(s)</th>
 <th>Date of Birth</th>
    <th>Gender</th>
        <th> Disabilty </th>
        <th>Educational Qualification</th>
            <th>Occupation</th>
              <th>Skill Preferred</th>       
<th> </th>
</tr>
<tr>
<input type="hidden" name="moreFields[0][main_id]" placeholder="Full Name" value="{{$idp->main_id}}" class="form-control" />  
<input type="hidden" name="moreFields[0][household_name]" placeholder="Full Name" value="{{$idp->household_name}}" class="form-control" />  
<td><input type="text" name="moreFields[0][child_name]" placeholder="Full Name" class="form-control" /></td>
 <td><input type="date" name="moreFields[0][dob]"  class="form-control" /></td> <td> <input type='radio'  value="male" id="male" name="moreFields[0][gender]"/>
<label for="male">M</label><br><input type='radio'  value="female"  id="female" name="moreFields[0][gender]"/><label for="female">F</label></td>

                                <td> <input type="radio" value="yes" id="yes" name="moreFields[0][disability]">Y<br><input type="radio" value="no" id="no" name="moreFields[0][disability]">N</td>
                                <td> <input type='radio'  value="none" id="none" name="moreFields[0][education]"/>
                                <label for="fslc">NONE</label><br>
                                <input type='radio'  value="fslc"  id="fslc" name="moreFields[0][education]"/>
                                <label for="ssce">FSLC</label><br>
                                <input type='radio'  value="ssce"  id="ssce" name="moreFields[0][education]"/>
                                <label for="graduate">SSCE</label><br>
                                 <input type='radio'  value="GRAD"  id="GRAD" name="moreFields[0][education]"/>
                                 <label for="GRAD">GRAD</label> </td> 
                                 <td><input type="text" name="moreFields[0][occupation]"  class="form-control" /></td>
                                 <td><input type="text" name="moreFields[0][preferred_skill]"  class="form-control" /></td>     
<td><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button></td>  
</tr>  
</table> 
<div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('idps.create.step.three') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>
</form>


</div>
</div>
</div>
<script type="text/javascript">
var i = 0;
$("#add-btn").click(function(){
++i;
$("#dynamicAddRemove").append('<tr><input type="hidden" name="moreFields['+i+'][main_id]" placeholder="Full Name" value="{{$idp->main_id}}" class="form-control" /><input type="hidden" name="moreFields['+i+'][household_name]" value="{{$idp->household_name}}" placeholder="Full Name" class="form-control" /><td><input type="text" name="moreFields['+i+'][child_name]" placeholder="Full Name" class="form-control" /></td><td><input type="date" name="moreFields['+i+'][dob]"  class="form-control" /></td><td><input type="radio"  value="male" id="male" name="moreFields['+i+'][gender]"/>M<br> <input type="radio"  value="female" id="female" name="moreFields['+i+'][gender]"/>F</td><td><input type="radio" value="yes" id="yes" name=name="moreFields['+i+'][disability]">Y<br><input type="radio" value="no" id="no" name="moreFields['+i+'][disability]">N</td><td><input type="radio"  value="none" id="none" name="moreFields['+i+'][education]"/>NONE<br> <input type="radio"  value="fslc" id="fslc" name="moreFields['+i+'][education]"/>FSLC<br><input type="radio"  value="ssce" id="ssce" name="moreFields['+i+'][education]"/>SSCE<br> <input type="radio"  value="grad" id="grad" name="moreFields['+i+'][education]"/>GRAD</td><td><input type="text" name="moreFields['+i+'][occupation]"  class="form-control"></td>  <td><input type="text" name="moreFields['+i+'][preferred_skill]"  class="form-control" /></td>  <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
});
$(document).on('click', '.remove-tr', function(){  
$(this).parents('tr').remove();
});  
</script>
</body>
@endsection