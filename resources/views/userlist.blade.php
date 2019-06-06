@extends('layouts.app')

@section('content')
<div class="row">
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
                    <table class="table table-striped table-responsive">
                            <tr>
                                <th>User Name</th>
                                <th>Email</th> 
                                <th></th>
                            </tr> 
                        @foreach ($users as $user)                                               
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td> <button onclick="location.href='{{ url('deleteuser',$user->id) }}'" class="btn btn-danger btn-sm">Delete</button>
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
