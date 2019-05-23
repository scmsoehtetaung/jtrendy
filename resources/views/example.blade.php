@extends('layouts.app')

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


                        <table style="width:100%">
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th> 
                                <th>Age</th>
                            </tr>
                            <tr>
                                <td>Jill</td>
                                <td>Smith</td> 
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>Eve</td>
                                <td>Jackson</td> 
                                <td>94</td>
                            </tr>
                        </table>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
