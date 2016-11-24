@extends('layouts.app')

@section('content')
    <vue-background image="background/{{ rand(1,10) }}.png">
        @include('vendor.blankline', ['margin' => 20])
        <div class="columns is-centered">
            <div class="column is-3 box">
                <form role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <p class="control has-icon">
                        <input class="input" type="email" placeholder="Email">
                        <i class="fa fa-envelope"></i>
                    </p>
                    <p class="control has-icon">
                        <input class="input" type="password" placeholder="Password">
                        <i class="fa fa-lock"></i>
                    </p>
                    <p class="control">
                        <button class="button is-success">
                            Login
                        </button>
                    </p>
                </form>
            </div>
        </div>
    </vue-background>

@endsection
