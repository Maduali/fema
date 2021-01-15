@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                {{ csrf_field() }}
                <div class="card">
                    
   
                    <div class="card-body">
                            
                             <form action="{{ route('admin.edit.post') }}" method="post" >      
                                <table class="table">

                                <tr>
                                <td> <img src="{{asset('images/' . $idphotos)}}" alt="profile" width="100vw"></td> 
                                </tr>
                                <tr>
                                <td><strong>Head of Household:</strong> @foreach ($idp as $object) {{ ucfirst($object->household_name) }}@endforeach</td>  
                                <td><strong>Location:</strong> @foreach ($idp as $object) {{ ucfirst($object->location) }}@endforeach</td> 
                                </tr>
                                 <tr>
                                <td><strong>DOB:</strong> @foreach ($idp as $object) {{ $object->dob }}@endforeach</td>  
                                <td><strong>Gender:</strong> @foreach ($idp as $object) {{ ucfirst($object->gender) }}@endforeach</td> 
                                </tr>
                                                                 <tr>
                                <td><strong>Phone Number:</strong> @foreach ($idp as $object) {{ $object->telly }}@endforeach</td>  
                                <td><strong>Email:</strong> @foreach ($idp as $object) {{ ucfirst($object->email)}}@endforeach</td> 
                                </tr>
                                 <tr>
                                <td><strong>State:</strong> @foreach ($idp as $object) {{ $object->state }}@endforeach</td>  
                                <td><strong>Lga:</strong> @foreach ($idp as $object) {{ $object->lga}}@endforeach</td>
                                <td><strong>Village:</strong> @foreach ($idp as $object) {{ ucfirst($object->lga)}}@endforeach</td> 
                                </tr>
                                 <tr>
                                <td><strong>Occupation:</strong> @foreach ($idp as $object) {{ ucfirst($object->occupation) }}@endforeach</td>  
                                <td><strong>Education:</strong> @foreach ($idp as $object) {{ ucfirst($object->education) }}@endforeach</td>
                                <td><strong>Skill Preferred:</strong> @foreach ($idp as $object) {{ ucfirst($object->preferred_skill) }}@endforeach</td> 
                                </tr>

                                                                 <tr>
                                <td><strong>Cause:</strong> @foreach ($idp as $object) {{ ucfirst($object->cause)}}@endforeach</td>  
                                <td><strong>Status:</strong> @foreach ($idp as $object) {{ ucfirst($object->status) }}@endforeach</td> 
                                </tr>
                               <tr> <button type="submit" class="btn btn-primary">Submit</button> </tr>
                               <tr>

                            </table>
                            </form>

                            <form>
                             <table class="table">
                                <th> Spouse(s)</th>
                                <th>DoB</th>
                                <th>Phone Number</th>
                                <th>Education</th>
                                <th>Occupation</th>
                                <th>Skill Preffered</th>
                                @foreach ($idpspouse as $object)

                                <tr>
                                <td> {{ ucfirst($object->spouse_name) }}</td>  
                                <td>{{ ucfirst($object->dob) }}</td>
                                <td>{{ ucfirst($object->telly) }}</td> 
                                <td>{{ ucfirst($object->education) }}</td>
                                <td>{{ ucfirst($object->occupation) }}</td>
                                <td>{{ ucfirst($object->preferred_skill) }}</td>
                                <td><button type="submit" class="btn btn-primary">Submit</button></td>
                               @endforeach
                               <tr>

                            </table>
                        </form>


                         <form>
                             <table class="table">
                                <th> Kids(s)</th>
                                <th> Sex</th>
                                <th> DoB</th>
                                <th> Disability</th>
                                <th> Education</th>
                                <th> Occupation</th>
                                <th> Skill Preferred</th>
                                @foreach ($idpkids as $object)

                                <tr>
                                <td> {{ ucfirst($object->child_name) }}</td>
                                 <td> {{ ucfirst($object->gender) }}</td>
                                <td>{{ $object->dob }}</td>
                                 <td> {{ ucfirst($object->disability) }}</td> 
                                <td>{{ ucfirst($object->education) }}</td>
                                <td>{{ ucfirst($object->occupation) }}</td>
                                <td>{{ ucfirst($object->preferred_skill) }}</td>
                                <td><button type="submit" class="btn btn-primary">Submit</button></td>
                               @endforeach
                               <tr>

                            </table>
                        </form>
                    </div>
                    
                </div>
            
        </div>
    </div>
</div>
@endsection