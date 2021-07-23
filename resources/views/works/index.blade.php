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
                                    <li class="pull-right">{{$order->price}} р  </li>
                                </ul>
                                <div class="section-content section-table row" style="margin-top:0;">

                                    <div class="col-md-6" style="line-height:1.3;padding-bottom:16px;border-right:1px solid #eee;">
                                        <p>Номер заказа: <b>№ {{$order->id}}</b></p>

                                        <p>Объём: <b>{{$order->amount_page}} страниц</b></p>

                                    </div>

                                    <div class="col-md-6" style="line-height:1.3;padding-bottom:16px;border-left:none;">
                                        <p>Год: <b>{{$order->year}}</b></p>
                                        <p>Опубликовал: <b class="text-success"> {{$order->user->name}}</b>

                                    </div>

                                </div>
                                <button type="button" onclick="location.href='/works/{{$order->id}}'">Посмотреть</button>
                            </div>
                        </div>
                    @endforeach


                </div>
                <!--pagination code start here-->
                <div class="col-sm-12 col-xs-12">
                     {{$orders->appends(request()->all())->links()}}
                </div>
                <!--pagination code end here-->
            </div>
        </div>
    </div>
    <!-- event end here -->

@endsection
@section('js')
<script>$("#ex2").slider({});
    $("#ex2").on("slide", function(slideEvt) {
 console.log(slideEvt);
 $('.pr_1').html(slideEvt.value[0]+' р');
 $('.pr_2').html(slideEvt.value[1]+' р');

    });

</script>
@endsection