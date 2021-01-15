@extends('layouts.default')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('idps.create.step.two.post') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header"><strong>Step 2: More Info</strong></div>
  
                    <div class="card-body">
  
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
                            
                            <div class="form-group" style="display:flex; flex-direction: row; justify-content: space-between; align-items: center">
                                <label for="description">Education: </label>
                                <input type='radio'  value="none" id="none" name="education"/>
                                <label for="fslc">NONE</label>
                                <input type='radio'  value="fslc"  id="fslc" name="education"/>
                                <label for="ssce">FSLC</label>
                                <input type='radio'  value="ssce"  id="ssce" name="education"/>
                                <label for="graduate">SSCE</label>
                                 <input type='radio'  value="GRAD"  id="GRAD" name="education"/>
                                 <label for="GRAD">GRAD</label>
                                
                            </div>

                           <div class="form-group">
                                <label for="fullname">Occupation:</label>
                                <input type="text" value="{{ $idp->occupation ?? '' }}" class="form-control" id="occupation"  name="occupation">
                            </div>

                            <div class="form-group">
                                <label for="fullname">Skill Preferred:</label>
                                <input type="text" value="{{ $idp->preferred_skill ?? '' }}" class="form-control" id="preferred_skill"  name="preferred_skill">
                            </div>

                            <div class="form-group">
                                <label for="fullname">Cause Of Displacement:</label>
                                <input type="text" value="{{ $idp->cause ?? '' }}" class="form-control" id="cause"  name="cause">
                            </div>




                            <div class="form-group" style="display:flex; flex-direction: row; justify-content: space-between; align-items: center">
                                <label for="description">Disability:</label>
                                <input type='radio'  value="none" id="none" name="disability"/>
                                <label for="description">None:</label>
                                <input type='radio'  value="visual" id="visual" name="disability"/>
                                <label for="visual">Visual</label>
                                <input type='radio'  value="hearing"  id="hearing" name="disability"/>
                                <label for="hearing">Hearing</label>
                                <input type='radio'  value="motor"  id="motor" name="disability"/>
                                <label for="motor">Motor</label>
                                 <input type='radio'  value="cognitive"  id="cognitive" name="disability"/>
                                 <label for="cognitive">Cognitive</label>
                            </div>

                               <div class="form-group">
                                <label for="fullname">Phone Number:</label>
                                <input type="text" value="{{ $idp->telly ?? '' }}" class="form-control" id="telly"  name="telly">
                            </div>

                            <div class="form-group">
                                <label for="fullname">Email:</label>
                                <input type="email" value="{{ $idp->email ?? '' }}" class="form-control" id="email"  name="email">
                            </div>

                            <div class="form-group" style="display:flex; flex-direction: row; justify-content: space-between; align-items: center">
                                <label for="description">Current Status: </label>
                                <input type='radio'  value="available" id="available" name="status"/>
                                <label for="available">In the Host Community</label>
                                <input type='radio'  value="unavailable"  id="unavailable" name="status"/>
                                <label for="on_leave">Not In The Host Community</label>

                            </div>
                                
                                 
                            </div>

  
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('idps.create.step.one') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection