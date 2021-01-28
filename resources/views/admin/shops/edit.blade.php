@extends("admin.main.main")

@section("content")


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Магазины
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">


            @include('admin.errors')
            <form method="post" action="{{route('shops.update', ['id' => $sl->id])}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавляем Магазин</h3>
                    </div>


                    <div class="bs-example bs-example-tabs">


                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$sl->title}}" name="title">
                                </div>


                                <div class="form-group">
                                    <label>Кому принадлежит магазин</label>
                                    <select class="form-control select2" style="width: 100%;" name="user_id">


                                        @foreach($users as $item)
                                            <option 
                                                value="{{$item->id}}"
                                                @if($item->id == $sl->user_id)
                                                    selected
                                                @endif

                                            >{{$item->name}}</option>

                                        @endforeach

                                    </select>
                                </div>
                               

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Описание</label>
                                    <textarea name="anonce" id="editor" cols="30" rows="10" class="form-control" >{{$sl->anonce}}</textarea>
                                </div>
                            </div>

                          
                        </div>






                    </div>



                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-default">Назад</button>
                        <button class="btn btn-success pull-right" type="submit">Обновить</button>
                    </div>
                    <!-- /.box-footer-->
                </div>

            </form>
            <!-- /.box -->

             <form style="display: inline-block;" action="{{route('shops.destroy',['id'=>$sl->id])}}" method="post">
                                    @csrf

                                    <input type="hidden" name="_method" value="delete">
                                    <button onclick="return confirm('are you sure?')" type="submit" class="delete btn btn-danger">
                                       Удалить магазин <i class="fa fa-remove"></i>
                                    </button>
                                </form>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection