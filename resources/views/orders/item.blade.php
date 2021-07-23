@extends('app')
@section('title') @endsection

@section('content')

    <div class="event">
        <div class="container">
            <div class="row">

                @include('home.sitebar')

                <div class="col-sm-9 col-xs-12">
                    <div class="box">

                        <div class="caption" style="margin-left: 0px">
                            <h4>{{$order->name}}<span class="pull-right"> {{$order->created_at->format('d.m.Y')}}</span>
                            </h4>
                            <ul class="list-inline">
                                <li>{{optional($order->type)->name}}</li>
                                <li>{{optional($order->theme)->name}}</li>

                            </ul>
                            <hr>
                            <div class="section-content section-table row" style="margin-top:0;">

                                <div class="col-md-12"
                                     style="line-height:1.3;padding-bottom:16px;border-right:1px solid #eee;">
                                    <p>{{$order->comment}}</p>

                                </div>



                            </div>


                        </div>
                    </div>
                    @if(count($order->files)>0)
                        <div class="box">
                            <h5>Файлы</h5>
                            <div class="col-md-12"
                                 style="line-height:1.3;padding-bottom:16px;border-right:1px solid #eee;">
                            @foreach($order->files as $file)
                                <div class="row">
                                    <div class="col-md-6"><a href="/storage/orders/{{$file->file}}">{{$file->name}}</a></div>



                                </div>

                            @endforeach
                        </div>
                        </div>
                     @endif
                    <div class="box">

                        <div class="caption" style="margin-left: 0px">

                            <div class="section-content section-table row" style="margin-top:0;">

                                <div class="col-md-6"
                                     style="line-height:1.3;padding-bottom:16px;border-right:1px solid #eee;">       <p>Бюджет: <b>{{$order->price}} р</b></p>
                                    @if($order->antiplagiat)   <p>Проверка на плагиат: <b>{{$order->antiplagiat->name}} </b></p>@endif
                                    <p>Оригинальность: <b> {{$order->original}}%</b></p>
                                    <p>Срок сдачи: <b> {{$order->expired_at }}</b></p>
                                    <p>Курс,ВУЗ: <b> {{$order->curs }},{{$order->vuz }}</b></p>     </div>
                                <div class="col-md-6"
                                     style="line-height:1.3;padding-bottom:16px;border-right:1px solid #eee;">


                                    <p>Количество страниц: <b> {{$order->amount_page }} </b></p>
                                    <p>Шрифт: <b> {{$order->font }} </b></p>
                                    <p>Интервал: <b>   @if($order->interval==10)Одинарный @endif
                                             @if($order->interval==15) Полуторный @endif
                                            @if($order->interval==20) Двойной @endif
                                    <p>Гарантийный срок: <b> {{$order->guarant }} </b></p>
                                </div>

<button type="button" class="order_responce">Откликнуться</button>

                            </div>

                        </div>
                    </div>


                </div>
                <!--pagination code start here-->

                <!--pagination code end here-->
            </div>
        </div>
    </div>
    <!-- event end here -->
    <!-- Modal -->
    <div class="modal fade" id="order_responce" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <div class="modal-body text-center">
                    <h4 id="readywork-subject">{{$order->name}}</h4>
                    <p>Недостаточно средств. Для покупки работы Вам необходимо пополнить счет на сумму {{($order->price-auth()->user()->balance)}} руб.</p>
                    <br>

                    <form action="/pay/addmoney" method="post">
                        @csrf
                        <div class="form-inline">
                            <div class="form-group">
                                <div class="input-group">

                                    <input type="hidden" name="order_id" id="readywork-id" value="{{$order->id}}">
                                    <input type="hidden" name="class" id="readywork-id" value="Works">
                                    <input type="hidden" name="url"  value="{{request()->url()}}">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-red"    >
                                            Пополнить баланс
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).on('click', '.bay_work_not_auth', function () {
            $('#bay_work_not_auth').modal('show')

        });  $(document).on('click', '.bay_work_not_money', function () {
            $('#bay_work_not_money').modal('show')

        });
        $(document).on('click', '.bay_work', function () {
            $('#bay_work').modal('show')

        });


    </script>
@endsection