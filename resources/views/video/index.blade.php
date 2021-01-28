@extends("main.main")



@section('content')

    <div class="page_top_wrap page_top_title page_top_breadcrumbs" style="margin-top: 130px">
        <div class="content_wrap">
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="/" title="Home">Главная</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">видеоблог</span>
            </div>
            <h1 class="page_title">Видеоблог</h1>
        </div>
    </div>

    <div class="page_content_wrap">

        <div class="content_wrap">
            <div class="content">

                <!-- Галерея-->
                <div class="vc_row wpb_row vc_row-fluid">
                    <div class="vc_col-sm-12 wpb_column vc_column_container ">
                        <div class="wpb_wrapper">
                            <a name="ourprojects" id="ourprojects" class="sc_anchor" title="Projects" data-description="Our projects"
                               data-icon="icon-picture-1" data-url="" data-separator="no"></a>

                            <div class="sc_section bg_tint_none" data-animation="animated fadeInUp normal"
                                 style="margin-top:6em !important;margin-bottom:5.5em !important;">
                                <div class="sc_content content_wrap">
                                    <h2 class="sc_title sc_title_regular sc_align_center bottom_border" style="text-align:center;">Видеоблог</h2>


                                    <div class="sc_content content_wrap" style="margin-top:6em !important;margin-bottom:5em !important;">



                                        <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_4">

                                            @foreach($video as $item)
                                                <div class="column-1_4 sc_column_item sc_column_item_1 odd first" style="text-align:none;">


                                                    <div class="post_featured">
                                                        <div class="post_thumb">
                                                            <a class="hover_icon hover_icon_link" href="{{ $item->showlink }}" data-fancybox />


                                                            {!! $item->link !!}


                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>

                                            @endforeach

                                        </div>



                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Галерея-->
            </div>
            <!-- </div> class="content"> -->
        </div>
        <!-- </div> class="content_wrap"> -->
    </div>


@endsection

