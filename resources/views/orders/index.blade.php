@extends('app')
@section('title') @endsection

@section('content')

    <div class="event">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-12 hidden-xs">
                    @include('works.sitebar')
                </div>
                <div class="col-sm-9 col-xs-12">
                    @foreach($orders as $order)
                        <div class="box">

                            <div class="caption" style="margin-left: 0px">
                                <h4>{{$order->name}}<span class="pull-right"> {{$order->created_at->format('d.m.Y')}}</span></h4>
                                <ul class="list-inline">
                                    <li>{{optional($order->type)->name}}</li>
                                    <li>{{optional($order->theme)->name}}</li>
                                    <li class="pull-right">@if($order->preice=='')Без бюджета @else{{$order->price}} @endif  </li>
                                </ul>
                                <div class="section-content section-table row" style="margin-top:0;">

                                    <div class="col-md-6" style="line-height:1.3;padding-bottom:16px;border-right:1px solid #eee;">

                                        <p>Объём: <b>{{$order->amount_page}} страниц</b></p>
                                        <p>Срок гарантии: <b>{{$order->guarant}}</b> дней</p>
                                        <a  href="/orders/{{$order->id}}" class="text-blue collapsed" >Подробнее</a>

                                    </div>

                                    <div class="col-md-6" style="line-height:1.3;padding-bottom:16px;border-left:none;">
                                        <p>Срок сдачи: <b>{{$order->expired_at}}</b></p>


                                        <p>Заказал: <b class="text-success"> {{$order->user->name}}</b>

                                        </p>

                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
                <!--pagination code start here-->
                <div class="col-sm-12 col-xs-12">
                    <ul class="list-inline pagination">
                        <li>
                            <a href="#" aria-label="Previous"><i class="icofont icofont-bubble-left"></i>Prev</a>
                        </li>
                        <li class="active">
                            <a href="#">01</a>
                        </li>
                        <li>
                            <a href="#">02</a>
                        </li>
                        <li>
                            <a href="#">03</a>
                        </li>
                        <li>
                            <a href="#">04</a>
                        </li>
                        <li>
                            <a href="#">...</a>
                        </li>
                        <li>
                            <a href="#">18</a>
                        </li>
                        <li>
                            <a href="#" aria-label="Next">Next<i class="icofont icofont-bubble-right"></i></a>
                        </li>
                    </ul>
                </div>
                <!--pagination code end here-->
            </div>
        </div>
    </div>
    <!-- event end here -->

@endsection