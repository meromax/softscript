<ul class="nav nav-pills nav-stacked">
    <li {if $profileMenuActive=='profile'}class="active"{/if}><a href="/profile.html">Личная информация<i class="icon-caret-right pull-right"></i></a></li>
    <li {if $profileMenuActive=='orders'}class="active"{/if}><a href="/profile/orders.html">История заказов<i class="icon-caret-right pull-right"></i></a></li>
    <li {if $profileMenuActive=='products'}class="active"{/if}><a href="/profile/products.html">Мои товары<i class="icon-caret-right pull-right"></i></a></li>
    <li {if $profileMenuActive=='sales'}class="active"{/if}><a href="/profile/sales.html">Мои продажи<i class="icon-caret-right pull-right"></i></a></li>
</ul>