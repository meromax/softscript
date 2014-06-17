<ul class="page-sidebar-menu">
    <li>
        <div class="sidebar-toggler hidden-phone"></div>
    </li>
    <li>
        {*<form class="sidebar-search">*}
        {*<div class="input-box">*}
        {*<a href="javascript:;" class="remove"></a>*}
        {*<input type="text" placeholder="Search..." />*}
        {*<input type="button" class="submit" value=" " />*}
        {*</div>*}
        {*</form>*}
        &nbsp;
    </li>
    <li class="start {if $adminLeftMenu=='dashboard'}active{/if}">
        <a href="/admin">
            <i class="icon-dashboard"></i>
            <span class="title">Панель управления</span>
            <span class="selected"></span>
        </a>
    </li>
    <li class="{if $adminLeftMenu=='content'}active{/if}">
        <a href="javascript:void(0);">
            <i class="icon-pencil"></i>
            <span class="title">Контент</span>
            <span class="arrow {if $adminLeftMenu=='content'}open{/if}"></span>
        </a>
        <ul class="sub-menu">
            <li {if $adminLeftMenuSub=='content'}class="active"{/if}><a href="/admin/content">Статические страницы</a></li>
            <li {if $adminLeftMenuSub=='news'}class="active"{/if}><a href="/admin/news/page/1">Новости</a></li>
            <li {if $adminLeftMenuSub=='articles'}class="active"{/if}><a href="/admin/articles/page/1">Статьи</a></li>
            <li {if $adminLeftMenuSub=='articles_sections'}class="active"{/if}><a href="/admin/articles/sections/page/1">Разделы статей</a></li>
        </ul>
    </li>
    {*<li class="{if $adminLeftMenu=='banners'}active{/if}">*}
        {*<a href="/admin/banners/index/page/1">*}
            {*<i class="icon-home"></i>*}
            {*<span class="title">Баннеры</span>*}
            {*<span class="selected"></span>*}
        {*</a>*}
    {*</li>*}
    <li class="{if $adminLeftMenu=='products'}active{/if}">
        <a href="javascript:void(0);">
            <i class="icon-gift"></i>
            <span class="title">Товары</span>
            <span class="arrow {if $adminLeftMenu=='products'}open{/if}"></span>
        </a>
        <ul class="sub-menu">
            <li {if $adminLeftMenuSub=='sections'}class="active"{/if}><a href="/admin/sections/index/page/1">Разделы товаров</a></li>
            <li {if $adminLeftMenuSub=='products'}class="active"{/if}><a href="/admin/products/index/page/1">Список товаров</a></li>
        </ul>
    </li>

    <li class="{if $adminLeftMenu=='deals'}active{/if}">
        <a href="javascript:void(0);">
            <i class="icon-star-empty"></i>
            <span class="title">Акции</span>
            <span class="arrow {if $adminLeftMenu=='deals'}open{/if}"></span>
        </a>
        <ul class="sub-menu">
            <li {if $adminLeftMenuSub=='deals'}class="active"{/if}><a href="/admin/deals/index/page/1">Список акций</a></li>
            <li {if $adminLeftMenuSub=='deals_sections'}class="active"{/if}><a href="/admin/deals/sections/page/1">Разделы</a></li>
            <li {if $adminLeftMenuSub=='deals_cities'}class="active"{/if}><a href="/admin/deals/cities/page/1">Города</a></li>
            <li {if $adminLeftMenuSub=='deals_companies'}class="active"{/if}><a href="/admin/deals/companies/page/1">Компании</a></li>
            <li {if $adminLeftMenuSub=='deals_settings'}class="active"{/if}><a href="/admin/deals/settings">Настройки</a></li>
        </ul>
    </li>


    <li class="{if $adminLeftMenu=='orders'}active{/if}">
        <a href="/admin/orders/index/page/1">
            <i class="icon-money"></i>
            <span class="title">Заказы</span>
            <span class="selected"></span>
        </a>
    </li>
    <li class="{if $adminLeftMenu=='users'}active{/if}">
        <a href="/admin/users/index/page/1">
            <i class="icon-user"></i>
            <span class="title">Пользователи</span>
            <span class="selected"></span>
        </a>
    </li>
    <li class="last {if $adminLeftMenu=='settings'}active{/if}">
        <a href="/admin/settings/page">
            <i class="icon-cogs"></i>
            <span class="title">Настройки</span>
            <span class="selected"></span>
        </a>
    </li>
</ul>