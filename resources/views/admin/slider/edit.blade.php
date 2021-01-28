@extends('admin.main.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить Новость
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
@include('admin.errors')
            <!-- Default box -->

    <form action="{{route('slider.update',['id'=>$sl->id])}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем баннер</h3>
                </div>




                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Имя</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $sl->title }}" name="title">
                                    </div>

                                    <div class="form-group">
                                        <img src="{{ $sl->getImage() }}" alt="" class="img-responsive" width="200">
                                        <label for="exampleInputFile">Картинка</label>
                                        <input type="file" id="exampleInputFile" name="img">

                                        <p class="help-block">png,jpeg,jpg</p>
                                    </div>


                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Описание</label>
                                        <input name="anonce" id="editor" value="{{ $sl->anonce }}" class="form-control" >
                                    </div>
                                </div>
                            </div>






                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="_method" value="put">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-warning pull-right" type="submit">Изменить</button>
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