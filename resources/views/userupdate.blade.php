@extends('layouts.app')

@section('content')

    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">User Update</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row col-md-12  mb-5">
                    <form action="{{route('updateur',$users->id)}}"  method="post" enctype="multipart/form-data">
                            @foreach($errors->all() as $error)
                            <p class="alert alert-danger">
                            {{$error}}
                            </p>
                            @endforeach
                            
                            @if (session()->has('alreadyExist'))
                            <div class="alert alert-danger">
                            {{ session('alreadyExist') }}
                            </div>
                            @endif
                            @csrf


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old( 'name', $users->name) }}" required >
  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="phone-number" class="form-control" name="phone_number" value="{{ old( 'phone_number', $users->phone_number) }}" required>
           
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old( 'email', $users->email) }}" required>
           
                            </div>
                        </div>
                        
                        <div class="form-group row" style="margin-left:34.25%; margin-top:30px">
                            <div class="button">
                                <input type="submit"  value="Update" class="btn btn-primary active"> 
                                <button type="button"  class="btn btn-default"  onclick="window.location='{{ route("back") }}'">Cancle</button> 
                            </div>    
                            </div>
                    
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
