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

            <form action="{{route('payments-supplier.update',['id'=>$sl->id])}}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Обновляем Статью</h3>
                    </div>



                    <div class="box-body">
                        <div class="col-md-6">
                            

                               <div class="form-group">
                                    <label>Поставщик</label>
                                    <select class="form-control select2" style="width: 100%;" name="supplier_id">


                                        @foreach($shops as $item)
                                            <option 
                                            value="{{$item->id}}"
                                            {{ $item->id == $sl->shop_id ? 'selected' : '' }}
                                            >{{$item->name}}</option>

                                        @endforeach

                                    </select>
                                </div>
             

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Курс USD</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" onkeyup="this.value = this.value.replace (/[^0-9]+$/, '')" value="{{$sl->dollar_rate }}" name="dollar_rate" >
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">USD $</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" onkeyup="this.value = this.value.replace (/[^0-9]+$/, '')" value="{{$sl->usd }}" name="usd" >
                                </div>


                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Наличные</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" onkeyup="this.value = this.value.replace (/[^0-9]+$/, '')" value="{{$sl->cash }}" name="cash">
                                </div>


                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Терминал</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" onkeyup="this.value = this.value.replace (/[^0-9]+$/, '')"  value="{{$sl->terminal }}"
                                    name="terminal" >
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