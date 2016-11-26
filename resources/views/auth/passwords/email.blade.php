@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <vue-background image="background/{{ rand(1,10) }}.png">
        <div class="columns is-full is-centered is-vcentered" style="margin-top: -50px">
            <div class="box" style="padding: 40px">
                <div class="title is-centered">@lang('auth.reset')</div>
                <form role="form" method="POST" action="{{ url('/password/email') }}">
                    {{ csrf_field() }}
                    <div class="control has-icon">
                        <input class="input is-medium" name="email" type="email" placeholder="Email">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="control">
                        <button class="button is-medium is-primary is-radius is-fullwidth">@lang('auth.sendreset')</button>
                    </div>
                </form>
            </div>
        </div>
    </vue-background>
@endsection
