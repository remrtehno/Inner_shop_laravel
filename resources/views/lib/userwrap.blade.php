<div class="user_header_wrap">
    <p>
    <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_3 banners_on_top"
         style="margin-top:-7.5em;margin-bottom:0px;">

        @foreach($userwrap as $item)
        <div class="column-1_3 sc_column_item sc_column_item_1 even">
            <div class="banner" style="height:170px;">
                <div class="banner_bg" style="background-image:url({{ $item->getImageHome() }}); opacity: .5"></div>
                <div class="banner_content banner_style_black">
                    <h2 style="color: white; font-weight: bold">{{ $item->title }}</h2>
                   <br>
                    <a href="{{ route('detail',['slug'=>$item->slug]) }}" class="sc_button sc_button_square sc_button_style_style-8 sc_button_bg_custom sc_button_size_medium  sc_button_iconed none">
                        <span class="button-up" style="color: white">подробно</span>
                        <span style="color: white">подробно</span>
                    </a>
                </div>
            </div>
        </div>

        @endforeach
    </div>
    <p></p>
</div>