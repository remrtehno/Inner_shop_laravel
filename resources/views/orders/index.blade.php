@extends("main.main")









@section('content')

    <section class="user-cabinet beauty-wrapper">
        <div class="row">
            <div class="small-12 medium-12 columns">
                <h1 class="title hide-for-small-only hide-for-medium-only hide-for-large-only"> Мой профиль </h1>
            </div>
            <div class="small-12 medium-3 columns">

                @include('lib.cabinet-menu')


            </div>
            <div class="small-12 medium-9 columns details">
                <div class="latest-orders cabinet-block">
                    <h4 class="widget-title">Заказы</h4>
                    <div class="score_main">
                        <table class="score table">
                            <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Артикул</th>
                                <th>Партия</th>
                                <th>Количество</th>
                                <th>Розничная Цена</th>
                                <th>Статус</th>
                                <th>Комментарий</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            @if($orders->count() > 0)
                                @foreach($orders as $item)

                                    <tr>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->article}}</td>
                                        <td>{{$item->batch}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->tovar_price}}</td>
                                        <td>{{$item->getStatus()}}</td>
                                        <td>{{$item->is_text}}</td>
                                        <td>
                                            <a class="btn btn-danger"
                                               onclick="this.nextElementSibling
                                               ? this.nextElementSibling.classList.toggle('d-block')
                                               : null"
                                            >Возврат</a>
                                            <form style="display: none;"
                                                  action="{{route('return-order', ['id' => $item->id])}}" method="get">
                                                <input style="margin: 0; margin-top: 10px;" type="number"
                                                       onkeyup="this.value <= {{$item->qty}}
                                                               ? this.value = this.value
                                                               : this.value = {{$item->qty}} " name="qty" value="1">
                                                <small>Максимум {{$item->qty}}</small>
                                                <button class="btn btn-danger">Вернуть</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach


                        </table>
                        @else
                            Пусто
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-bar"> ® copyright 2020. | Разработано в <a href="http://steepcoder.uz/site">steepcoder.uz</a>
        </div> <!-- /.footer-bar -->
    </footer>


@endsection


@section('footerinput')
    @include("lib.footerinput")
@endsection