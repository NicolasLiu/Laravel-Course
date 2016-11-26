@extends('layouts.app')

@section('content')
    <vue-background image="background/{{ rand(1,10) }}.png">
        <div class="columns is-full is-centered is-vcentered" style="margin-top: -50px">
            <div class="box" style="padding: 40px">
                <div class="title is-centered">@lang('auth.register')</div>
                <form role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <div class="control has-icon">
                        <input required class="input is-medium" name="name" type="text" placeholder="Username">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="control has-icon">
                        <input required class="input is-medium" name="email" type="email" placeholder="Email">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="control has-icon">
                        <input required class="input is-medium" name="password" type="password" placeholder="Password">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="control has-icon">
                        <input required class="input is-medium" name="password_confirmation" type="password" placeholder="Confirm Password">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="control has-icon">
                        <input required class="input is-medium" name="phone" type="number" placeholder="Phone Number">
                        <i class="fa fa-mobile"></i>
                    </div>
                    <div class="control has-icon">
                        <input required class="input is-medium" name="idnumber" type="text" placeholder="Student ID">
                        <i class="fa fa-id-card"></i>
                    </div>
                    <div class="control">
                        <button class="button is-medium is-primary is-radius is-fullwidth">@lang('auth.register')</button>
                    </div>
                </form>
            </div>
        </div>

    </vue-background>
@endsection
