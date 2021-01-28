@extends("main.main")



@section('content')

    <div class="page_top_wrap page_top_title page_top_breadcrumbs" style="margin-top: 130px">
        <div class="content_wrap">
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="/" title="Home">Главная</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">продукция</span>
            </div>
            <h1 class="page_title">продукция</h1>
        </div>
    </div>

    <div class="page_content_wrap">

        <div class="content_wrap">
            <div class="content">
                <article class="itemscope post_item post_item_single post_featured_default post_format_standard post-584 page type-page status-publish hentry" itemscope="" itemtype="http://schema.org/Article">
                    <section class="post_content" itemprop="articleBody">
                        <div class="sc_reviews alignright"><!-- #TRX_REVIEWS_PLACEHOLDER# --></div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="vc_col-sm-12 wpb_column vc_column_container ">
                                <div class="wpb_wrapper">
                                    <div class="sc_section bg_tint_none" style="margin-top:1em !important; ">
                                        <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_4 depart_col">
                                            <div class="column-1_4" style="text-align:none;margin-bottom: 20px" data-animation="animated fadeInUp normal">

                                               @foreach($cat as $item)

                                                <a href="{{ route('category',['slug'=>$item->slug]) }}" class="sc_button sc_button_square sc_button_style_style-7 sc_button_bg_custom sc_button_size_medium  sc_button_iconed inherit" style="margin-top:3px;">
                                                    <span class="button-up">{{ $item->title }}</span>
                                                    <span>{{ $item->title }}</span>
                                                </a>

                                                @endforeach
                                            </div>


                                            <div class="column-3_4 sc_column_item sc_column_item_2 even span_3 animated fadeInUp normal" style="text-align:none;" data-animation="animated fadeInUp normal">

                                                @foreach($products as $item)
                                                <section class="lefd">
                                                <figure class="sc_image  sc_image_shape_square" style="margin-bottom:2.8571em !important;">
                                                    <img src="{{ $item->getImage() }}" alt="">
                                                </figure>
                                                    <h3 class="sc_title sc_title_regular" ><a href="{{ route('detail',['slug'=>$item->slug]) }}">{{ $item->title }}</a></h3>

                                                <div class="wpb_text_column wpb_content_element  custom_1432116266774">
                                                    <div class="wpb_wrapper">
                                                        <p><p>{!! str_limit($item->anonce,350) !!}  </p></p>


                                                        <a href="{{ route('detail',['slug'=>$item->slug]) }}" class="sc_button sc_button_square sc_button_style_button-2 sc_button_bg_link sc_button_size_medium add_link" style="margin-right:15px; ">
                                                            <span class="button-up">подробно</span>
                                                            <span>подробно</span>
                                                        </a>
                                                    </div>
                                                </div>
                                          </section>
                                                @endforeach



                                            </div>


                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- </section> class="post_content" itemprop="articleBody"> -->
                </article>
                <!-- </article> class="itemscope post_item post_item_single post_featured_default post_format_standard post-584 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article"> -->
                <section class="related_wrap related_wrap_empty"></section>

            </div>
            <!-- </div> class="content"> -->
        </div>
        <!-- </div> class="content_wrap"> -->
    </div>


@endsection

