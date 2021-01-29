@extends("admin.main.main")

@section("content")

    <style>
        .badge {
            background: red;
        }
    </style>
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

            <div>


                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    @foreach($shops as $key => $item)
                        <li role="presentation" class="{{ $key == 0 ? 'active' : ''}}"><a href="#m-{{$item->id}}"
                                                                                          aria-controls="home"
                                                                                          role="tab"
                                                                                          data-toggle="tab"> {{$item->title}}

                            </a></li>

                    @endforeach
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">

                    <div class="box" style="padding: 20px 20px; padding-bottom: 10px; margin: 0; margin-top: 15px;">


                        <form action="{{route('statisics.index')}}" method="get">
                            @csrf
                            <input type="hidden" name="to" value="" placeholder="до" style="float: right;">
                            <input type="hidden" name="from" value="">

                            <button style="float: right;">Сбросить фильтр</button>


                        </form>


                        <form action="{{route('statisics.index')}}" method="get">
                            @csrf
                            <h4 align="center" style="float: left;">Выберите дату</h4>
                            <button style="float: right;">Показать</button>

                            <input class="datapicker" data-date-format="mm/dd/yyyy" name="to" value="{{ $to }}"
                                   placeholder="до" style="float: right;">
                            <input class="datapicker" data-date-format="yyyy-mm-dd " name="from" value="{{ $from }}"
                                   placeholder="от" style="float: right;">
                            <div style="clear: both;"></div>
                        </form>

                    </div>

                    @foreach($shops as $key => $item)
                        <div role="tabpanel" class="tab-pane {{ $key == 0 ? 'active' : ''}}" id="m-{{$item->id}}">
                            <br>
                            <p></p>
                            <table class="table" style="padding-top: 20px">
                                <thead>
                                <tr>
                                    <th>Склад</th>
                                    <th>Количество</th>
                                    <th>Закупочная Цена</th>
                                    <th>Розничная цена</th>
                                    <th>Прибыль</th>
                                </tr>
                                </thead>
                                @if(count($item->statistics_warehouse()))
                                    <?php $sum = 0; $cnt = 0; $buy_sum = 0; ?>
                                    @foreach($item->statistics_warehouse() as $val)
                                        <?php $sum += $val->sum; $cnt += $val->cnt; $buy_sum += $val->buySum ?>
                                        <tr>
                                            <td>{!! $val->sklad !!}</td>
                                            <td>{!! $val->cnt !!}</td>
                                            <td>{!! $val->sum ? $val->sum : 0 !!}$</td>
                                            <td>{!! $val->buySum ? $val->buySum : 0 !!}$</td>
                                            <td>{!! ($val->sum ? $val->sum : 0) - ($val->buySum ? $val->buySum : 0) !!}$</td>
                                        </tr>
                                    @endforeach
                                    <tr style="font-weight: bold;">
                                        <td>Всего</td>
                                        <td>{{$cnt}}</td>
                                        <td>{{$sum }}$</td>
                                    </tr>
                                @endif
                            </table>

                            @if(count($item->statistics($from, $to)))
                                <br>


                                <div class="clearfix"></div>


                                <div class="box">


                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Дата</th>
                                            <th>Количество</th>
                                            <th>Цена</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach( $item->statisticsByDate($from, $to) as $val)
                                            <tr>
                                                <td>
                                                    <b> @if($from || $to)
                                                            {{ $from ? 'от' : '' }} {{$from}} {{ $to ? 'до' : '' }} {{ $to }}
                                                        @else
                                                            За сегодня
                                                        @endif
                                                    </b>
                                                </td>
                                                <td>
                                                    {{ $val->cnt }}
                                                </td>
                                                <td>
                                                    {{ $val->price ? $val->price : '0' }} сум
                                                </td>
                                            </tr>
                                        @endforeach

                                        @foreach( $item->statistics() as $val)
                                            <tr>
                                                <td>
                                                    <b> Общее за все время</b>
                                                </td>
                                                <td>
                                                    {{ $val->cnt }}
                                                </td>
                                                <td>
                                                    {{ $val->price ? $val->price : '0' }} сум
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- /.box -->




                            @else
                                <td colspan="5"><h3 align="center">Пусто</h3></td>
                            @endif

                        </div>

                    @endforeach


                </div>

            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection