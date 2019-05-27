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

                       
                       <form>
                       Song Title:<br><input type="text" name="title" value=" {{ $song->title }} " ><br><br>
                       Artist Name:<br><input type="text" name="artist" value=" {{ $song->artist }} "><br><br>
                       Categories:<br><select name="category">   
                                <option value="Pop">{{ $song->category }}</option>
                                <option value="rock">Rock</option>
                                <option value="hiphot">Hip Hop</option>
                                <option value="classic">Classic</option>
                                <option value="covered">Covered</option></select><br><br>
                       Description:<br><textarea name="description"rows="3" cols="100"> {{ $song->description }}</textarea><br><br>    
                            
                       <div class="button01">
                       <input type="submit" value="Upload"> 
                       <button type="button">Cancle</button></div>
                       
                       </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
