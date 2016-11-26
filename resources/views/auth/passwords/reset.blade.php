@extends('layouts.app')

@section('content')
    <vue-background image="background/{{ rand(1,10) }}.png">
        <div class="columns is-full is-centered is-vcentered" style="margin-top: -50px">
            <div class="box" style="padding: 40px">
                <div class="title is-centered">@lang('auth.userlogin')</div>
                <form role="form" method="POST" action="{{ url('/password/reset') }}">
                    {{ csrf_field() }}
                    <div class="control has-icon">
                        <input class="input is-medium" name="email" type="email" placeholder="Email">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="control has-icon">
                        <input class="input is-medium" name="password" type="password" placeholder="Password">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="control">
                        <vue-switch name="remeber" type="primary"></vue-switch>
                        <a class="is-pulled-right" href="{{ url('password/reset') }}">@lang('auth.forgot')</a>
                    </div>
                    <div class="control">
                        <button class="button is-medium is-primary is-radius is-fullwidth">@lang('auth.login')</button>
                    </div>
                    <p><a href="{{ url('register') }}" class="button is-medium is-light is-radius is-fullwidth">@lang('auth.register')</a></p>
                </form>
            </div>
        </div>

    </vue-background>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
