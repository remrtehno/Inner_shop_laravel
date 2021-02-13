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

            <form action="{{route('post.update',['id'=>$sl->id])}}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Обновляем Статью</h3>
                    </div>


                    <div class="box-body">
                        <div class="col-md-6">


                            <div class="form-group">
                                <label for="exampleInputEmail1">Артикул</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                       name="article" value="{{ $sl->article }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Партия</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                       name="batch" value="{{ $sl->batch }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Количество</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                       name="qty" value="{{ $sl->qty }}">
                            </div>


                            <div class="form-group">
                                <label>Склад</label>
                                <select class="form-control select2" style="width: 100%;" name="sklad">


                                    @foreach($warehouse as $item)
                                        <option
                                                @if($sl->sklad == $item->title)
                                                selected
                                                @endif
                                                value="{{$item->title}}">{{$item->title}}</option>

                                    @endforeach

                                </select>
                            </div>


                            <div class="form-group">
                                <label>Поставщик</label>
                                <select class="form-control select2" style="width: 100%;" name="supplier">


                                    @foreach($suppliers as $item)
                                        <option
                                                @if($sl->supplier == $item->name)
                                                selected
                                                @endif


                                                value="{{$item->name}}">{{$item->name}}</option>

                                    @endforeach

                                </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Закупочная Цена</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                       name="buy_price" value="{{ $sl->buy_price ? $sl->buy_price : $sl->buy_price }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Розничная Цена</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                       name="price" value="{{ $sl->price ? $sl->price : $sl->price }}">
                            </div>

                            <div class="form-group" style="display:none;">
                                <label for="exampleInputEmail1">Скидка</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                       name="label" value="{{ $sl->label}}">
                            </div>

                            <div class="form-group" style="display: none;" >
                                <label>
                                    <input type="checkbox" checked name="is_sample" value="1">
                                    Образец
                                </label>
                            </div>



                            <div class="form-group">
                                <img src="{{ $sl->getImage() }}" alt="" class="img-responsive" width="200">
                                <label for="exampleInputFile">Картинка</label>
                                <input type="file" id="exampleInputFile" name="img">

                                <p class="help-block">png,jpeg,jpg размер 400x266</p>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Описание</label>
                                <textarea name="anonce" id="editor" cols="30" rows="10"
                                          class="form-control">{{ $sl->anonce }}</textarea>
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