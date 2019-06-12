@extends('layouts.app')
<style>
    label {
  cursor: default;
  margin-left: 6.22%;
}

input[type=button]{
    width:6%;
    height: 4%;
    margin-left: 10.22%;
    background: #DEEBF7;
    border:1px solid black;
}
</style>
@section('content')
<div class="row">
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
            <span class="panel-title">J-trendy Dashboard</span>
            </div>
            <div class="panel-body">
            <div class="container">
            <div class ="row col-md-12  mb-5"> 
            Name:
            <label for="name"></label>{{ $users->name}}
            <br><br>
            E-mail:
            <label for="email"></label>{{ $users->email}}
            <br><br><br>
            @if($users->user_type=='1')
            <a href="{{ route('songList') }}"><input type="button" Value="OK"></a>
            @else
            <a href="{{ route('uploadedsong') }}"><input type="button" Value="OK"></a>
            @endif
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection