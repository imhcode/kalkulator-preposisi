@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default"  style="overflow: hidden; border-radius: 15px !important; border:none; box-shadow:rgba(193, 67, 53, 0.31) 5px 5px 25px;">
                <div class="panel-heading" style="text-align: center;font-size: 20px;border: none;margin: 20px 0px; color:#c14335; font-weight: bold;">LOG IN</div>
                <div class="panel-heading" style="text-align: center;font-size: 14px;border: none;margin: 20px 40px;">Log in to get in the moment updates on the things that interest you.</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label"><i class="fa fa-envelope"></i></label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email" required autofocus style="border-radius: 20px">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-2 control-label"><i class="fa fa-lock"></i></label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" placeholder="password" required style="border-radius: 20px">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <!--  <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> -->


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 20px !important; background:#c14335;border: none;">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="" style="font-size: 12px">
                                Don't have an account ? <a href="{{url('/register')}}">Sign Up Now</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
