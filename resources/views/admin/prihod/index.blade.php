@extends("admin.main.main")

@section("content")


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blank page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг сущности</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('prihod_by_date')}}" method="get">
                        <h4 align="center" style="float: left;">Выберите дату</h4>
                        <button style="float: right;">Показать</button>

                        <input class="datapicker" data-date-format="mm/dd/yyyy" name="to" value="{{ $to }}"
                               placeholder="до" style="float: right;">
                        <input class="datapicker" data-date-format="yyyy-mm-dd " name="from" value="{{ $from }}"
                               placeholder="от" style="float: right;">
                        <div style="clear: both;"></div>
                    </form>



                    <table class="table DataTable table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Дата и время</th>
                            <th>Артикул</th>
                            <th>Партия</th>
                            <th>Количество</th>
                            <th>Закуп Цена</th>
                            <th>Розн Цена</th>
                            <th>Склад</th>
                            <th>Поставщик</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prihod as $item)
                            <tr>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->article}}</td>
                                <td>{{$item->batch}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->buy_price}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->sklad}}</td>
                                <td>{{$item->supplier}}</td>
                                <td>

                                    <a href="{{route('returnSupplier',
                                           ['id' => $item->id, 'qty' => $item->qty ])}}
                                            " class="btn btn-danger">Вернуть</a>

                                </td>
                            </tr>


                        @endforeach
                    </table>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection