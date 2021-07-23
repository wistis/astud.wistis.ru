@extends('app')

@section('content')
    <div class="eventview">
        <div class="container">
            <div class="row">
                @include('home.sitebar')
                <div class="col-sm-9 col-xs-12 login" style="margin-top: 0px">
                    <form method="POST" @if($order->id)  action="/home/orders/{{$order->id}}"
                          @else action="/home/orders" @endif enctype="multipart/form-data">
                        @if($order->id)@method('PUT')   @endif
                        <h5>Создание нового заказа</h5>
                        <hr>

                        @csrf
                        <div class="row sort">
                            <div class="form-group col-md-12">
                                <label>Тема работы*</label>
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ $order->name ?? old('name') }}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Выберите тип работы*</label>
                                <select name="type_id" class="custom-select" @error('type_id') is-invalid
                                        @enderror required>
                                    <option value="">Тип работы</option>
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}"
                                                @if($order->type_id ==$type->id)selected @endif >{{$type->name}}</option>
                                    @endforeach
                                </select>


                                @error('type_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Выберите предмет*</label>
                                <select name="theme_id" class="custom-select" @error('theme_id') is-invalid
                                        @enderror required>
                                    <option value="">Предмет</option>
                                    @foreach($themes as $theme)
                                        <optgroup label="{{$theme->name}}"></optgroup>
                                        @foreach($theme->getthemes as $item)
                                            <option value="{{$item->id}}"
                                                    @if($order->type_id ==$theme->id)selected @endif >{{$item->name}}</option>
                                        @endforeach
                                    @endforeach
                                </select>


                                @error('theme_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label>Пояснения и комментарии к заказу*</label>
                                <textarea name="comment" class="form-control" @error('comment') is-invalid
                                          @enderror required>{{$order->comment}}</textarea>

                                @error('comment')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if($order->id)
                            <div class="row sort">
                                <div class="form-group col-md-6">
                                    <label>Статус заказа</label>
                                    <select name="status_id" class="custom-select" @error('status_id') is-invalid
                                            @enderror required>

                                        @foreach($statsis as $status)
                                            <option value="{{$status->id}}"
                                                    @if($order->status_id ==$status->id)selected @endif >{{$status->name}}</option>
                                        @endforeach
                                    </select>


                                    @error('type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        @endif
                        <div class="row sort">
@php($z=1)
                            <div class="form-group col-md-12">
                                <label>До 5 файлов
                                    (файл не более 15Mb) </label>
                                @if($order->files)
                                    @foreach($order->files as $file)
<div class="row">
    <div class="col-md-6"><a href="/storage/orders/{{$file->file}}">{{$file->name}}</a></div>
    <div class="col-md-6"><a href="/home/orders/17/edit?delete_file={{$file->id}}" style="color: red">Удалить</a></div>


</div>
                                        @php($z++)

                                    @endforeach

                                @endif
                                @for($i=$z;$i<=5;$i++)  <br>  <input type="file" name="file[]">

                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @endfor
                            </div>
                        </div>
                        <div class="row sort">

                            <div class="form-group col-md-3">
                                <label>Бюджет (в рублях) </label>
                                <input id="price" type="price" class="form-control @error('price') is-invalid @enderror"
                                       name="price" value="{{$order->price }}" required>
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label>Проверка на плагиат </label>
                                <select name="antiplagiat_id" class="custom-select">
                                    <option value="">Выбрать</option>
                                    @foreach(\App\Antiplagiat::get() as $anti)
                                        <option value="{{$anti->id}}"
                                                @if($order->antiplagiat_id==$anti->id) selected @endif>{{$anti->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Оригинальность </label>
                                <input id="original" type="text"
                                       class="form-control @error('original') is-invalid @enderror"
                                       name="original" value="{{$order->original }}">
                                @error('original')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label>Срок сдачи </label>
                                <input id="expired_at" type="date"
                                       class="form-control @error('expired_at') is-invalid @enderror"
                                       name="expired_at" value="{{ $order->expired_at }}">
                                @error('expired_at')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label>Курс</label>
                                <input id="curs" type="text" class="form-control"
                                       name="curs" value="{{$order->curs }}">
                            </div>
                            <div class="form-group col-md-8">
                                <label>ВУЗ </label>
                                <input id="vuz" type="text" class="form-control"
                                       name="vuz" value="{{ $order->vuz }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Количество страниц </label>
                                <input id="amount_page" type="text" class="form-control"
                                       name="amount_page" value="{{$order->amount_page }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Шрифт</label>
                                <select name="font" class="custom-select">
                                    @for($i=10;$i<=14;$i++)
                                        <option value="{{$i}}" @if($order->font==$i) selected @endif>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Интервал</label>
                                <select name="interval" class="custom-select">
                                    <option value="10" @if($order->interval==10) selected @endif>Одинарный</option>
                                    <option value="15" @if($order->interval==15) selected @endif>Полуторный</option>
                                    <option value="20" @if($order->interval==20) selected @endif>Двойной</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Гарантийный срок</label>
                                <select name="guarant" class="custom-select">
                                    <option value="10" @if($order->guarant==10) selected @endif>10 дней</option>
                                    <option value="20" @if($order->guarant==20) selected @endif>20 дней</option>
                                    <option value="30" @if($order->guarant==30) selected @endif>30 дней</option>
                                    <option value="40" @if($order->guarant==40) selected @endif>40 дней</option>
                                    <option value="50" @if($order->guarant==50) selected @endif>50 дней</option>
                                    <option value="60" @if($order->guarant==60) selected @endif>60 дней</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Получи в два раза больше предложений</label>
                                <input type="checkbox" name="premium" value="1"> 100 руб.
                            </div>


                            @if($order->id)
                                <button type="submit" class="btn btn-primary btn-block">Обновить</button>
                            @else
                                <button type="submit" class="btn btn-primary btn-block">Разместить в аукционе</button>
                            @endif
                            @if($order->status_id==5)
                                <button type="submit" class="btn btn-danger btn-block" name="delete"
                                        value="{{$order->id}}">Удалить
                                </button>@endif
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>




@endsection
