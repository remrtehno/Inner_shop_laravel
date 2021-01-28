
 <header id="header" class="header-wrap">
        <div class="container">
            <div class="hdr_bottom_main">
                <div class="hdr_bottom_main_left">
                    <a href="/" class="logo">
                        <i class="fa fa-cubes"></i>
                        <!-- /.fa fa-cubes -->
                    </a>
                    <span class="all_categories_btn" style="visibility: hidden">
               <picture><source srcset="img//category_icon.svg" type="image/webp"><img src="img//category_icon.svg" alt="category_icon" /></picture>
               Все категории
            </span>
                    <form action="/search" class="search_form_header typeahead" method="get">
                        <button type="submit">
                            <picture>
                                <source srcset="/public/assets/img//search.svg" type="image/webp"><img src="/public/assets/img//search.svg" alt="search" />
                            </picture>
                        </button>
                        <input type="text" name="query" id="text" required="" placeholder="Поиск товара" value="" />
                    </form>
                </div>
                <div class="hdr_bottom_main_right">
                                       @guest 
                        <a href="{{ route('login') }}" class="enter_site">
                            <picture>
                                <source srcset="/public/assets/img/user_plus.svg" type="image/webp"><img src="/public/assets/img/user_plus.svg" alt="user_plus" />
                            </picture>
                            <span>Войти</span>
                        </a>
                    @else
                         <div class="dropdown us_drop">
                          <button class="dropbtn">
                            <i class="fas fa-user"></i>
                                Привет, {{ Auth::user()->name }}
                            </button>
                          <div class="dropdown-content">


                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                <i style="font-size: 16px; color: green; vertical-align: middle; margin-right: 10px;" class="fas fa-sign-out-alt"></i>
                                <span>Выйти</span>
                            </a>

                            
                          </div>
                        </div>
                        

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                    <a href="create" class="add_ads">
                        <i class="fas fa-plus"></i>
                        <!-- /.fas fa-times -->
                        Добавить Товар
                    </a>
                </div>
                <div class="toggle-menu-mobile">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>

