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
.fa-heart,.fa-download{
    color:gray;
}
.intro {
 
  color: red;
}
* {
  box-sizing: border-box;
}
.column {
  float: left;
  padding: 10px;
  height: 300px; 
}
.left {
  width: 22%;
}

.right {
  width: 75%;
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


                    <ul class="col-sm-12 list-unstyled">
                        <li class="subcat-li">
                            <video id="vdo" width="1220px" height="400px"  controls>
                              <source src="{{URL::asset('videos/'.$popular->video_path )}}" type="video/mp4">
                            </video>
                            <ul class="nav navbar-nav navbar-right">
                              <li>
                                <span class="spinner"   >
                                  <label style="font-size:15px;" class="likes-count" id="react">{{ $popular->song_react_count}}</label>
                                    <i onclick="reactCount()"class="fas fa-heart  fa-2x  " >
                                    </i>
                                    &nbsp;&nbsp; 
                                    <a href="{{URL::asset('videos/'.$popular->video_path )}}" ><i class="fas fa-download fa-2x " download></i></a>
                                </span>
                                <input type="hidden" id="myText" value="{{$popular->id}}">      
                              </li>
                            </ul>
                        </li>
                        <li class="subcat">
                          <p>Song Title: {{ $popular->title}}   
                            ( {{ $popular->artist}} )</p><br>
                            <p>Description: &nbsp;{{$popular->description}} </p><br>
                        </li>
                        <form  action="{{url('comment')}}"  method="post">
                        {{csrf_field()}}
                          <div class="row">
                            <div class="column left">
                              <h4>Comment : </h4>
                            </div>
                            <div class="column right">
                                <textarea rows="5" cols="120" name="commentwrite">
                                </textarea><br><br>
                                <input type="hidden" name="c" value="{{$popular->id}}">
                                <input type="submit"  class="btn btn-default nav navbar-nav navbar-right" value="Comment">
                            </div>
                          </div>
                        </form>
                        <div>
                            @foreach($commentdisplay as $commentList)
                           <img src="{{URL::asset('user/user2.png')}}">&nbsp;&nbsp;
                           <b>{{Auth::user()->name}}</b> &nbsp;&nbsp;{{$commentList->updated_at}}<br> 
                           &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                           {{$commentList->comment}}<br>
                            @endforeach
                        </div>
                    </ul>                        
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  jQuery(document).ready(function(){
  }); 
  function reactCount(){
    alert("icon click"); 
      $(".fa-heart").toggleClass("intro"); 
        if($(this).attr('data-click-state') == 1) {
            alert("unlike");
            $(this).attr('data-click-state', 0)
            var unlike=document.getElementById("react").textContent;
            unlike--;
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
          document.getElementById("react").innerHTML =  unlike ; 
      } else {
            alert("like");
            $(this).attr('data-click-state', 1)        
            var counting=  document.getElementById("react").textContent;
            counting++;
            document.getElementById("react").innerHTML =  counting ; 

            var x=document.getElementById("myText").value;
            $.ajax({
                url:'/like/'+x,
                type:'get',
                data:{
                  
                },
                success:function(data) {
                alert("success");
                },
                error: function(xhr, textStatus, thrownError){
                  alert('Somethin went wrong');
                  }
            });
        }
  }
</script>
@endsection

