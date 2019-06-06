@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Song List</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row col-md-12  mb-5">

                    <h3><b>Song List</b></h3>
                      
                        @foreach ($song as $song)                                               
                       
                        <a href="{{ url('songlist/detail', $song->id) }}" >{{$song->title}}</a>  <br>              
                        
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

