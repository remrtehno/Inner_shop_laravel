<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li><a href="{{ route('post.index') }}"><i class="fa fa-tags"></i> <span>Все товары</span></a></li>
    <li><a href="{{ route('shops.index') }}"><i class="fa fa-tags"></i> <span>Входящие Заказы</span></a></li>
    {{--<li><a href="{{ route('income.index') }}"><i class="fa fa-tags"></i> <span>Приход</span></a></li>--}}
    <li><a href="{{ route('orders.index') }}"><i class="fa fa-tags"></i> <span>Все Заказы</span></a></li>
    <li><a href="{{ route('payments-shop.index') }}"><i class="fa fa-tags"></i> <span>Оплата - Магазины</span></a></li>
    <li><a href="{{ route('payments-supplier.index') }}"><i class="fa fa-tags"></i> <span>Оплата - Поставщики</span></a>
    </li>
    <li><a href="{{ route('suppliers.index') }}"><i class="fa fa-tags"></i> <span>Поставщики</span></a></li>
    <li><a href="{{ route('news.index') }}"><i class="fa fa-tags"></i> <span>Пользователи</span></a></li>
    <li><a href="{{ route('samples.index') }}"><i class="fa fa-tags"></i> <span>Образцы</span></a></li>
    <li><a href="{{ route('warehouse.index') }}"><i class="fa fa-tags"></i> <span>Склады</span></a></li>
<!--  <li><a href="{{ route('shops.show', Auth::user()->id ) }}"><i class="fa fa-user"></i> <span>Мой магазин</span></a></li> -->
    <li><a href="{{ route('statisics.index') }}"><i class="fa fa-tags"></i> <span>Статистика</span></a></li>
</ul>