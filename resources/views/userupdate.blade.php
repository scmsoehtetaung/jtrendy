@extends('layouts.app')
<style>
.myIMG{
   width:300px;
   height:200px;
}
</style>
@section('content')

    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">User Update</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row col-md-12  mb-5">
                    <form action="{{route('updateur',$users->id)}}"  method="post" enctype="multipart/form-data">
                   
                            @foreach($errors->all() as $error)
                            <p class="alert alert-danger">
                            {{$error}}
                            </p>
                            @endforeach
                            
                            @if (session()->has('alreadyExists'))
                            <div class="alert alert-danger">
                            {{ session('alreadyExists') }}
                            </div>
                            @endif
                              
                            @if (session()->has('alreadyExist'))
                            <div class="alert alert-danger">
                            {{ session('alreadyExist') }}
                            </div>
                            @endif
                               
                            @if (session()->has('password'))
                            <div class="alert alert-danger">
                            {{ session('password') }}
                            </div>
                            @endif
                            @csrf


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old( 'name', $users->name) }}" required >
  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="phone-number" class="form-control" name="phone_number" value="{{ old( 'phone_number', $users->phone_number) }}" required>
           
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old( 'email', $users->email) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" placeholder="Enter at least 6 values" name="password" >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image"  class="col-md-4 col-form-label text-md-right">Photo:</label>
                            <div class="col-md-6">
                                <span class="btn btn-primary btn-file" id="btn">Browse</span>
                                <input type="file" style="display:none" value="" accept="image/*" ID="photo" name="my_photo" onchange="readURL(this);">
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6" style="margin-left:33%;">
                               <img src="{{URL::asset('img/'.$users->user_photo)}}" alt="image" id="phpto_pre" height="42" width="42" class="myIMG">
                            </div>
                        </div>           
                        <div class="form-group row" style="margin-left:34.25%; margin-top:30px">
                            <div class="button">
                                <input type="submit"  value="Update" class="btn btn-primary active"> 
                                <button type="button"  class="btn btn-default"  onclick="window.location='{{ route("back") }}'">Cancle</button> 
                            </div>    
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
$('#btn').on('click',function(e){
       $('#photo').click();
   });

function readURL(input) {
        if (input.files && input.files[0]) {
          var photo = new FileReader();
          photo.onload = function (e) {
            $('#phpto_pre').attr('src', e.target.result);
            }
            photo.readAsDataURL(input.files[0]);
            }
        }

</script>
@endsection
