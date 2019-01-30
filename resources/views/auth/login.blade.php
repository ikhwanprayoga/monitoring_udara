@extends('layouts.auth_master')

@section('head')
<title>Login</title>
@endsection

@section('content')
<section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="text-center mb-1">
                            <img src="app-assets/images/logo/logo.png" alt="branding logo">
                    </div>
                    <div class="font-large-1  text-center">                       
                        Login
                    </div>
                </div>
                <div class="card-content">
                
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}" novalidate>
                                @csrf
                            <fieldset class="form-group position-relative has-icon-left">
                                <input id="email" type="email" class="round form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                <div class="form-control-position">
                                    <i class="ft-at-sign"></i>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left ">
                                <input id="password" type="password" class="round form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <div class="form-control-position">
                                    <i class="ft-lock"></i>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-md-6 col-12 text-center text-sm-left ">
                                
                                </div>
                                {{-- <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div> --}}
                            </div>                           
                            <div class="form-group text-center">
                                <hr>
                                <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">Login</button>    
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection