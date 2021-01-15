@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('idps.create.step.one.post') }}" method="POST">
                @csrf
  
                <div class="card">
                    <div class="card-header"><strong>Step 1: Basic Info</strong></div>
  
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
                             <div class="form-group">
                                <input type="hidden" value="{{ uniqid() }}" class="form-control" id="main_id"  name="main_id">
                            </div>

                             <div class="form-group">
                                <label for="fullname">Head of Household:</label>
                                <input type="text" value="{{ $idp->household_name ?? '' }}" class="form-control" id="household_name"  name="household_name">
                            </div>

                             <div class="form-group">
                                <label for="fullname">Location:</label>
                                <TEXTAREA value="{{ $idp->household_name ?? '' }}" class="form-control" id="location"  name="location"> </TEXTAREA>
                            </div>

                            <div class="form-group">
                                <label for="description">Date of Birth:</label>
                                <input type="date"  value="{{{ $idp->dob ?? '' }}}" class="form-control" id="dob" name="dob"/>
                            </div>
                            <div class="form-group" style="display:flex; flex-direction: row; justify-content: space-between; align-items: center">
                                <label for="description">Gender:</label>
                                <input type='radio'  value="male" id="male" name="gender"/>
                                <label for="male">Male</label>
                                <input type='radio'  value="female"  id="female" name="gender"/>
                                <label for="male">Female</label>
                            </div>
                            
                            <div class="form-group">
                                <div class="form-group">
                <label class="control-label">State of Origin</label>
                <select
                  onchange="toggleLGA(this);"
                  name="state"
                  id="state"
                  class="form-control"
                >
                  <option value="" selected="selected">- Select -</option>
                  <option value="Abia">Abia</option>
                  <option value="Adamawa">Adamawa</option>
                  <option value="AkwaIbom">AkwaIbom</option>
                  <option value="Anambra">Anambra</option>
                  <option value="Bauchi">Bauchi</option>
                  <option value="Bayelsa">Bayelsa</option>
                  <option value="Benue">Benue</option>
                  <option value="Borno">Borno</option>
                  <option value="Cross River">Cross River</option>
                  <option value="Delta">Delta</option>
                  <option value="Ebonyi">Ebonyi</option>
                  <option value="Edo">Edo</option>
                  <option value="Ekiti">Ekiti</option>
                  <option value="Enugu">Enugu</option>
                  <option value="FCT">FCT</option>
                  <option value="Gombe">Gombe</option>
                  <option value="Imo">Imo</option>
                  <option value="Jigawa">Jigawa</option>
                  <option value="Kaduna">Kaduna</option>
                  <option value="Kano">Kano</option>
                  <option value="Katsina">Katsina</option>
                  <option value="Kebbi">Kebbi</option>
                  <option value="Kogi">Kogi</option>
                  <option value="Kwara">Kwara</option>
                  <option value="Lagos">Lagos</option>
                  <option value="Nasarawa">Nasarawa</option>
                  <option value="Niger">Niger</option>
                  <option value="Ogun">Ogun</option>
                  <option value="Ondo">Ondo</option>
                  <option value="Osun">Osun</option>
                  <option value="Oyo">Oyo</option>
                  <option value="Plateau">Plateau</option>
                  <option value="Rivers">Rivers</option>
                  <option value="Sokoto">Sokoto</option>
                  <option value="Taraba">Taraba</option>
                  <option value="Yobe">Yobe</option>
                  <option value="Zamfara">Zamafara</option>
                </select>
              </div>

              <div class="form-group">
                <label class="control-label">LGA of Origin</label>
                <select
                  name="lga"
                  id="lga"
                  class="form-control select-lga"
                  required
                >
                </select>
              </div>
                </div>

             <div class="form-group">
                <label for="description">Village:</label>
                <input type="text"  value="{{{ $idp->village ?? '' }}}" class="form-control" id="village" name="village"/>
             </div>
                </div>

            


                          
            </div>
  
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
 
   <script type="text/javascript" src="{{ URL::asset('js/lga.js') }}"></script>
@endsection