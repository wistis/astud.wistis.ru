@extends('app')

@section('content')

    <div class="bread-crumb">
        <img src="/images/banner-top.jpg" class="img-responsive" alt="banner-top" title="banner-top">
        <div class="container">
            <div class="matter">
                <h2>Вход</h2>
                <ul class="list-inline">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <a href="/login">Вход</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- bread-crumb end here -->

    <!-- login start here -->
    <div class="login">
        <div class="container">
            <div class="col-md-6 col-sm-6 col-xs-6  mx-auto box padd0">
                <div class="col-md-12 col-sm-12 col-xs-12  ">
                    <h5>Вход</h5>
                    <hr>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="hidden" name="url" value="{{request('url')}}">
                        <div class="form-group">
                            <label>Email*</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Пароль*</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="links">

                            <a href="{{ route('password.request') }}" class="pull-right">Забыли пароль?</a>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" >Войти</button>
                    </form>

                    <div class="donot">Нет аккаунта? <a href="/register">Регистрация</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- login end here -->






@endsection
