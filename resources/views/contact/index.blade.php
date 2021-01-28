@extends("main.main")



@section('content')

    <div class="page_top_wrap page_top_title page_top_breadcrumbs" style="margin-top: 130px">
        <div class="content_wrap">
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="/" title="Home">Главная</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">контакты</span>
            </div>
            <h1 class="page_title">Контакты</h1>
        </div>
    </div>

    <div class="page_content_wrap">


        <div class="content_wrap">
            <div class="content">
                <article
                        class="itemscope post_item post_item_single post_featured_default post_format_standard post-355 page type-page status-publish hentry"
                        itemscope itemtype="http://schema.org/Article">
                    <section class="post_content" itemprop="articleBody">
                        <div class="sc_reviews alignright"><!-- #TRX_REVIEWS_PLACEHOLDER# --></div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="vc_col-sm-12 wpb_column vc_column_container ">
                                <div class="wpb_wrapper">
                                    <div class="sc_section bg_tint_none" data-animation="animated fadeInUp normal"
                                         style="margin-bottom:4em !important; ">

                                        @foreach($contact as $item)
                                        <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_3 contact_col"
                                             style="margin-top:50px;">
                                            <div class="column-1_3 sc_column_item sc_column_item_1 odd first"
                                                 style="text-align:center;">
                                            <span class="sc_icon icon-mail_open sc_icon_shape_none sc_icon_bg_custom link_color"
                                                  style="font-size:6em; line-height: 1.2em;"></span>

                                                <div class="sc_section bg_tint_none aligncenter"
                                                     style="margin-top:2em !important; ">
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <p>{!! $item->email !!} </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-1_3 sc_column_item sc_column_item_2 even"
                                                 style="text-align:center;">
                                            <span class="sc_icon icon-tablet-1 sc_icon_shape_none sc_icon_bg_custom link_color"
                                                  style="font-size:6em; line-height: 1.2em;"></span>

                                                <div class="sc_section bg_tint_none aligncenter"
                                                     style="margin-top:2em !important;">
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <p>{!! $item->phone !!} </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-1_3 sc_column_item sc_column_item_3 odd"
                                                 style="text-align:center;">
                                            <span class="sc_icon icon-location sc_icon_shape_none sc_icon_bg_custom link_color"
                                                  style="font-size:6em; line-height: 1.2em;"></span>

                                                <div class="sc_section bg_tint_none aligncenter"
                                                     style="margin-top:2em !important; ">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <p>{!! $item->address !!} </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- </section> class="post_content" itemprop="articleBody"> -->
                </article>
                <!-- </article> class="itemscope post_item post_item_single post_featured_default post_format_standard post-355 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article"> -->
                <section class="related_wrap related_wrap_empty"></section>

            </div>
            <!-- </div> class="content"> -->
        </div>
        <!-- </div> class="content_wrap"> -->
    </div>


    <div  style="width:100%;height:400px;"></div>
@endsection

