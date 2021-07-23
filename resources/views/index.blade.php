@extends('app')
@section('title') @endsection

@section('content')

    <!-- slider start here -->
    <div class="slide">
        <div class="slideshow owl-carousel">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <img src="images/banner.jpg" alt="banner" title="banner" class="img-fluid"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <img src="images/banner.jpg" alt="banner" title="banner" class="img-fluid"/>
                </div>
            </div>
        </div>

        <!-- slide-detail start here -->
        <div class="slide-detail">
            <div class="container">
                <div class="matter" style="padding: 10px 40px;">
                    <p class="text">Лучшая база работ</p>
                    <h4>HelpStud24 - помощь студенту 24 ч</h4>

                </div>
                @if(!auth()->check())
                    <div class="matter2">
                        <h2>Узнать стоимость работы</h2>
                        <form class="form-horizontal" method="post" action="/orders/create">@csrf
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12"> @if(session()->has('error_email'))

                                        <strong style="color: red">Этот адрес эл.почты уже зарегистрирован на сайте. Чтобы узнать стоимость заказа - войдите в личный кабинет, создайте заказ и эксперты выставят свои предложения. Это займет не более 10 минут!</strong>

                                            @endif</div>
                                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                            <input name="name" class="form-control" value="{{old('nane')}}" placeholder="Тема работы"
                                                   type="text">
                                        </div>

                                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                            <div class="form-group">
                                                <select class="custom-select" name="type_id" required>
                                                    <option value="">Тип работы</option>
                                                    @foreach(\App\Type::get() as $type)
                                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                            <div class="form-group">
                                                <select name="theme_id" class="custom-select"  required>
                                                    <option value="">Предмет</option>
                                                    @foreach(\App\ThemeCatagory::get() as $theme)
                                                        <optgroup label="{{$theme->name}}"></optgroup>
                                                        @foreach($theme->getthemes as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                            <input name="email" class="form-control" value="{{old('email')}}" placeholder="E-mail"
                                                   type="text" required>


                                        </div>
                                        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
                                            Оформите заказ (это бесплатно), и эксперты начнут откликаться уже через 10 минут
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                            <button class="btn-primary" type="submit">Узнать стоимость</button>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                @endif

                <div class="matter2">
                    <h2>Поиск</h2>
                    <form class="form-horizontal" method="get" action="/works">@csrf
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 row">

                                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                        <input name="name" class="form-control"   placeholder="Тема работы"
                                               type="text">
                                    </div>

                                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                        <div class="form-group">
                                            <select class="custom-select" name="type_id"  >
                                                <option value="">Тип работы</option>
                                                @foreach(\App\Type::get() as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                        <div class="form-group">
                                            <select name="theme_id" class="custom-select"   >
                                                <option value="">Предмет</option>
                                                @foreach(\App\ThemeCatagory::get() as $theme)
                                                    <optgroup label="{{$theme->name}}"></optgroup>
                                                    @foreach($theme->getthemes as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                                        <button class="btn-primary" type="submit">Поиск</button>

                                    </div>



                                </div>
                            </div>

                        </div>
                    </form>
                </div>

                {{--           <div class="matter2">
                               <h2>Search</h2>
                               <form class="form-horizontal" method="post">
                                   <div class="row">
                                       <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12">
                                           <div class="row">
                                               <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                                   <div class="form-group">
                                                       <select class="custom-select" id="location" required>
                                                           <option value="1">Course Categories</option>
                                                           <option value="0">Category 1</option>
                                                           <option value="0">Category 2</option>
                                                           <option value="0">Category 3</option>
                                                       </select>
                                                   </div>
                                               </div>
                                               <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                                   <div class="form-group">
                                                       <select class="custom-select" id="location" required>
                                                           <option value="1">Cost Type</option>
                                                           <option value="0">Cost 1</option>
                                                           <option value="0">Cost 2</option>
                                                           <option value="0">Cost 3</option>
                                                       </select>
                                                   </div>
                                               </div>
                                               <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                                   <input name="s" class="form-control" value="" placeholder="Search Text" type="text">
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                           <button class="btn-primary" type="button">Search</button>
                                       </div>
                                   </div>
                               </form>
                           </div>--}}
            </div>
        </div>
        <!-- slide-detail end here -->
    </div>
    <!-- slider end here -->

    <!-- service start here -->
    <div class="service">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="commontop text-center">
                        <h2>our best service for you</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <hr>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12 box text-center">
                    <div class="icons">
                        <div class="icon">
                            <img src="images/icon_01.png" class="img-fluid" alt="icon" title="icon"/>
                        </div>
                    </div>
                    <h4>Professional Courses</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
                <div class="col-sm-3 col-xs-12 box text-center">
                    <div class="icons">
                        <div class="icon">
                            <img src="images/icon_02.png" class="img-fluid" alt="icon" title="icon"/>
                        </div>
                    </div>
                    <h4>Experienced Instructors</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
                <div class="col-sm-3 col-xs-12 box text-center">
                    <div class="icons">
                        <div class="icon">
                            <img src="images/icon_03.png" class="img-fluid" alt="icon" title="icon"/>
                        </div>
                    </div>
                    <h4>Practical Traning</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
                <div class="col-sm-3 col-xs-12 box text-center">
                    <div class="icons">
                        <div class="icon">
                            <img src="images/icon_04.png" class="img-fluid" alt="icon" title="icon"/>
                        </div>
                    </div>
                    <h4>Validated Certificated</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- service end here -->

    <!-- about start here -->
    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-xs-12">
                    <div class="commontop text-left">
                        <h2>About us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor<br> incididunt
                            ut labore et dolore magna aliqua.</p>
                        <hr>
                    </div>
                    <p class="des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco.... <a href="about.html">View more</a></p>
                    <div class="image">
                        <img src="images/about-img.jpg" class="img-fluid" alt="img" title="img"/>
                        <div class="icon">
                            <div class="ico"><a href="#"><i class="icofont icofont-ui-play"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12 feature">
                    <div class="commontop text-left">
                        <h2>our features</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt.</p>
                        <hr>
                    </div>
                    <p class="des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco... <a href="about.html">view more</a></p>
                    <div class="box">
                        <img src="images/icon01.png" class="img-fluid" alt="icon" title="icon"/>
                        <p>Learn Courses online</p>
                        <a href="#">View more</a>
                    </div>
                    <div class="box">
                        <img src="images/icon02.png" class="img-fluid" alt="icon" title="icon"/>
                        <p>Online Library Store</p>
                        <a href="#">View more</a>
                    </div>
                    <img src="images/ads.jpg" class="img-fluid" alt="ads" title="ads"/>
                </div>
            </div>
        </div>
    </div>
    <!-- about end here -->

    <!-- courses start here -->
    <div class="course">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="commontop text-center">
                        <h2>our best popular courses for you</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <hr>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="courses owl-carousel">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="all_courses.html">
                                        <img src="images/01.jpg" class="img-fluid" alt="img" title="img"/>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3>Technology <span class="price">$29.00</span></h3>
                                    <h4>Developing Mobiles Apps</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum
                                        malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#"><i class="icofont icofont-ui-user"></i>15</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                        </li>
                                        <li>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="all_courses.html">
                                        <img src="images/01.jpg" class="img-fluid" alt="img" title="img"/>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3>Graphic Design <span class="price">$29.00</span></h3>
                                    <h4>Professional Logo Design</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum
                                        malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#"><i class="icofont icofont-ui-user"></i>15</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                        </li>
                                        <li>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="all_courses.html">
                                        <img src="images/01.jpg" class="img-fluid" alt="img" title="img"/>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3>Photography <span class="price">$29.00</span></h3>
                                    <h4>Basic Nature Photography</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum
                                        malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#"><i class="icofont icofont-ui-user"></i>15</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                        </li>
                                        <li>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="all_courses.html">
                                        <img src="images/01.jpg" class="img-fluid" alt="img" title="img"/>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3>Adobe photoshop <span class="text">Free</span></h3>
                                    <h4>Photoshop Effects</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum
                                        malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#"><i class="icofont icofont-ui-user"></i>15</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                        </li>
                                        <li>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="all_courses.html">
                                        <img src="images/01.jpg" class="img-fluid" alt="img" title="img"/>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3>Busniss <span class="price">$29.00</span></h3>
                                    <h4>Market Management</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum
                                        malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#"><i class="icofont icofont-ui-user"></i>15</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                        </li>
                                        <li>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="all_courses.html">
                                        <img src="images/01.jpg" class="img-fluid" alt="img" title="img"/>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3>Adobe photoshop <span class="price">$29.00</span></h3>
                                    <h4>Personal Busniss Card</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum
                                        malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#"><i class="icofont icofont-ui-user"></i>15</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                        </li>
                                        <li>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="all_courses.html">
                                        <img src="images/01.jpg" class="img-fluid" alt="img" title="img"/>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3>Technology <span class="price">$29.00</span></h3>
                                    <h4>Developing Mobiles Apps</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum
                                        malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#"><i class="icofont icofont-ui-user"></i>15</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                        </li>
                                        <li>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="all_courses.html">
                                        <img src="images/01.jpg" class="img-fluid" alt="img" title="img"/>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3>Technology <span class="price">$29.00</span></h3>
                                    <h4>Convert PSD to HTML</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum
                                        malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#"><i class="icofont icofont-ui-user"></i>15</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                        </li>
                                        <li>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="all_courses.html">
                                        <img src="images/01.jpg" class="img-fluid" alt="img" title="img"/>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3>Technology <span class="price">$29.00</span></h3>
                                    <h4>Developing Mobiles Apps</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum
                                        malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#"><i class="icofont icofont-ui-user"></i>15</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                        </li>
                                        <li>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="all_courses.html">
                                        <img src="images/01.jpg" class="img-fluid" alt="img" title="img"/>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3>Graphic Design <span class="price">$29.00</span></h3>
                                    <h4>Professional Logo Design</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum
                                        malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#"><i class="icofont icofont-ui-user"></i>15</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                        </li>
                                        <li>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="all_courses.html">
                                        <img src="images/01.jpg" class="img-fluid" alt="img" title="img"/>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3>Photography <span class="price">$29.00</span></h3>
                                    <h4>Basic Nature Photography</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum
                                        malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#"><i class="icofont icofont-ui-user"></i>15</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                        </li>
                                        <li>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <div class="image">
                                    <a href="all_courses.html">
                                        <img src="images/01.jpg" class="img-fluid" alt="img" title="img"/>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3>Adobe photoshop <span class="text">Free</span></h3>
                                    <h4>Photoshop Effects</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum
                                        malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#"><i class="icofont icofont-ui-user"></i>15</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                        </li>
                                        <li>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- courses end here -->

    <!-- featured start here -->
    <div class="featured">
        <div class="image">
            <img src="images/features/bg.jpg" class="img-fluid" alt="bg" title="bg"/>
        </div>
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="list-inline">
                            <li>
                                <div class="box">
                                    <div class="icon">
                                        <div class="icons">
                                            <img src="images/features/icon1.png" class="img-fluid" alt="image"
                                                 title="image"/>
                                        </div>
                                    </div>
                                    <h4>Country Reached</h4>
                                    <p>15</p>
                                </div>
                            </li>
                            <li>
                                <div class="box">
                                    <div class="icon">
                                        <div class="icons">
                                            <img src="images/features/icon2.png" class="img-fluid" alt="image"
                                                 title="image"/>
                                        </div>
                                    </div>
                                    <h4>User Registers</h4>
                                    <p>25k</p>
                                </div>
                            </li>
                            <li>
                                <div class="box">
                                    <div class="icon">
                                        <div class="icons">
                                            <img src="images/features/icon3.png" class="img-fluid" alt="image"
                                                 title="image"/>
                                        </div>
                                    </div>
                                    <h4>Staff Members</h4>
                                    <p>566</p>
                                </div>
                            </li>
                            <li>
                                <div class="box">
                                    <div class="icon">
                                        <div class="icons">
                                            <img src="images/features/icon4.png" class="img-fluid" alt="image"
                                                 title="image"/>
                                        </div>
                                    </div>
                                    <h4>Courses Published</h4>
                                    <p>1150</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured end here -->

    <!-- blog start here -->
    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="commontop text-center">
                        <h2>our blog get up to date with us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <hr>
                    </div>
                </div>

                <div class="col-sm-4 col-xs-12">
                    <div class="box">
                        <div class="image">
                            <a href="blog.html">
                                <img src="images/b1.jpg" class="img-fluid" alt="img" title="img"/>
                            </a>
                        </div>
                        <div class="caption">
                            <ul class="list-inline">
                                <li>
                                    <a href="#"><i class="icofont icofont-ui-calendar"></i>August 22th, 2017</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                </li>
                            </ul>
                            <h3>Photoshop</h3>
                            <h4>How to create Smoke Effect in Photoshop?</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="box">
                        <div class="image">
                            <a href="blog.html">
                                <img src="images/b1.jpg" class="img-fluid" alt="img" title="img"/>
                            </a>
                        </div>
                        <div class="caption">
                            <ul class="list-inline">
                                <li>
                                    <a href="#"><i class="icofont icofont-ui-calendar"></i>August 28th, 2017</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                </li>
                            </ul>
                            <h3>Technology</h3>
                            <h4>How to convert PSD file to HTML file?</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="box">
                        <div class="image">
                            <a href="blog.html">
                                <img src="images/b1.jpg" class="img-fluid" alt="img" title="img"/>
                            </a>
                        </div>
                        <div class="caption">
                            <ul class="list-inline">
                                <li>
                                    <a href="#"><i class="icofont icofont-ui-calendar"></i>August 30th, 2017</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                </li>
                            </ul>
                            <h3>Marketing</h3>
                            <h4>How to Write Catchy Headlines and Blog Titles Can't Resist</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="box">
                        <div class="image">
                            <a href="blog.html">
                                <img src="images/b1.jpg" class="img-fluid" alt="img" title="img"/>
                            </a>
                        </div>
                        <div class="caption">
                            <ul class="list-inline">
                                <li>
                                    <a href="#"><i class="icofont icofont-ui-calendar"></i>August 22th, 2017</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                </li>
                            </ul>
                            <h3>Technology</h3>
                            <h4>How to Build Chatting App in Phonegap?</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="box">
                        <div class="image">
                            <a href="blog.html">
                                <img src="images/b1.jpg" class="img-fluid" alt="img" title="img"/>
                            </a>
                        </div>
                        <div class="caption">
                            <ul class="list-inline">
                                <li>
                                    <a href="#"><i class="icofont icofont-ui-calendar"></i>August 28th, 2017</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                </li>
                            </ul>
                            <h3>Technology</h3>
                            <h4>Professional Nature Photography?</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="box">
                        <div class="image">
                            <a href="blog.html">
                                <img src="images/b1.jpg" class="img-fluid" alt="img" title="img"/>
                            </a>
                        </div>
                        <div class="caption">
                            <ul class="list-inline">
                                <li>
                                    <a href="#"><i class="icofont icofont-ui-calendar"></i>August 30th, 2017</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont icofont-comment"></i>10</a>
                                </li>
                            </ul>
                            <h3>Adobe Illustrator</h3>
                            <h4>How to Create Professional Logo?</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog end here -->

    <!-- testimonail start here -->
    <div class="testimonail">
        <div class="image">
            <img src="images/test_bg.jpg" class="img-fluid" alt="bg" title="bg"/>
        </div>
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box">
                            <div class="icon">
                                <img src="images/test.png" class="img-fluid" alt="image" title="image"/>
                            </div>
                            <h4>John Doe</h4>
                            <h5>Graphic Designer</h5>
                            <p><i class="icofont icofont-quote-left"></i>Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                dolore eu fugiat nulla pariatur.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonail end here -->

    <!-- newsletter start here -->
    <div id="newsletter">
        <div class="container">
            <div class="row">
                <div id="subscribe">
                    <form class="form-horizontal" name="subscribe">
                        <div class="col-sm-12">
                            <p class="news">SUBSCribe to our <span>newsletter</span></p>
                        </div>
                        <div class="col-sm-12 form-group">
                            <div class="input-group">
                                <input value="" name="subscribe_email" id="subscribe_email"
                                       placeholder="Type your e-mail..." type="text">
                                <button class="btn btn-news" type="submit" value="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- newsletter end here -->

@endsection