@extends("main.main")



@section('content')

    <div class="page_top_wrap page_top_title page_top_breadcrumbs" style="margin-top: 130px;margin-bottom: 30px">
        <div class="content_wrap">
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="/" title="Home">Главная</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">О нас</span>
            </div>
            <h1 class="page_title">О нас</h1>
        </div>
    </div>

    <div class="page_content_wrap">

        <div class="content_wrap">
            <div class="content">
                @foreach($about as $item)
                <article
                        class="itemscope post_item post_item_single post_featured_default post_format_standard post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized"
                        itemscope itemtype="http://schema.org/Article">

                    <h3 itemprop="name" class="post_title entry-title" align="center">
                        <span class="post_icon icon-book-2"></span> {{ $item->title }}
                    </h3>



                    <section class="post_content" itemprop="articleBody">
                        <div class="sc_reviews alignright"><!-- #TRX_REVIEWS_PLACEHOLDER# --></div>
                        <p>{!! $item->text !!}</p>



                    </section>
                    <!-- </section> class="post_content" itemprop="articleBody"> -->


                </article>
                @endforeach
                <!-- </article> class="itemscope post_item post_item_single post_featured_default post_format_standard post-709 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized" itemscope itemtype="http://schema.org/Article"> -->
            </div>
        </div>


        <!-- </div> class="content_wrap"> -->
    </div>


@endsection

