@extends('app')

@section('content')
    <div class="event">
        <div class="container">
            <div class="row">
                @include('home.sitebar')
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
                                            <p>Номер заказа: <b>№ {{$order->id}}</b></p>
                                            <p>Бюджет: <b>@if($order->preice=='')Без бюджета @else{{$order->price}} @endif <i class="fa fa-rub"></i></b></p>
                                            <p>Объём: <b>{{$order->amount_page}} страниц</b></p>
                                            <div class="text-blue collapsed" data-toggle="collapse" data-target="#more-info{{$order->id}}" style="cursor:pointer;margin-bottom:10px;">Подробнее</div>
                                            <div class="collapse" id="more-info{{$order->id}}">

                                                <p>Шрифт: <b>{{$order->font}}</b></p>

                                                <p>Интервал: <b>{{$order->getInterval()}}</b></p>

                                              @if($order->antiplagiat)  <p>Система проверки на плагиат: <b>{{$order->antiplagiat->name}}</b></p>@endif
                                            </div>
                                        </div>

                                        <div class="col-md-6" style="line-height:1.3;padding-bottom:16px;border-left:none;">
                                            <p>Срок сдачи: <b>{{$order->expired_at}}</b></p>
                                            <p>Срок гарантии: <b>{{$order->guarant}}</b> дней</p>
                                            <p>Этап работы: <b>{{$order->status->name}}</b></p>
                                            <p>Заказал: <b class="text-success"> {{$order->user->name}}</b>

                                            </p>

                                        </div>

                                    </div>
                                    <button type="button" onclick="location.href='/home/orders/{{$order->id}}/edit'">Редактировать</button>
                                </div>
                            </div>
@endforeach

                </div>
            </div>
        </div>
    </div>




@endsection
