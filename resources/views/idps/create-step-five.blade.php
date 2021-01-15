@extends('layouts.default')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form  action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Step 5: Photo Upload</div>
  
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

                                <input type='hidden'  value="{{ $idp->main_id ?? '' }}" id=main_id name="main_id"/>
                                <input type='hidden'  value="{{ $idp->household_name ?? '' }}" id=household_name name="household_name"/>
                                <input type='file'  value="photo" id="photo" name="photo"/>
                               
                            </div>


  
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('idps.create.step.four') }}" class="btn btn-danger pull-right">Previous</a>
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