<!DOCTYPE html>
<html lang={{ config('app.locale') }}>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!-- Styles -->
    <link href={{ elixir("css/app.css") }} rel="stylesheet">
</head>
<body>
    <div class="app" id="app">
        {{--<vue-nprogress></vue-nprogress>--}}
        <section class="hero app-nav animated slideInDown">
                <div class="hero-head">
                    <nav class="nav">
                        <div class="nav-left">
                        </div>
                        <div class="nav-center">
                            <div class="nav-item">
                                <a class="button is-white is-medium" href="{{ url('/') }}">
                                    {{ config('app.name', 'Laravel') }}
                                </a>
                            </div>

                        </div>
                        <div class="nav-right is-flex">
                            @if(Auth::check())
                                <div class="nav-item">
                                    <div class="is-brand">
                                        <a class="button is-white is-medium" href="{{ url('/logout') }}">
                                            @lang('auth.logout')
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="nav-item">
                                    <a class="button is-white is-medium" href="{{ url('/login') }}">
                                        @lang('auth.login')
                                    </a>
                                </div>
                                <div class="nav-item">
                                    <a class="button is-white is-medium" href="{{ url('/register') }}">
                                        @lang('auth.register')
                                    </a>
                                </div>
                            @endif
                        </div>
                    </nav>
                </div>
            </section>
        <section class="app-main">
            @yield('content')
        </section>
        <div class="messages">
            {{--@if(session('status'))--}}
                <vue-message type="success" direction="down" duration="0" message="{{ trans('auth.sent') }}" ></vue-message>
            {{--@endif--}}
        </div>
    </div>
    <!-- Scripts -->
    <script src={{ elixir("js/app.js") }}></script>
</body>
</html>
