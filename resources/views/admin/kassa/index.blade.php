@extends("admin.main.main")

@section("content")


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blank page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг сущности</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">


                    <table class="table "  width="100%" cellpadding="10">
                        <thead>
                            <tr>
                                <td>Поставщик</td>
                                <td>Закуплено</td>
                                <td>Оплачено</td>
                                <td>Остаток</td>
                            </tr>
                        </thead>

                        @foreach($allInfo as $item_all_info)
                            <tr>
                                <td>
                                    {{$item_all_info->supplier}}
                                </td>
                                <td>
                                    {{$item_all_info->total_buy}}
                                </td>
                                <td>
                                    {{$item_all_info->total_usd}}
                                </td>
                                <td>
                                    {{$item_all_info->ostatok}}
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <br>


                    @foreach($sum_qty as $item)
                        <div></div>
                        Общее кол-во товаров: <b>{{$item->cnt }} шт.</b>

                    @endforeach





                        <hr>
                        @foreach($zakup_rozn_price as $item)

                            Закуп цена сумма всех товаров - долг: <b>$ {{$sum_qty[0]->cnt * $item->buy_price }}</b>
                            <hr>
                            Розничная сумма всех товаров: <b>$ {{$sum_qty[0]->cnt * $item->price }}</b>



                        @endforeach

                    <hr>
                    Потенциальная прибыль:
                    <b>$ {{ ($sum_qty[0]->cnt * $item->price) - ($sum_qty[0]->cnt * $item->buy_price) }}</b>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection