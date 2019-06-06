@extends('layouts.app')
<style>

    label {
    width: 200px;
    text-align: left;
    font-size: 15px;
    }​

    .container1{
        width: 980px;     
    }

    .container1 .left{
        margin-top:5px;
        float: left;
    }

    .container1 .right{
        margin-top:15px;
        float:left;
    }

    .button {
        width: 100px;
        background-color: #58ACFA;
        border: none;
        color: #0B0B61;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .button1{
        borde-radius: 8px;
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
                        @if($song->song_react_count ==$max)  
                            <div style="background-color:#F0C4DF;color:#A4678B;padding:10px;width:30%;textalign:center;font-size:18px">   
                                <strong>That's being most favourite song!!!</strong>
                            </div><br>
                        @endif   
                    
                        <div class="block">
                            <label>Song Title</label>
                            {{$song->title}}
                        </div>

                        <div class="block">
                            <label>Artist</label>
                            {{$song->artist}}
                        </div>

                        <div class="block">
                            <label> Category</label>
                            {{$song->category}}
                        </div>

                        <div class="block">
                            <label>Artist</label>
                            {{$song->description}}
                        </div>

                        <div class="block">
                            <label>Favourite Count</label>
                            {{$song->song_react_count}}
                        </div>

                        <div class="block">
                            <label>Upload Date</label>
                            {{$song->created_at}}
                        </div>
                        
                        <div class="container1">
                            <div class="left">
                                <label>Upload Song</label>
                            </div>
                            
                            <div class="right">
                               <video width="400" controls>
                                    <source src="{{URL::asset('videos/'.$song->video_path )}}" type="video/mp4">
                                </video>
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