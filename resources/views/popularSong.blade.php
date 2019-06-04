@extends('layouts.app')

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


                    <table style="width:100%">
                    <div>
                    <div class="col-sm-4">
                    <video width="320" height="240" controls>
                        <source src="{{URL::asset('videos/The perfect 2.mp4' )}}" type="video/mp4">
     
                    </video>
                    </div>
                     
                    <!-- <div class="col-sm-4">
                    <video width="320" height="240" controls>
                        <source src="{{URL::asset('public/videos/theperfect.mp4' )}}" type="video/mp4">
    
                    </video>
                    </div>
                     
                    <div class="col-sm-4">
                    <video width="320" height="240" controls>
                        <source src="{{URL::asset('public/videos/theperfect.mp4' )}}" type="video/mp4">
    
                    </video>
                    </div>
                    </div> 

                    <div>
                    <div class="col-sm-4">
                    <video width="320" height="240" controls>
                        <source src="{{URL::asset('public/videos/theperfect.mp4' )}}" type="video/mp4">
    
                    </video>
                    </div>
                     
                    <div class="col-sm-4">
                    <video width="320" height="240" controls>
                        <source src="{{URL::asset('public/videos/theperfect.mp4' )}}" type="video/mp4">
    
                    </video>
                    </div>
                     
                    <div class="col-sm-4">
                    <video width="320" height="240" controls>
                        <source src="{{URL::asset('public/videos/theperfect.mp4' )}}" type="video/mp4">
    
                    </video>
                    </div>
                    </div> -->
                    </table>

                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

