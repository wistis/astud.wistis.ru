@extends('app')

@section('content')
    <div class="eventview">
        <div class="container">
            <div class="row">
                @include('home.sitebar')
                <div class="col-sm-9 col-xs-12">
                    <div class="box">
                        <div class="image">
                            <img src="images/eventbig.jpg" class="img-responsive" alt="img" title="img" />
                        </div>
                        <ul class="list-inline">
                            <li>
                                <i class="icofont icofont-clock-time"></i>
                                <div class="text">
                                    <p>Start Event</p>
                                    <span>22 March 2017, 9.00 am</span>
                                </div>
                            </li>
                            <li>
                                <i class="icofont icofont-flag-alt-1"></i>
                                <div class="text">
                                    <p>Finish Event</p>
                                    <span>22 March 2017, 4.00 pm</span>
                                </div>
                            </li>
                            <li>
                                <i class="icofont icofont-social-google-map"></i>
                                <div class="text">
                                    <p>Address</p>
                                    <span>New Chownk, A Plaza, Newyork</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="matter">
                        <h4>Event Title Here</h4>
                        <button type="button">BUY TICKETS</button>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enimad minim veniam, quis nostrud exercitation ullamco laboris nisi utaliquip ex ea commodo consequat. Duis aute irure dolor inreprehenderit in voluptate velit esse cillum d Ut enimad minim veniam, quis nostrud exercitation ullamco laboris nisi utaliquip ex ea commodo consequat. Duis aute irure dolor inreprehenderit in voluptate velit esse cillum d Ut enimad minim veniam, quis nostrud exercitation ullamco laboris nisi utaliquip ex ea commodo consequat. Duis aute irure dolor inreprehenderit in voluptate velit esse cillum d</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enimad minim veniam, quis nostrud exercitation ullamco laboris nisi utaliquip ex ea commodo consequat. Duis aute irure dolor inreprehenderit in voluptate velit esse cillum d Ut enimad minim veniam, quis nostrud exercitation ullamco laboris nisi utaliquip ex ea commodo consequat. Duis aute irure dolor inreprehenderit in voluptate velit esse cillum d Ut enimad minim veniam, quis nostrud exercitation ullamco laboris nisi utaliquip ex ea commodo consequat. Duis aute irure dolor inreprehenderit in voluptate velit esse cillum d</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enimad minim veniam, quis nostrud exercitation ullamco laboris nisi utaliquip ex ea commodo consequat. Duis aute irure dolor inreprehenderit in voluptate velit esse cillum d Ut enimad minim veniam, quis nostrud exercitation ullamco laboris nisi utaliquip ex ea commodo consequat. Duis aute irure dolor inreprehenderit in voluptate velit esse cillum d Ut enimad minim veniam, quis nostrud exercitation ullamco laboris nisi utaliquip ex ea commodo consequat. Duis aute irure dolor inreprehenderit in voluptate velit esse cillum d</p>
                        <div class="link">
                            <ul class="list-inline pull-left social">
                                <li>Share : </li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank"><i class="icofont icofont-social-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank"><i class="icofont icofont-social-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://plus.google.com/" target="_blank"><i class="icofont icofont-social-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank"><i class="icofont icofont-social-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="https://in.pinterest.com/" target="_blank"><i class="icofont icofont-social-pinterest"></i></a>
                                </li>
                                <li>
                                    <a href="https://in.linkedin.com/" target="_blank"><i class="icofont icofont-brand-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/" target="_blank"><i class="icofont icofont-social-youtube-play"></i></a>
                                </li>
                            </ul>
                            <ul class="list-inline pull-right icon">
                                <li>Share : </li>
                                <li>
                                    <a href="#">Online, </a>
                                </li>
                                <li>
                                    <a href="#">Course, </a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d219104.85983086875!2d75.71658808151895!3d30.90026973769041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a837462345a7d%3A0x681102348ec60610!2sLudhiana%2C+Punjab!5e0!3m2!1sen!2sin!4v1482266274532"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
