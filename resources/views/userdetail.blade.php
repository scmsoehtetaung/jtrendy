@extends('layouts.app')
<style>

.button{
    width: 100px;
    background-color: #A0C6DA;
    border: none;
    color: #0B0B61;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-left: 190px;
    cursor: pointer;
    margin-top:20px;
}

.button1:hover{
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

</style>

@section('content')
<div class="row">
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
                    <a href="javascript:history.back()" button class="btn button button1"><b>OK</b></a>                                       
                </div>             
            </div>
        </div>
    </div>
</div>
@endsection