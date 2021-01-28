@extends("main.main")









@section('content')

<section class="user-cabinet beauty-wrapper">
            <div class="row">
                <div class="small-12 medium-12 columns">
                    <h1 class="title hide-for-small-only hide-for-medium-only hide-for-large-only"> Мой профиль </h1>
                </div>
                <div class="small-12 medium-3 columns">
                    
                    @include('lib.cabinet-menu')

                    
                </div>
                <div class="small-12 medium-9 columns details">
                    <div class="latest-orders cabinet-block">
                        <h4 class="widget-title">Добро пожаловать</h4>
                        <h6>Начало работы</h6>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="footer-bar"> ® copyright 2020. | Разработано в <a href="http://steepcoder.uz/site">steepcoder.uz</a> </div> <!-- /.footer-bar -->
        </footer>


@endsection


@section('footerinput')
    @include("lib.footerinput")
@endsection