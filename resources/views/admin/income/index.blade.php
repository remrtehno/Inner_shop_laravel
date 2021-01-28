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
                    <div class="form-group">
                        <a href="{{ route('income.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Дата и время</th>
                            <th>Артикул</th>
                            <th>Партия</th>
                            <th>Количество</th>
                            <th>Закупочная Цена</th>
                            <th>Розничная Цена</th>
                            <th>Склад</th>
                            <th>Поставщик</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($prod as $item)
                            <tr>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->article }}</td>
                                <td>{{ $item->batch }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->buy_price }}</td>

                                <td>
                                    {{ $item->price }}
                                </td>
                                <td>
                                    {{ $item->sklad }}

                                </td>

                                <td>
                                    {{ $item->supplier }}
                                </td>


                                <td>

                                    <button type="submit" class="btn btn-danger return-product">Вернуть
                                        товар
                                    </button>

                                    <div class="modal-returned" style="display: none; width: 400px;">
                                        <form action="#" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="POST">
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            кол-во <input type="number" name="qty" value="0">
                                            <div></div>
                                            причина
                                            <textarea class="noEditor" name="is_text" style="width: 100%;"
                                                      rows="4">{!!$item->is_text!!}</textarea><!-- /# -->
                                            <br>
                                            <button type="submit">Сохранить</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            </tr>
                        @endforeach


                        </tbody>
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