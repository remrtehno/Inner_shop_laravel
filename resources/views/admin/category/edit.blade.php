@extends('admin.main.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить Категорию
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        @include('admin.errors')
        <!-- Default box -->

            <form action="{{route('category.update',['id'=>$cat->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Обновляем категорию</h3>
                    </div>




                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Имя</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $cat->title }}" name="title">
                            </div>
 <div class="form-group">
                                        <label for="exampleInputFile">Картинка</label>
                                        <input type="file" id="exampleInputFile" name="img">

                                        <p class="help-block">jpeg,png,jpeg</p>
                                        <p class="help-block">размер 65x82</p>
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