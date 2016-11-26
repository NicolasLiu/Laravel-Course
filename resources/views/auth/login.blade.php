@extends('layouts.app')

@section('content')
    <vue-background image="background/{{ rand(1,10) }}.png">
        <div class="columns is-full is-centered is-vcentered" style="margin-top: -50px">
            <div class="box" style="padding: 40px">
                <div class="title is-centered">@lang('auth.userlogin')</div>
                <form role="form" method="POST" action="{{ url('/login') }}">
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

@endsection
