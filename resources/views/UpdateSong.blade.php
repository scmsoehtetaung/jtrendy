@extends('layouts.app')
<style>
input{
 width:30%;
}
select{
    width:30%;
}
input[type=submit]{
    width:10%;
}
</style>

@section('content')
<div class="row">
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Update Song</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row col-md-12  mb-5">
                        <form action="{{route('update',$song->id)}}"  method="post" enctype="multipart/form-data">
                            @foreach($errors->all() as $error)
                            <p class="alert alert-danger">
                            {{$error}}
                            </p>
                            @endforeach
                            @if (session()->has('message'))
                            <div class="alert alert-info">
                            {{ session('message') }}
                            </div>
                            @endif
                            {{csrf_field()}}
                            Song Title:<br><input type="text" name="title"  value="{{ old( 'title', $song->title) }}"  required  ><br><br>
                            Artist Name:<br><input type="text" name="artist" value=" {{ old( 'artist', $song->artist) }}" required><br><br>
                            Categories:<br><select name="category">   
                                <option>{{ old( 'category', $song->category) }}</option>
                                <option >Pop</option>
                                <option>Rock</option>
                                <option >Hip Hop</option>
                                <option >Classic</option>
                                <option >Covered</option></select><br><br>
                            Description:<br><textarea name="description"rows="3" cols="100" maxlength="100" minlength="5" required> {{ old( 'description', $song->description) }}</textarea><br><br>
                            Video:<br>
                                <input type="file" value="" accept="video/*" ID="myVideo" name="myVideo"  onchange="ValidateSize(this);readURL(this)" >
                                <div><video  name="video" id="videoid" src="{{URL::asset('videos/'.$song->video_path)}}"  width="320" height="240"  type="video/mp4" controls></video></div>
                                <label id="size" name="video_size" value="{{'video_size', $song->video_size}}"></label>
                                <input type="hidden" id="video_size" name="video_size" value=" document.getElementById(size)">
                                <div class="button01">
                                <input type="submit"  name="id" value="Update" > 
                                <button>Cancle</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
          var video = new FileReader();
          video.onload = function (e) {
            $('#videoid').attr('src', e.target.result);
            }
            video.readAsDataURL(input.files[0]);
            }
        }
    function ValidateSize(file) {
        var FileSize = (file.files[0].size / 1024 / 1024).toFixed(2) ; // in MB
        if (FileSize > 80) {
            alert('File size exceeds 80 MB');
            document.getElementById("videoid").style.visibility = "hidden";
            document.getElementById('myVideo').value = "";
         } else {
            document.getElementById("videoid").style.visibility = "visible";
            document.getElementById("size").innerText = FileSize+'MB';
            document.getElementById("video_size").value = FileSize+'MB';
            }
        }
</script>                       
                     
                       
                   
                    
                        
                        
                   





