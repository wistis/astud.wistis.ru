@extends('app')

@section('content')
    <div class="eventview">
        <div class="container">
            <div class="row">
                @include('home.sitebar')
                <div class="col-sm-9 col-xs-12 login" style="margin-top: 0px">
                    <form method="POST" @if($order->id)  action="/home/works/{{$order->id}}"
                          @else action="/home/works" @endif enctype="multipart/form-data">
                        @if($order->id)@method('PUT')   @endif
                        <h5>Продать работу</h5>
                        <hr>

                        @csrf
                        <div class="row sort">
                            <div class="form-group col-md-12">
                                <label>Название работы</label>
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ $order->name ?? old('name') }}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
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
                            <div class="form-group col-md-4">
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
                            <div class="form-group col-md-4">
                                <label>Год написания*</label>
                                <select name="year" class="custom-select" @error('year') is-invalid
                                        @enderror required>
                                    <option value="">Год</option>
                                    @for($i=2021;$i>1990;$i--)


                                        <option value="{{$i}}" @if($order->year ==$i)selected @endif >{{$i}}</option>

                                    @endfor
                                </select>


                                @error('year')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label>Количество страниц </label>
                                <input id="amount_page" type="text" class="form-control"
                                       name="amount_page" value="{{$order->amount_page }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Цена</label>
                                <input id="price" type="price" class="form-control @error('price') is-invalid @enderror"
                                       name="price" value="{{$order->price }}" required>
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>
                        <div class="row sort">
                            <div class="form-group col-md-12">
                                <label>Файл работы </label>
                                <input type="file" name="file" required class="form-control @error('price') is-invalid @enderror">

                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>


                        <div class="row sort">
                            <div class="form-group col-md-12">
                                <label>Описание работы</label>
                                <p>Опишите в двух предложениях идею и содержание вашей работы, а так же дату, место
                                    защиты работы и полученную оценку.</p>
                                <textarea name="description" class="form-control" @error('description') is-invalid
                                          @enderror required
                                          style="min-height: 200px">{{$order->description}}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group col-md-12">
                                <label>Содержание</label>
                                <p>  Скопируйте содержание или фрагмент из главы работы. На основании этих данных пользователь сможет оценить, подходит ли она ему.</p>
                                <textarea name="content" class="form-control" @error('content') is-invalid
                                          @enderror required
                                          style="min-height: 200px">{{$order->content}}</textarea>

                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group col-md-12">
                                <label>Введение</label>
                                <p>  Скопируйте один-два абзаца из введения в работе.</p>
                                <textarea name="intro" class="form-control" @error('intro') is-invalid
                                          @enderror required
                                          style="min-height: 200px">{{$order->intro}}</textarea>

                                @error('intro')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label>Список литературы</label>
                                <p>   Опишите список используемой литературы при подготовке работы</p>
                                <textarea name="biblio" class="form-control" @error('biblio') is-invalid
                                          @enderror required
                                          style="min-height: 200px">{{$order->biblio}}</textarea>

                                @error('biblio')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label><input type="checkbox" name="im_author" value="1"> Работа написана мной самостоятельно </label>

                            </div>


                            @if($order->id)
                                <button type="submit" class="btn btn-primary btn-block">Обновить</button>
                            @else
                                <button type="submit" class="btn btn-primary btn-block">Разместить</button>
                            @endif
                            @if($order->status_id==5)
                                <button type="submit" class="btn btn-danger btn-block" name="delete"
                                        value="{{$order->id}}">Удалить
                                </button>@endif
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




                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>




@endsection
