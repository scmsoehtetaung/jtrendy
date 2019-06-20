@extends('layouts.app')
<style>
 div a:hover {
        text-decoration:none;
        color: black;
        font-weight: bold;
    }

#myInput {
    width: 200px;
}
#searchclear {
    position: absolute;
    right: 5px;
    top: 0;
    bottom: 0;
    height: 14px;
    margin: auto;
    font-size: 14px;
    cursor: pointer;
    color: gray;
}
.mydiv{
    float:right;
    margin-bottom:10px;
}
</style>
@section('content')
<div>
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">User List</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row col-md-12  mb-5">
                    @if(session()->has('delete'))
                        <div class="alert alert-danger">
                        {{session()->get('delete')}}
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="alert alert-info">
                            {{ session('message') }}
                        </div>
                     @endif
                    @if(count($users)<1)
                        <div class="alert alert-danger">
                            <p>No User Has Found!</p>
                        </div>
                    @endif
                        <form action="/searchUser" method="POST" role="search">
                            {{ csrf_field() }}
                           <div class="mydiv">
                                <div class="btn-group" >
                                    <input class="form-control" type="search" name="searchUser" autocomplete="off" id="myInput"
                                    placeholder="Search...." value="<?php echo isset($_POST["searchUser"]) ? $_POST["searchUser"] : ''; ?>" >
                                    <span id="searchclear" class="glyphicon glyphicon-remove-circle" onclick="document.getElementById('myInput').value = ''"></span>
                                </div>
                                <div class="btn-group">
                                    <button type="submit" class="form-control" value="search"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <table class="table table-striped table-responsive">
                                <tr>
                                    <th>User Name</th>
                                    <th>User Type</th>
                                    <th>Phone No</th>
                                    <th>Email</th> 
                                    <th>Option</th>
                                </tr> 
                            @foreach ($users as $user)                                               
                                <tr>
                                    <td> <a href="{{ url('userlist/userdetail', $user->id) }}" >{{$user->name}}</a></td>
                                    @if($user->user_type=='1')
                                        <td>{{'Admin'}}</td>
                                    @else
                                        <td>{{'Member'}}</td>
                                    @endif
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->email}}</td>
                                    <td> <a href="{{ url('userupdate',$user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <a  onclick="return confirm('Are you sure?')" href="{{ url('deleteuser',$user->id) }}" class="btn btn-danger btn-sm">Delete</a>     
                                    </td> 
                                </tr>
                            @endforeach   
                            </table>
                            <div class="paginate text-center">
                                {{ $users->appends(request()->except('page'))->links() }}
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
