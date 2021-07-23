@extends('app')

@section('content')
    <div class="bread-crumb">
        <img src="/images/banner-top.jpg" class="img-responsive" alt="banner-top" title="banner-top">
        <div class="container">
            <div class="matter">
                <h2>Регистрация</h2>
                <ul class="list-inline">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <a href="/register">Регистрация</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- bread-crumb end here -->

    <!-- login start here -->
    <div class="login">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12 box padd0">
                <div class="col-md-6 col-sm-6 col-xs-12 bor">
                    <h5>Как заказчик</h5>
                    <hr>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="user_type" value="0">
                        <input type="hidden" name="phone" value="">
                        <input type="hidden" name="city" value="">
                        <input type="hidden" name="lastname" value="">

                        <div class="form-group">
                            <label>Имя*</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>E-mail*</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Пароль*</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Повтор пароля*</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">


                        </div>
                        <div class="links">
                            <input type="checkbox" name="credit" class="checkclass checkbox-inline" checked required/>
                            Я принимаю пользовательское соглашение
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Регистрация заказчика</button>
                    </form>


                    <div class="donot">Есть аккаунт? <a href="/login">Войти</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12  ">
                    <h5>Как эксперт</h5>
                    <hr>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="user_type" value="1">
                        <div class="form-group">
                            <label>Имя*</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Фамилия*</label>
                            <input id="lastname" type="text"
                                   class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                   value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Телефон*</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                   name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Город</label>
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                   name="city" value="{{ old('city') }}"  autocomplete="city" autofocus>

                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>E-mail*</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Пароль*</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Повтор пароля*</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">


                        </div>
                        <div class="links">
                            <input type="checkbox" name="credit" class="checkclass checkbox-inline" checked required/>
                            Я принимаю пользовательское соглашение
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Регистрация эксперта</button>
                    </form>


                    <div class="donot">Есть аккаунт? <a href="/login">Войти</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login end here -->






















    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
