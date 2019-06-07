@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Login</span>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class ="row col-md-12 mb-5">
                        <form method="POST" class="form-horizontal" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">{{ __('E-Mail Address') }}</label>
                                    <div class="col-sm-4">
                                        <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">{{ __('Password') }}</label>
                                    <div class="col-sm-4">          
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                    </div>
                            </div>
                            <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}</label>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group row mb-0">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">
                                            {{ __('Login') }}
                                        </button>
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
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
