@extends('multiauth::layouts.app')
@section('content')
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header"><h4>{{ ucfirst(config('multiauth.prefix')) }} Login</h4></div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.login') }}" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" tabindex="1" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                                    </div>
                                    @csrf

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">{{ __('Password') }}</label>
                                            <div class="float-right">
                                                <a href="{ route('admin.password.request') }}" class="text-small">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" tabindex="2" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
{{--                                        <div class="invalid-feedback">--}}
{{--                                            please fill in your password--}}
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ old( 'remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember-me">                                        {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            {{ __('Login') }}

                                        </button>
                                    </div>
                                </form>
{{--                                <div class="text-center mt-4 mb-3">--}}
{{--                                    <div class="text-job text-muted">Login With Social</div>--}}
{{--                                </div>--}}
{{--                                <div class="row sm-gutters">--}}
{{--                                    <div class="col-6">--}}
{{--                                        <a class="btn btn-block btn-social btn-facebook">--}}
{{--                                            <span class="fab fa-facebook"></span> Facebook--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6">--}}
{{--                                        <a class="btn btn-block btn-social btn-twitter">--}}
{{--                                            <span class="fab fa-twitter"></span> Twitter--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                            </div>
                        </div>
{{--                        <div class="mt-5 text-muted text-center">--}}
{{--                            Don't have an account? <a href="auth-register.html">Create One</a>--}}
{{--                        </div>--}}
{{--                        <div class="simple-footer">--}}
{{--                            Copyright &copy; Stisla 2018--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </section>
    </div>


{{--    Default--}}

{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Login</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Admin Login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"--}}
{{--                                    required autofocus> @if ($errors->has('email'))--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('email') }}</strong>--}}
{{--                                    </span> @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"--}}
{{--                                    required> @if ($errors->has('password'))--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                    </span> @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                <a class="btn btn-link" href="{{ route('admin.password.request') }}">--}}
{{--                                    {{ __('Forgot Your Password?') }}--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
