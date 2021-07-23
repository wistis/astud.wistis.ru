<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <ul class="list-inline float-left icon">


                </ul>
                <ul class="list-inline float-right icon">

                   @auth




                        <li>
                            <a href="/home"><i class="icofont icofont-ui-user"></i>{{auth()->user()->name}}</a>
                        </li>
                        <li>
                            <a href="/logout"><i class="icofont icofont-ui-user"></i>Выйти</a>
                        </li>
                       @else
                        <li>
                        <a href="/login"><i class="icofont icofont-key"></i>Вход</a>
                    </li>
                    <li>
                        <a href="/register"><i class="icofont icofont-ui-user"></i>Регистрация</a>
                    </li>@endauth
                </ul>
            </div>
        </div>
    </div>
</div>
<!--top end here -->

<!-- header start here-->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div id="logo">
                    <a href="/">
                        <img class="img-fluid" src="images/logo.png" alt="logo" title="logo" />
                    </a>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 paddmenu">
                <!-- menu start here -->
                <div id="menu">
                    <nav class="navbar navbar-expand-lg">
                        <span class="menutext visible-xs">Меню</span>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i>
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarmain">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="/pages/about">О бирже</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/authors">Выбрать автора</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/support">Поддержка</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/works">База готовых работ</a>
                                </li>
                                @if(auth()->check()&&auth()->user()->user_type==1)
                                    <li class="nav-item">
                                        <a class="nav-link" href="/orders">Биржа  заказов</a>
                                    </li>
                                @endif


                                <li class="nav-item">
                                    <a class="nav-link" href="/#plagiat">Поднять плагиат</a>
                                </li>
                                @auth
                                    @if(auth()->user()->user_type==0)<li>
                                        <a href="/home/orders/create" type="button" class="btn-info">Создать заказ</a>

                                    </li>   @endif
                                @endauth
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- menu end here -->
            </div>

        </div>
    </div>
</header>