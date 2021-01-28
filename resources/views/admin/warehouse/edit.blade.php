@extends('admin.main.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить Статью
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        @include('admin.errors')
        <!-- Default box -->

            <form action="{{route('warehouse.update',['id'=>$sl->id])}}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Обновляем Статью</h3>
                    </div>



                    <div class="box-body">
                        <div class="col-md-6">
                            

                                                          <div class="form-group">
                                    <label for="exampleInputEmail1">Имя</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$sl->title}}"
                                    name="title" >
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Телефон</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$sl->phone}}"  
                                    name="phone" >
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Адрес</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$sl->address}}" 
                                    name="address" >
                                </div>


 <div class="form-group">
                                    <label for="exampleInputEmail1">Описание</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$sl->text}}" 
                                    name="text" >
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