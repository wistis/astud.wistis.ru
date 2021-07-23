<div class="left">
    <h4>Поиск</h4>
    <div class="search">
        <form class="form-horizontal" method="get" action="">
            <fieldset>
                <div class="m-t-10">
                    <input type="hidden" name="page" value="1">
                    <input name="name" value="{{request('name')}}" class="form-control" placeholder="Тема работы"
                           type="text">

                </div>
                <div class="m-t-10">
                    <select class="custom-select" name="type_id">
                        <option value="">Тип работы</option>
                        @foreach(\App\Type::get() as $type)
                            <option value="{{$type->id}}"
                                    @if(request('type_id')==$type->id)selected @endif>{{$type->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="m-t-10">
                    <select class="custom-select" name="theme_id">
                        <option value="">Предмет</option>
                        @foreach(\App\ThemeCatagory::get() as $theme)
                            <optgroup label="{{$theme->name}}"></optgroup>
                            @foreach($theme->getthemes as $item)
                                <option value="{{$item->id}}" @if(request('theme_id')==$item->id)selected @endif
                                >{{$item->name}}</option>
                            @endforeach
                        @endforeach
                    </select>

                </div>
                <div class="m-t-10">
                    <label>Количество страниц</label>
                    <input type="number" name="amount_page[]"
                           @if(request()->has('amount_page')) value="{{request('amount_page')[0]}}"
                           @endif class="form-control" placeholder="От">
                    <input type="number" name="amount_page[]"
                           @if(request()->has('amount_page')) value="{{request('amount_page')[1]}}"
                           @endif  class="form-control m-t-10" placeholder="До">


                </div>
                <div class="m-t-10">
                    @php
                        $price=explode(',',request('price'));

                    @endphp
                    <label>Цена:</label>
                    @if(request()->has('price'))
                        от <b class="pr_1">{{$price[0]}} р</b> до <b class="pr_2">{{$price[1]}} р</b>
                    @else от <b class="pr_1">0 р</b> до <b class="pr_2">{{$max}} р</b>@endif
                    <input id="ex2" type="text"
                           name="price" class="span2"
                           value="" data-slider-min="0"
                           data-slider-max="{{$max}}"
                           data-slider-step="5"
                           @if(request()->has('price'))
                           @php
                               $price=explode(',',request('price'));

                           @endphp
                           data-slider-value="[{{$price[0]}},{{$price[1]}}]"
                           @else   data-slider-value="[0,{{$max}}]"
                            @endif
                    />


                </div>
                <div class="m-t-10">
                    <button type="submit" class="btn-info">Найти</button>
                    <a href="/{{request()->route()->getName()}}" type="reset" class="btn-info">Очистить</a>
                </div>

            </fieldset>
        </form>
    </div>
</div>

