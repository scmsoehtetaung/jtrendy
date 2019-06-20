@extends('layouts.app')
<style>
 div a:hover {
        text-decoration:none;
        color: black;
        font-weight: bold;
    }
.btnStyle00 {
  padding: 10px;
  height:35px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}
.btnStyle01 {
    float: left;
    width: 20%;
    height:35px;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none; 
    cursor: pointer;
    }
    .btnStyle01:hover {
    background: #0b7dda;
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
                            <div style="float:right">
                                <input class="btnStyle00" type="text" name="searchUser"  placeholder="Search...">   
                                <button type="submit" class="btnStyle01" value="search"><i class="fa fa-search"></i></button> 
                            </div><br><br>
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
                                    <td> <a href="{{ url('userupdate',$user->id) }}" style="width:65px" class="btn btn-primary btnStyle11">Edit</a>
                                    <a href="{{  url('delete',$user->id) }}" class="btn btn-danger btnStyle11" onclick="return confirm('Are you sure to delete?')">Delete</a>     
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
