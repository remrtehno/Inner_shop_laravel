@extends('admin.main.main')

@section('content')


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



                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>Email</th>
                            <th>Адрес</th>
                            <th>Телефон</th>



                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($about as $item)
                            <tr>
                                <td>{!! $item->email !!}  </td>
                                <td>{!! $item->address !!}  </td>
                                <td>{!! $item->phone !!} </td>




                                <td><a href="{{ route('contact.edit',['id'=>$item->id]) }}" class="fa fa-pencil" style="float: left;"></a>


                                </td>
                            </tr>

                        @endforeach

                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection