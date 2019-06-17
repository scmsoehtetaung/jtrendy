@extends('layouts.app')

@section('content')
<div>
    <div class="col-md-13 col-md-offset-0">
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
                                <label for="total">Total Song :&nbsp;{{$counttotal}}</label>
                            </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2 col-md-offset-0">
                                    <label for="total">Song Category: </label>
                                </div>
                                <div class="form-group col-sm-4 col-md-offset-0">
                                    <select class="form-control" id="choose" name="category";>
                                        <option value="pop">Pop</option>
                                        <option value="rock">Rock</option>
                                        <option value="classic">Classic</option>
                                        <option value="hiphot">Hip Hop</option>
                                        <option value="covered">Cover Songs</option>
                                        <option value="country">Country Music</option>
                                        <option value="jazz">Jazz</option>
                                    </select>
                                </div>
                                <div  class="form-group col-sm-4 col-md-offset-0">
                                    <input type="submit" value="Show" class="btn btn-primary active"> 
                                </div>
                            </div>
                            <div class="row">
                                <div  class="form-group col-sm-4 col-md-offset-0">
                                
                                    <div>
                                        <label>Total {{$type}} Song: {{ $count }}</label>
                                    </div>
                            
                                    <div class="container">
                                        <div class="row">
                                      
                                        @foreach($shows as $show)
                                            <div class="form-group col-md-4 col-md-offset-0">
                                                <video width="320" height="240" controls autoplay>
                                                    <source src="{{url('/videos/')}}/{{$show->video_path}}" type="video/mp4">
                                                </video>
                                                <div>Title:{{$show->title}}</div>
                                                <div>Artist Name:{{$show->artist}}</div>
                                                <div>React:{{$show->song_react_count}}</div>
                                            </div>
                                             
                                        @endforeach   
                                        </div>
                                        <div class="paginate text-center form-group ">
                                            {{$shows->links()}}
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
    $("#choose option[value={{$type}}]").attr('selected', 'selected');
</script>
@endsection
