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
                                <td><form action="{{route('post.destroy',['id'])}}" method="post">
                                        @csrf

                                        <input type="hidden" name="_method" value="delete">
                                        <button onclick="return confirm('are you sure?')" type="submit"
                                                class="delete btn btn-danger"
                                                style="float: left;border: 0;background: none; color: #0d6aad">
                                            Возврат
                                        </button>
                                    </form></td>
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