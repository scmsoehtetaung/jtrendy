@extends('layouts.app')

@section('content')
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Song Detail</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row col-md-12  mb-5">
                        @if($song->song_react_count ==$max && $song->song_react_count!='0')  
                            <div class="alert alert-info" style="font-size:15px">   
                                <strong>That's being most favourite song!!!</strong>
                            </div>
                        @endif 
                       
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Song Title') }}</label>
                                <div class="col-md-4">
                                {{$song->title}}
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Artist') }}</label>
                                <div class="col-md-4">
                                {{$song->artist}}
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Category') }}</label>
                                <div class="col-md-4">
                                {{$song->category}}
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-4">
                                {{$song->description}}
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Favourite Count') }}</label>
                                <div class="col-md-4">
                                {{$song->song_react_count}}
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Upload Date') }}</label>
                                <div class="col-md-4">
                                {{$song->created_at}}
                                </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Upload Song') }}</label>
                                <div class="col-md-4">
                                    <video width="400" controls>
                                    <source src="{{URL::asset('videos/'.$song->video_path )}}" type="video/mp4">
                                    </video>
                                </div>  
                        </div>
                    </div>
                </div>   
                 <a href="javascript:history.back()" class="btn btn-primary active" style="width:80px; margin-left:23.5%"><b>OK</b></a>                                             
            </div>
        </div>
    </div>

@endsection