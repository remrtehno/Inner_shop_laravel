@extends('admin.main.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить счет

            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            @include('admin.errors')
            <form method="post" action="{{route('suppliers.store')}}" enctype="multipart/form-data">
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
                                    <label for="exampleInputEmail1">Имя</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" 
                                    name="name" >
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Телефон</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" 
                                    name="phone" >
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Адрес</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" 
                                    name="address" >
                                </div>


 <div class="form-group">
                                    <label for="exampleInputEmail1">Описание</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" 
                                    name="text" >
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