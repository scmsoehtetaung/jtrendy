@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Song Category List</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row col-md-12  mb-5">
                        <form  action="{{url('show')}}"  method="post" enctype="multipart/form-data">
                         {{csrf_field()}}
                            <div class="row">
                            <div  class="form-group col-sm-4 col-md-offset-0">
                                <label for="total">Total Song :&nbsp;{{$counts}}</label>
                            </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-offset-0">
                                    <label for="total">Song Category: </label>
                                    <select class="form-control" id="choose" name="category";>
                                        <option value="pop">Pop</option>
                                        <option value="rock">Rock</option>
                                        <option value="hiphot">Hip Hop</option>
                                        <option value="classic">Classic</option>
                                        <option value="ost">Ost</option>
                                        <option value="covered">Covered</option>
                                    </select>
                                </div><br>
                                <div  class="form-group col-sm-4 col-md-offset-0">
                                    <input type="submit" value="Show" class="btn btn-primary active"> 
                                </div>
                            </div>
                            <div class="row">
                                <div  class="form-group col-sm-4 col-md-offset-0">
                                 @if(session()->has('count'))
                                    <div>
                                        <label>Total {{session()->get('type')}} Song: {{ session()->get('count') }}</label>
                                    </div>
                                @endif
                                    <div class="container">
                                        <div class="row">
                                        @if(session()->has('shows'))
                                        @foreach(session()->get('shows') as $show)
                                            <div class="form-group col-md-4 col-md-offset-0">
                                                <video width="320" height="240" controls autoplay>
                                                    <source src="{{url('/videos/')}}/{{$show->video_path}}" type="video/mp4">
                                                </video>
                                                <div>Title:{{$show->title}}</div>
                                                <div>Artist Name:{{$show->artist}}</div>
                                                <div>React:{{$show->song_react_count}}</div>
                                            </div>
                                        @endforeach
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#choose option[value={{session()->get('type')}}]").attr('selected', 'selected');
</script>
@endsection
