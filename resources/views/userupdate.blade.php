@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Register</span>
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
                            @if (session()->has('message'))
                            <div class="alert alert-info">
                            {{ session('message') }}
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
                        
                        <div class="form-group row mb-0" style="margin-left:33%; margin-top:30px">
                            <div class="col-md-2 offset-md-4">
                                <button type="submit" class="btn btn-primary" >
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
