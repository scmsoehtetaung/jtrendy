@extends('layouts.app')
<style>
 div a:hover {
        text-decoration:none;
        color: black;
        font-weight: bold;
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
                                     <a href="{{ url('deleteuser',$user->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                 </td> 
                            </tr>
                        @endforeach   
                        </table>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
