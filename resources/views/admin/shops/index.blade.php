@extends("admin.main.main")

@section("content")

    <style>
        .badge {
            background: red;
        }
    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


            <h1>
                Магазины
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="form-group">
                <a href="{{ route('shops.create') }}" class="btn btn-success">Добавить</a>
            </div>
            <div>


                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    @foreach($shops as $key => $item)
                        <li role="presentation" class="{{ $key == 0 ? 'active' : ''}}"><a href="#m-{{$item->id}}"
                                                                                          aria-controls="home"
                                                                                          role="tab"
                                                                                          data-toggle="tab"> {{$item->title}}
                                @if(count($item->ordersWait())) <span
                                        class="badge"> {{count($item->ordersWait())}}</span> @endif
                            </a></li>

                    @endforeach
                    <li role="presentation"><a href="#returned" aria-controls="returned" role="tab" data-toggle="tab">
                            Возвращенные товары
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    @foreach($shops as $key => $item)
                        <div role="tabpanel" class="tab-pane {{ $key == 0 ? 'active' : ''}}" id="m-{{$item->id}}">
                            @if(count($item->orders()))

                                <table class="table table-bordered table-striped DataTable">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>ID заказа</th>
                                        <th>Артикул</th>
                                        <th>Партия</th>
                                        <th>Склад</th>
                                        <th>Цена за шт.</th>
                                        <th>Количество</th>
                                        <th>Общая Цена</th>

                                        <th>Статус</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>


                                    @foreach($item->orders() as $val)
                                        <tr style=" ">
                                            <td>{{$val->created_at }}</td>
                                            <td>{{$val->id }}</td>
                                            <td>{{$val->article}}</td>
                                            <td>{{$val->batch}}</td>
                                            <td>{{$val->sklad}}</td>
                                            <td>{{$val->tovar_price}}</td>
                                            <td>{{$val->qty}}</td>
                                            <td>{{$val->tovar_price * $val->qty}}</td>
                                            <td>{{$val->getStatus()}}</td>


                                            <td>
                                                <a style="float: left;" class="btn btn-success"
                                                   href="{{route('cahngeStatus', ['id' => $val->id])}}">Отпустить
                                                    товар</a>

                                                <button type="submit" class="btn btn-primary return-product">Вернуть
                                                    товар
                                                </button>

                                                <div class="modal-returned" style="display: none; width: 400px;">
                                                    <form action="{{route('returnProduct')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="id" value="{{$val->id}}">
                                                        <textarea class="noEditor" name="is_text" style="width: 100%;"
                                                                  rows="4">{!!$val->is_text!!}</textarea><!-- /# -->
                                                        <br>
                                                        <button type="submit">Сохранить</button>
                                                    </form>
                                                </div>

                                            <!-- <form style="float: left;" action="{{route('cahngeStatus',['id'=>$item->id, 'status' => 'Возврат'])}}" method="post">
                                    @csrf

                                    
                                    <input type="hidden" name="_method" value="put">

                                    
                                </form> -->

                                            <!-- <form style="float: left;" action="{{route('cahngeStatus',['id'=>$item->id, 'status' => 'Нету на складе'])}}" method="post">
                                    @csrf


                                    <button type="submit" class="btn btn-danger">Нету на складе</button>
                                    <input type="hidden" name="_method" value="put">

                                    
                                </form> -->


                                            </td>
                                        </tr>
                                    @endforeach


                                </table>
                            @else
                                <td colspan="5"><h3 align="center">Заказов нету</h3></td>
                            @endif

                            <a class=" btn btn-info" href="{{route('shops.edit',['id'=>$item->id])}}">Редактировать <i
                                        class="fa fa-pencil"></i></a>


                            <hr>


                            <!--   <br>
                              Оплата:   0<br>
                              <select name="" id="">
                                <option value=""></option>
                              </select>
                              <button></button> -->

                            <!--  <span style="background: red;">Остаток:   0<br></span> -->


                            <hr>


                        </div>
                    @endforeach

                    <div role="tabpanel" class="tab-pane" id="returned">
                        <table class="table table-bordered table-striped DataTable">
                            <thead>
                            <tr>
                                <td>Магазин</td>
                                <td>Продукт</td>
                                <td>Примечание</td>
                                <td>Количестов</td>
                                <td>Дата</td>
                                <td>Действия</td>
                            </tr>
                            </thead>

                            @foreach($returned_products as $key => $item)
                                <tr>
                                    <td>{{$item->shop_id}}</td>
                                    <td>{{$item->product_id}}</td>
                                    <td>{{$item->text}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <a style="float: left;" class="btn btn-success"
                                           href="{{route('returnSupplier', ['id' => $item->product_id, 'qty' => $item->qty])}}">Вернуть
                                            поставщику</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>


                </div>

            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <script>


        var int = setInterval(function () {
            window.location.reload();
        }, 20000);


        window.onbeforeunload = function () {
            clearInterval(int);
        }


        window.onload = function () {


            var audioElement = document.createElement('audio');
            audioElement.setAttribute('src', '/assets/exclamation.mp3');
            audioElement.setAttribute('preload', 'auto');

            //audioElement.setAttribute('onended', 'window.location.reload()');


            function playAudio() {
                audioElement.load;
                audioElement.play();
            };

            if (document.querySelector('.nav-tabs .badge')) {

                playAudio();
            }

        };


    </script>
@endsection