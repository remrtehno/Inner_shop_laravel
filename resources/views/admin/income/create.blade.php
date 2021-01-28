@extends('admin.main.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить

            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            @include('admin.errors')
            <form method="post" action="{{route('income.store')}}" enctype="multipart/form-data">
                @csrf

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавляем</h3>
                    </div>


                    <div class="bs-example bs-example-tabs">


                        <div class="box-body">
                            <div class="col-md-6">


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
                                    <label for="exampleInputEmail1">Закуп</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                           name="purchase">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Розн. Цена</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                           name="retail_price">
                                </div>


                                <div class="form-group">
                                    <label>Склад</label>
                                    <select class="form-control select2" style="width: 100%;" name="sklad">


                                        @foreach($warehouse as $item)
                                            <option value="{{$item->title}}">{{$item->title}}</option>

                                        @endforeach

                                    </select>
                                </div>



                                <div class="form-group">
                                    <label>Поставщик</label>
                                    <select class="form-control select2" style="width: 100%;" name="supplier">


                                        @foreach($suppliers as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>

                                        @endforeach

                                    </select>
                                </div>


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