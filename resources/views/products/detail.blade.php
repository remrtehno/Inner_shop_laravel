@extends("main.main")



@section('content')

    <main>
        <section class="product-details-page" style="padding-top: 100px;">

            <div>
                <div class="section-product-details beauty-wrapper">
                    <div class="row">
                        <div class="small-12 medium-5 columns">
                            <div class="image-container">
                                <div class="product-image-carousel">
                                    <div class="slick-slider">
                                        <div class="image">

                                            <img src="{{ $product->getImageHome() }}" width="400" height="400" alt="">
                                        </div><!-- /.image 400x400 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 medium-7 columns">
                            <div class="product-detail animated fadeInUp normal"
                                 data-animation="animated fadeInUp normal">
                                <h2 class="title"> {{ $product->article }}
                                    <div class="share-box"><a class="share-link-button"><i
                                                    class="link-share fa fa-share-square-o"></i></a>

                                    </div>
                                </h2>
                                <p>В наличии {{ $product->qty ? $product->qty : '0' }} </p>
                                <div class="product__price">
                                    @if($product->label)
                                        <div style="display: inline-block; background: red; font-size: 16px; color: white; padding: 5px 10px;
                                              "> Скидка {{$product->label}} %
                                        </div>
                                    @endif
                                    <p></p>
                                    <strong>
                                        {{ $product->price }} <span>сум.</span>
                                    </strong> <span class="small__text">за<!-- --> 1<!-- -->шт </span></div>

                                <div class="row">
                                    <div class="small-12 medium-12 columns main-buttons">
                                        <div class="clearfix">
                                            <div class="add-cart horizontal cart-41908                              wide-box not-added">
                                                <a href="{{ route('add', [ 'id' => $product->id ]) }}">
                                                    <!-- The button for adding the product to the cart -->
                                                    <button @if(!$product->qty) disabled
                                                            @endif class="button expanded add-to-cart"><span
                                                                class="gl-shopping-cart"></span> <!-- -->Заказать
                                                    </button>
                                                </a>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row hide-for-small-only" style="overflow-x:hidden">
                                    <div class="small-12 medium-12 xlarge-12 columns"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>





@endsection

