@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('idps.create.step.six.post') }}" method="post" >
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">Step 6: Review Details</div>
   
                    <div class="card-body">
  
                            <table class="table">

                                <tr>
                                <td> <img src="{{asset('images/' . $idphotos)}}" alt="profile" width="100vw"></td> 
                                </tr>

                                <tr>
                                    <td>Head Of Household: <strong>{{$idp->household_name}}</strong></td>
                                    <td>Location: <strong>{{$idp->location}}</strong> </td>
                                </tr>

                            
                                <tr>
                                    <td>Gender: <strong>{{$idp->gender}}</strong> </td>
                                    <td>Age: <strong>{{$years}}</strong></td>
                                </tr>

                                 <tr>
                                    <td>Phone Number: <strong>{{$idp->telly}}</strong></td>
                                    <td>E-mail: <strong>{{$idp->email}}</strong></td>
                                </tr>

                                 <tr>
                                    <td>Spouse(s): <strong>{{$idpspouse}}</strong> </td>
                                    <td> Kid(s): <strong>{{$idpkids}}</strong></td>
                                </tr>

                                <tr>
                                    <td>State of Origin: <strong>{{$idp->state}}</strong></td>
                                    <td>LGA: <strong>{{$idp->lga}}</strong></td>
                                </tr>

                                 <tr>
                                    <td>Village: <strong>{{$idp->village}}</strong></td>
                                    <td>Education: <strong>{{$idp->education}}</strong></td>
                                </tr>
                        
                                 <tr>
                                    <td>Occupation: <strong>{{$idp->occupation}}</strong></td>
                                    <td>Cause of Displacement: <strong>{{$idp->cause}}</strong></td>
                                </tr>

                                 <tr>
                                    <td>Skill Preferred:<strong>{{$idp->status}}</strong></td>
                                    <td>Current Status:<strong>{{$idp->preferred_skill}}</strong></td>
                                </tr>
                            </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('idps.create.step.five') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection