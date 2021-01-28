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
            <form method="post" action="{{route('payments-supplier.store')}}" enctype="multipart/form-data">
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
                                    <label>Поставщик</label>
                                    <select class="form-control select2" style="width: 100%;" name="supplier_id">


                                        @foreach($shops as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>

                                        @endforeach

                                    </select>
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Курс USD</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" onkeyup="this.value = this.value.replace (/[^0-9]+$/, '')" name="dollar_rate" >
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">USD $</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" onkeyup="this.value = this.value.replace (/[^0-9]+$/, '')" name="usd" >
                                </div>


                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Наличные</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" onkeyup="this.value = this.value.replace (/[^0-9]+$/, '')" name="cash">
                                </div>


                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Терминал</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" onkeyup="this.value = this.value.replace (/[^0-9]+$/, '')"
                                    name="terminal" >
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