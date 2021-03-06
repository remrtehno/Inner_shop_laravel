@extends('admin.main.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить продукт

            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            @include('admin.errors')
            <form method="post" action="{{route('prihod.store')}}" enctype="multipart/form-data">
                @csrf

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавляем продукт</h3>
                    </div>


                    <div class="bs-example bs-example-tabs">


                        <div class="box-body">
                            <div class="col-md-6">



                                <div class="form-group">
                                    <label for="exampleInputEmail1">Дата и время</label>
                                    <input class="datapicker" data-date-format="yyyy-mm-dd"
                                           name="created_at">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Артикул</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                           name="article">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Партия</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                           name="batch">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Количество</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                           name="qty">
                                </div>


                                <div class="form-group">
                                    <label>Склад</label>
                                    <select class="form-control select2" style="width: 100%;" name="sklad">
                                        @foreach($warehouse as $item)
                                            <option value="{{$item->title}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input name="shop_id" type="hidden" value="-1">

                                <div class="form-group">
                                    <label>Поставщик</label>
                                    <select class="form-control select2" style="width: 100%;" name="supplier">
                                        @foreach($suppliers as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Закупочная Цена</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                           name="zakup_price">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Розничная Цена</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                           name="rozn_price">
                                </div>









                            <!--  <div class="form-group">
                                    <label for="exampleInputEmail1">Название</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Артикл</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="article">
                                </div>

                                <div class="form-group">
                                    <label>Магазин</label>
                                    <select class="form-control select2" style="width: 100%;" name="shop_id">


                                        @foreach($shops as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>

                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Пользователь</label>
                                    <select class="form-control select2" style="width: 100%;" name="user_id">


                                        @foreach($users as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>

                                        @endforeach

                                    </select>
                                </div>
 -->


                            </div>




                        </div>


                    </div>


                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-default">Назад</button>
                        <button class="btn btn-success pull-right" type="submit">Добавить</button>
                    </div>
                    <!-- /.box-footer-->
                </div>

            </form>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection