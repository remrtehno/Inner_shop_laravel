@extends("main.main")



@section('content')

    <div class="page_top_wrap page_top_title page_top_breadcrumbs" style="margin-top: 130px">
        <div class="content_wrap">
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="/" title="Home">Главная</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">новости</span>
            </div>
            <h1 class="page_title">новости</h1>
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



                                            <div class="column-3_4 sc_column_item sc_column_item_2 even span_3 animated fadeInUp normal" style="text-align:none;" data-animation="animated fadeInUp normal">


                                                <section class="lefd">
                                                    <figure  class="sc_image  sc_image_shape_square" style="margin-bottom:2.8571em !important;">
                                                        <img src="{{ $news->getImageBig() }}" alt="" width="100%">
                                                    </figure>
                                                    <h3 class="sc_title sc_title_regular" ><a href="">{{ $news->title }}</a></h3>

                                                    <div class="wpb_text_column wpb_content_element  custom_1432116266774">
                                                        <div class="wpb_wrapper">
                                                            <p>{!!  $news->text  !!} </p>



                                                        </div>
                                                    </div>
                                                </section>




                                            </div>

                                            <div class="column-1_4" style="padding:0;text-align:none;margin-bottom: 20px" data-animation="animated fadeInUp normal">


                                                <div class="sidebar widget_area bg_tint_light sidebar_style_white" role="complementary">


                                                    <aside class="widget widget_recent_posts">
                                                        <h3 class="widget_title">Последние новости</h3>




                                                        @foreach($order as $item)
                                                            <article class="post_item with_thumb">
                                                                <div class="post_thumb">
                                                                    <img class="wp-post-image" width="75" height="75" alt="New Ways Of Industry Grow Observed" src="{{ $item->getImage() }}">
                                                                </div>
                                                                <div class="post_content">
                                                                    <h6 class="post_title">
                                                                        <a href="#" title="New Ways Of Industry Grow Observed">{{ $item->title }}</a>
                                                                    </h6>

                                                                    <div class="post_info">
                                                                        <span class="post_info_item post_info_posted_by">{!! str_limit($item->anonce,50) !!}</span>
                                                                        </a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        @endforeach





                                                    </aside>




                                                    <aside class="widget widget_flickr">
                                                        <h3 class="widget_title">Галерея</h3>


                                                        <div class="flickr_images">
                                                            <style>
                                                                .flickr_badge_image a:before{

                                                                    content: none !important;
                                                                }

                                                            </style>
                                                            @foreach($gallery as $item)

                                                            <div class="flickr_badge_image" id="flickr_badge_image6" >


                                                        <a href="{{ $item->getImageBig() }}" title="" data-fancybox>
                                                            <img src="{{ $item->getImage() }}"  height="75" width="75"></a>
                                                    </div>


                                                        @endforeach
                                                        </div>
                                                    </aside>
                                                    <aside class="widget widget_text">
                                                        <h3 class="widget_title">Мы в соц сетях</h3>

                                                        <div class="textwidget"><p>Follow us not to miss our conferences, mettings and workshops</p>
                                                        </div>
                                                    </aside>
                                                </div>


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
        <!-- </div> class="content_wrap"> -->
    </div>


@endsection

