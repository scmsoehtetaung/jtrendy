@extends('layouts.app')
<style>
.uploadButton{
    margin-right:10px;
}
</style>

@section('content')
<div class="row">
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Song Upload</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row col-md-12  mb-5">
                       <form  action="{{url('upload')}}"  method="post" enctype="multipart/form-data">
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger">
                                    {{$error}}
                                </p>
                            @endforeach
                            @if(session()->has('videoRequired'))
                                <div class="alert alert-danger">
                                    {{ session()->get('videoRequired') }}
                                </div>
                            @endif
                            @if(session()->has('complete'))
                                <div class="alert alert-success">
                                    {{ session()->get('complete') }}
                                </div>
                            @endif
                            {{csrf_field()}}
                           
                                <div class=" row ">
                                    <div class="form-group col-sm-6 col-md-offset-0 ">
                                        <label for="song">Song Title:</label>    
                                        <input class="form-control col-md-8" type="text" name="title" placeholder="Enter Song Title" id="title" value="{{ old('title')}}" required> 
                                    </div>
                                </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-offset-0 ">
                                    <label for="name">Artist Name:</label>
                                    <input class="form-control" type="text" name="artist" id="name" placeholder="Enter Artist Name" value="{{ old('artist')}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-offset-0">
                                    <label for="category">Categories:</label>
                                    <select class="form-control "  name="category";>
                                        <option value="pop" {{ old('category') == "pop" ? 'selected' : '' }}>Pop</option>
                                        <option value="rock" {{ old('category') == "rock" ? 'selected' : '' }}>Rock</option>
                                        <option value="hiphot" {{ old('category') == "hiphot" ? 'selected' : '' }}>Hip Hop</option>
                                        <option value="classic" {{ old('category') == "ckassic" ? 'selected' : '' }}>Classic</option>
                                        <option value="ost" {{ old('category') == "ost" ? 'selected' : '' }}>Ost</option>
                                        <option value="covered" {{ old('category') == "covered" ? 'selected' : '' }}>Covered</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-offset-0 ">
                                    <label for="comment">Description:</label>
                                    <textarea class="form-control " rows="5" id="comment" name="description" placeholder="Enter Song Description" maxlength=100 minlength=5 required >{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-offset-0">
                                    <label for="video">Video:</label>
                                    <input type="file" accept="video/*" ID="video" name="myVideo" style="display:none"><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-offset-0">
                                    <input type="button" name="" value="Browse" id="browse_file" class="btn btn-primary">
                                </div>  
                            </div >
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-offset-0 ">
                                    <video hidden height="150px" controls="controls" autoplay class="video-preview"></video>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-offset-0 ">
                                    <label for="size" id="size"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-offset-0">
                                    <input type="submit" value="Upload" class="btn btn-primary active"> 
                                    <button type="button" class="btn btn-default" onclick="window.location='{{ route("cancle.index") }}'">Cancle</button> 
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
   

    $('#browse_file').on('click',function(e){
        $('#video').click();
    });

    $ ("#video").change(function () {
        var val=this.files[0].size;
        var sizeInMB = (val / (1024*1024)).toFixed(2);
            if(sizeInMB>80){
                 alert("The video is too large,Choose others");
            }else{
                $("#size").text("video size : " +sizeInMB+"MB" );
                var fileInput = document.getElementById('video');
                var fileUrl = window.URL.createObjectURL(fileInput.files[0]);
                $(".video-preview").attr("src", fileUrl);
                $("video").show();
            }  
    });
</script>
@endsection
