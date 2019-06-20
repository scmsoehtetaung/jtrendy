@extends('layouts.app')
<style>
    label {
  cursor: default;
  margin-left: 6.22%;
}

</style>
@section('content')
<div class="row">
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
            <span class="panel-title">Profile</span>
            </div>
            <div class="panel-body">
            
            <div class ="row col-md-12  mb-5"> 
            <div class="container">
            <div class="form-group row">
                <label class="col-md-1 col-form-label text-md-right">Name:</label>
                <div class="col-md-1">{{ $users->name}}
            </div></div>
            
            <div class="form-group row">
                <label class="col-md-1 col-form-label text-md-right">E-mail:</label>
                <div class="col-md-1">{{ $users->email}}
            </div></div>
            <div class="form-group row">
                <label class="col-md-1 col-form-label text-md-right">Phone:</label>
                <div class="col-md-1">{{ $users->phone_number}}
            </div></div>
            <div class="form-group row">
                <label class="col-md-1 col-form-label text-md-right">Photo:</label>
                <div class="col-md-1"><img  src="{{URL::asset('image/'.$users->user_photo)}}"  width="150" height="150">
             </div>
             </div>
             <div class="form-group row">
                <div class="col-md-6 col-form-label text-md-right" style="margin-left:14.5%;">
            @if($users->user_type=='1')
            <a href="{{ route('songList') }}"><input type="button" Value="OK" class="btn btn-primary active"></a>
            @else
            <a href="{{ route('uploadedsong') }}"><input type="button" Value="OK" class="btn btn-primary active"></a>

            @endif
            <a href="{{ route('userupdate',$users->id) }}"><input type="button" Value="Update" class="btn btn-primary active">
            </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection