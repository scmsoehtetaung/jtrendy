@extends('layouts.app')

@section('content')

    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">User Detail</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row col-md-12  mb-5">
                        <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('User Name') }}</label>

                                <div class="col-md-4">
                                {{$users->name}}
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('PhoneNo') }}</label>

                                <div class="col-md-4">
                                {{$users->phone_number}}
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-4">
                                {{$users->email}}
                                </div>
                        </div>                  
                    </div>
                    <a href="javascript:history.back()" class="btn btn-primary active" style="width:80px; margin-left:17%"><b>OK</b></a>                                       
                </div>             
            </div>
        </div>
    </div>

@endsection