@extends('admin.main.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить Контакты
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
@include('admin.errors')
            <!-- Default box -->

    <form action="{{route('contact.update',['id'=>$sl->id])}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем контакты</h3>
                </div>




                            <div class="box-body">


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">email</label>
                                        <textarea name="email" id="editor" cols="30" rows="10" class="form-control" >{{ $sl->email }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Адресс</label>
                                        <textarea name="address" id="editor" cols="30" rows="10" class="form-control" >{{ $sl->address }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Телефоны</label>
                                        <textarea name="phone" id="editor" cols="30" rows="10" class="form-control" >{{ $sl->phone }}</textarea>
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