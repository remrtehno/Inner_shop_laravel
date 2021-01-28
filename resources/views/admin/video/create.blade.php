@extends('admin.main.main')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить Видео

            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            @include('admin.errors')
<form method="post" action="{{route('video.store')}}">
    @csrf
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем галерею</h3>
                </div>


                <div class="bs-example bs-example-tabs">


                            <div class="box-body">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Фрагмент для видео</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="link">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Для показа видео</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="showlink">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Название</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title">
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