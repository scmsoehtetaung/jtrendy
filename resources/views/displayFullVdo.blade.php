@extends('layouts.app')
<style>
.subcat{
    margin-top:35px;
}
.subcat p{
    color:#192329;
    font-size:18px;
}
#vdo{
    border:1px solid black;
}
video{
  box-shadow:3px 3px #d9d9d9;
}
.fa-heart,.fa-download{
    color:gray;
}
.fa-heart:hover{
  cursor: pointer;
}
.intro{
  color:red;
}
* {
  box-sizing: border-box;
}
.subcat .title,.subcat .description{
  font-weight:bold;
  font-size:1.8rem;
  font-family: Helvetica;
  color:dimgray;
}
.column {
  float: left;
  padding: 10px;
  height: 300px; 
}
.left {
  width: 16%;
}
.right {
  width: 80%;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.fa-download{
  color:green;
}
img{
  width:40px;
  height:40px;
  border-radius:50%;
}
.vdos{
  width:250px;
  height:200px;
  border:1px solid black;
  margin-left:60px;
}
#commentbtn{
  width:90px;
  margin-top:10px;
  text-align:center;
  padding-left:5px;
  font-size:15px;
  margin-left:92.1%; 
}
.column h4{
  margin-left:20px;
}
.cmt{
  margin-top:-12px;
  margin-right:5px;
  font-size:16px;
}
form{
  margin-top:-10px;
}
textarea{
  box-shadow: 3px 3px #d9d9d9;
}
p{
  font-style:normal;
  font-size:20px;
}
.subcat .subdes{
  max-width:1250px;
  word-wrap:break-word;
}
h4{
  font-size:23px;
}
.subcat .subtitle{
  margin-left:6px;
  font-size:21px;
  color:#344051;
  text-decoration:none;
}
.subcat .subdes{
  margin-left:6px;
  font-size:21px;
  color:#344051;
  text-decoration:none;
}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  width:80px;
  border: none;
  outline: none;
  background-color: white;
  color: black;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

</style>
@section('content')
<div>
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Popular Song Details</span>
            </div>
            <div class="panel-body">
                <div class="container">
                  <div class ="row col-md-12  mb-5">

                    <ul class="col-sm-12 list-unstyled">
                          <li class="subcat-li">
                            <video id="vdo" width="1100px" height="400px"  controls>
                              <source src="{{URL::asset('videos/'.$popular->video_path )}}" type="video/mp4">
                            </video>
                            <ul class="nav navbar-nav navbar-right">
                              <li>
                                <span class="spinner"   >
                                  <label style="font-size:15px;" class="likes-count" id="react">{{ $popular->song_react_count}}</label>
                                    <i onclick="unlike()" {{(count($likedcolor)>0) ? "" : "hidden"}} class="fas fa-heart fa-2x intro like">
                                    </i>
                                    <i onclick="like()" {{(count($likedcolor)>0) ? "hidden" : ""}} class="fas fa-heart fa-2x unlike">
                                    </i>
                                    &nbsp;&nbsp; 
                                    <a href="{{URL::asset('videos/'.$popular->video_path )}}" download><i class="fas fa-download fa-2x "></i></a>
                                </span>
                                <input type="hidden" id="myText" value="{{$popular->id}}">      
                              </li>
                            </ul>
                          </li><br>
                        <li class="subcat">
                          <a href="#" class="title">Song Title:<a href="#" class="subtitle">{{ $popular->title}}
                            ( {{ $popular->artist}} )</a></a><br>
                          <a href="#" class="description">Description:</a>&nbsp;<a href="#" class="subdes">{{$popular->description}}&nbsp;</a><br>
                        </li>
                        <h4>Related Videos</h4><br><br>
                        @if(count($categories)>0)
                        @foreach($categories as $vdo)
                        <ul class="col-sm-4 list-unstyled">
                          <li class="subcat-li">
                            <video class="vdos"  class="video-preview"  controls>
                              <source src="{{URL::asset('videos/'.$vdo->video_path )}}" type="video/mp4">
                            </video> 
                          </li>
                        </ul>
                        @endforeach
                        @else
                        <button type="button" class="btn btn-danger" style="width:102%;height:40px;text-align:left;margin-top:-20px;">No Related Video</button>
                        @endif
                      </div>
                        <div class="paginate text-center">
                        {{$categories->links() }}
                        </div>
                        <br><br>
                        <form  action="{{url('comment')}}" method="post">
                        {{csrf_field()}}
                          <div class="row">
                            <div class="column left">
                              <h4>Comment</h4>
                            </div>
                            <div class="column right">
                              <textarea rows="8" cols="130" name="commentwrite" required>
                              </textarea><br><br>
                              <input type="hidden" name="c" value="{{$popular->id}}">
                              <input type="submit"  class="btn btn-info " value="Comment" id="commentbtn">
                            </div>
                          </div>
                        </form>
                        <div class="cmt">
                            @foreach($commentdisplay as $commentList)
                           <img src="{{URL::asset('user/user2.png')}}">&nbsp;&nbsp;
                           <b>{{Auth::user()->name}}</b> &nbsp;&nbsp;{{$commentList->updated_at}}<br> 
                           &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                           {{$commentList->comment}}<br>
                            @endforeach
                        </div>
                        <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="{{URL::asset('image/chevron-up.png')}}"></button>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  function unlike(){
    var unlike=document.getElementById("react").textContent;
    unlike--;
    $('.like').hide();
    $('.unlike').show();
    var y=document.getElementById("myText").value;
    $.ajax({
      url:'/unlike/'+y,
    type:'get',
    data:{   
    },
      success:function(data) {
      console.log("Success!");
      },
      error: function(xhr, textStatus, thrownError){
        alert('Somethin went wrong');
        }
  });
  document.getElementById("react").innerHTML =unlike; 
    }
  function like() { 
    var counting=  document.getElementById("react").textContent;
    counting++;
    $('.unlike').hide();
    $('.like').show();
    document.getElementById("react").innerHTML =counting; 
    var x=document.getElementById("myText").value;
    $.ajax({
      url:'/like/'+x,
      type:'get',
      data:{
      },
      success:function(data) {
        console.log("Success!");
      },
      error: function(xhr, textStatus, thrownError){
        alert('Somethin went wrong');
        }
    });
    document.getElementById("react").innerHTML = counting; 
        }
        window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
      } else {
        document.getElementById("myBtn").style.display = "none";
      }
    }
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
</script>
@endsection

