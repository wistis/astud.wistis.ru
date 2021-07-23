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
                            <h4>{{$work->name}}<span class="pull-right"> {{$work->created_at->format('d.m.Y')}}</span>
                            </h4>
                            <ul class="list-inline">
                                <li>{{optional($work->type)->name}}</li>
                                <li>{{optional($work->theme)->name}}</li>

                            </ul>
                            <hr>
                            <div class="section-content section-table row" style="margin-top:0;">

                                <div class="col-md-6"
                                     style="line-height:1.3;padding-bottom:16px;border-right:1px solid #eee;">
                                    <p>{{$work->description}}</p>

                                </div>

                                <div class="col-md-6" style="line-height:1.3;padding-bottom:16px;border-left:none;">
                                    <p>Уточняйте оригинальность работы ДО покупки, пишите нам на {{env('EMAIL')}} </p>


                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="box">

                        <div class="caption" style="margin-left: 0px">

                            <div class="section-content section-table row" style="margin-top:0;">

                                <div class="col-md-6"
                                     style="line-height:1.3;padding-bottom:16px;border-right:1px solid #eee;">

                                    <p>Год: <b>{{$work->year}}</b></p>
                                    <p>Объём: <b>{{$work->amount_page}} страниц</b></p>
                                    <p>Авторство: <b>  @if($work->im_author==1){{$work->user->name}}@else
                                                Неззвестн @endif</b></p>

                                </div>

                                <div class="col-md-6 row" style="line-height:1.3;padding-bottom:16px;border-left:none;">

                                    <div class="col-md-4 text-left">Цена: {{$work->price}} р</div>
                                    <div class="col-md-8">  @if(auth()->check())
                                      @if($pay->payd_at)
                                                <a href="/storage/works/{{$work->file}}">Скачать</a>

                                      @else

                                            @if(auth()->user()->balance<$work->price)
                                                <button type="button" class="bay_work_not_money">Купить</button>
                                            @else
                                                <button type="button" class="bay_work">Купить</button>

                                            @endif



                                        @endif

                                        @else
                                            <button type="button" class="bay_work_not_auth">Купить</button>
                                        @endif

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="box">
                        <ul class="nav nav-tabs">
                            <!-- Первая вкладка (активная) -->
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#content">Содержание </a>
                            </li>
                            <!-- Вторая вкладка -->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#intro">Введение </a>
                            </li>   <!-- Вторая вкладка -->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#biblio">Введение </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="content">
                              <p>  {!! $work->content !!}</p>
                            </div>
                            <div class="tab-pane fade" id="intro">
                               <p> {!! $work->intro !!}</p>
                            </div>
                            <div class="tab-pane fade" id="biblio">
                                <p>{!! $work->biblio !!}</p>
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
  @auth  <div class="modal fade" id="bay_work_not_money" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <div class="modal-body text-center">
                    <h4 id="readywork-subject">{{$work->name}}</h4>
                    <p>Недостаточно средств. Для покупки работы Вам необходимо пополнить счет на сумму {{($work->price-auth()->user()->balance)}} руб.</p>
                    <br>

                    <form action="/pay/addmoney" method="post">
                        @csrf
                        <div class="form-inline">
                            <div class="form-group">
                                <div class="input-group">

                                    <input type="hidden" name="order_id" id="readywork-id" value="{{$work->id}}">
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
    </div>@endauth
    <div class="modal fade" id="bay_work" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h4 id="readywork-subject">{{$work->name}}</h4>
                    <p>Купить рабосу за {{($work->price)}} руб.</p>
                    <br>

                    <form action="/pay/addmoney" method="post">
                        @csrf
                        <div class="form-inline">
                            <div class="form-group">
                                <div class="input-group">

                                    <input type="hidden" name="order_id" id="readywork-id" value="{{$work->id}}">
                                    <input type="hidden" name="class" id="readywork-id" value="Works">
                                    <input type="hidden" name="url"  value="{{request()->url()}}">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-red"    >
                                            Купить
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
    <div class="modal fade" id="bay_work_not_auth" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Купить работу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-content">


                        <div class="modal-body text-center">
                            <h4 id="readywork-subject">{{$work->name}}</h4>
                            <p>Сумма к оплате: <strong id="readywork-price">{{$work->price}} </strong> р</p>
                            <br>
                            <p>Для покупки готовой работы введите свою почту, <br class="hidden-xs">на неё будет
                                отправлена купленная вами работа.</p>
                            <form action="/pay/addmoney" method="post">
                                @csrf
                                <div class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="email" placeholder="email" class="form-control" name="email"
                                                   required="">
                                            <input type="hidden" name="order_id" id="readywork-id" value="{{$work->id}}">
                                            <input type="hidden" name="class" id="readywork-id" value="Works">
                                            <input type="hidden" name="url"  value="{{request()->url()}}">

                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-red"    >
                                                    Купить
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