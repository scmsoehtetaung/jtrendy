@extends('layouts.app')

@section('content')
<head>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
</head>
    <div class="col-md-13 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Register</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row col-md-12  mb-5">
                    <form method="POST" action="{{ route('memberRegister') }}" method="post" enctype="multipart/form-data" >
                    @if ($errors->has('gender'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </div>
                     @endif
                    @if (session()->has('message'))
                            <div class="alert alert-info">
                            {{ session('message') }}
                            </div>
                            @endif
                             
                    @if (session()->has('phone'))
                            <div class="alert alert-danger">
                            {{ session('phone') }}
                            </div>
                            @endif
                        @csrf


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">User Type</label>

                            <div class="col-md-6">
                                <select id="user_type" class="form-control{{ $errors->has('user_type') ? ' is-invalid' : '' }}" name="user_type">
                                <option value="1" {{ old('user_type') == "1" ? 'selected' : '' }}>Admin</option>
                                <option value="2" {{ old('user_type') == "2" ? 'selected' : '' }} >Member</option></select>
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}" name="phone_number" placeholder="09xxxxxxxxx/+959xxxxxxxxx" value="{{ old('phone_number') }}" required > 

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="....@gmail.com" value="{{ old('email') }}" required > 

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                       
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            <div class="col-md-6">
                                <input type="radio" class="custom-control-input" id="gender" name="gender" value="0"{{ old('gender')=="0"? "checked" : "" }}>
                                <label class="custom-control-label" for="defaultUnchecked">Male</label>
                            <div class="col-md-6">
                                <input type="radio" class="custom-control-input" id="gender" name="gender" value="1"{{ old('gender')=="1"? "checked" : "" }}>
                                <label class="custom-control-label">Female</label>
                            </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-sm-1 col-form-label text-md-right">Photo</label>
                            <div class="form-group col-md-6 col-sm-1">
                                <input type="button" name="" value="Browse" id="browse_file" class="btn btn-primary" onclick="$('#image').click();">
                                <input type="file" id="image" onchange="previewFile()" style="visibility:hidden" name="myImage">
                                <img src="" width="200px" alt="" src="">
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="margin-left:33%; margin-top:30px">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                               Register
                                </button>
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
function previewFile() {
  var preview = document.querySelector('img');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}
</script>