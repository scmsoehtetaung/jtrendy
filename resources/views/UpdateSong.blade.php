@extends('layouts.app')
<style>
.button{
    margin-left:33%;
    margin-top:10px;
}
.btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}
</style>
@section('content')
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
                            
                            @if (session()->has('alreadyExist'))
                            <div class="alert alert-danger">
                            {{ session('alreadyExist') }}
                            </div>
                            @endif
                            {{csrf_field()}}
                             
                            <div class="form-group row">
                                <label for="songTitle"  class="col-md-3 col-form-label text-md-right">Song Title:</label>
                            <div class="col-md-6"> 
                                <input  class="form-control col-md-8" type="text" name="title"  value="{{ old( 'title', $song->title) }}"  required  >
                           </div>
                           </div>
                           <div class="form-group row">
                                <label for="artistName"  class="col-md-3 col-form-label text-md-right">Artist Name:</label>
                           <div class="col-md-6"> 
                                <input class="form-control col-md-8" type="text" name="artist" value=" {{ old( 'artist', $song->artist) }}" required>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-md-3 col-form-label text-md-right">Categories:</label>
                            <div class="col-md-6">
                                <select class="form-control "  name="category";>
                                <option>{{ old( 'category', $song->category) }}</option>
                                <option >Pop</option>
                                <option>Rock</option>
                                <option >Hip Hop</option>
                                <option >Classic</option>
                                <option >Covered</option>
                                <option >Ost</option>
                                </select>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="description"  class="col-md-3 col-form-label text-md-right">Description:</label>
                            <div class="col-md-6">
                                <textarea class="form-control " name="description"rows="3" cols="100" maxlength="100" minlength="5" required> {{ old( 'description', $song->description) }}</textarea>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="video"  class="col-md-3 col-form-label text-md-right">Song:</label>
                            <div class="col-md-6">
                                <span class="btn btn-primary btn-file">Browse
                                <input  type="file" value="" accept="video/*" ID="myVideo" name="myVideo" onchange="ValidateSize(this);readURL(this)">
                                </span>
                            </div>
                            </div>
                            <div class="form-group row">
                               
                            <div class="col-md-6" style="margin-left:25%;">
                                <video  name="video" id="videoid" src="{{URL::asset('videos/'.$song->video_path)}}"  width="320" height="240"  type="video/mp4" controls></video>
                            </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-md-6" style="margin-left:25%;">
                                <label id="size" name="video_size" value="{{'video_size', $song->video_size}}"></label>
                                </div>
                                <input type="hidden" id="video_size" name="video_size" value=" document.getElementById(size)">
                            </div>
                            </div>
                            <div class="form-group row">
                            <div class="button">
                                <input type="submit"  value="Update" class="btn btn-primary active"> 
                                <button type="button"  class="btn btn-default"  onclick="window.location='{{ route("cancle") }}'">Cancle</button> 
                            </div>    
                            </div>
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
            // document.getElementById("videoid").style.visibility = "";
            document.getElementById('myVideo').value = "";
         } else {
            document.getElementById("videoid").style.visibility = "visible";
            document.getElementById("size").innerText = 'video size:'+FileSize+'MB';
            document.getElementById("video_size").value = FileSize+'MB';
            }
        }
</script>                       
                     
                       
                   
                    
                        
                        
                   





