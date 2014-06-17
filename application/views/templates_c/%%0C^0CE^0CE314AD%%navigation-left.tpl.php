<?php /* Smarty version 2.6.18, created on 2014-02-25 11:45:05
         compiled from admin/navigation-left.tpl */ ?>
<ul class="page-sidebar-menu">
    <li>
        <div class="sidebar-toggler hidden-phone"></div>
    </li>
    <li>
                                                                &nbsp;
    </li>
    <li class="start <?php if ($this->_tpl_vars['adminLeftMenu'] == 'dashboard'): ?>active<?php endif; ?>">
        <a href="/admin">
            <i class="icon-dashboard"></i>
            <span class="title">Панель управления</span>
            <span class="selected"></span>
        </a>
    </li>
    <li class="<?php if ($this->_tpl_vars['adminLeftMenu'] == 'content'): ?>active<?php endif; ?>">
        <a href="javascript:void(0);">
            <i class="icon-pencil"></i>
            <span class="title">Контент</span>
            <span class="arrow <?php if ($this->_tpl_vars['adminLeftMenu'] == 'content'): ?>open<?php endif; ?>"></span>
        </a>
        <ul class="sub-menu">
            <li <?php if ($this->_tpl_vars['adminLeftMenuSub'] == 'content'): ?>class="active"<?php endif; ?>><a href="/admin/content">Статические страницы</a></li>
            <li <?php if ($this->_tpl_vars['adminLeftMenuSub'] == 'news'): ?>class="active"<?php endif; ?>><a href="/admin/news/page/1">Новости</a></li>
            <li <?php if ($this->_tpl_vars['adminLeftMenuSub'] == 'articles'): ?>class="active"<?php endif; ?>><a href="/admin/articles/page/1">Статьи</a></li>
            <li <?php if ($this->_tpl_vars['adminLeftMenuSub'] == 'articles_sections'): ?>class="active"<?php endif; ?>><a href="/admin/articles/sections/page/1">Разделы статей</a></li>
        </ul>
    </li>
                                                                <li class="<?php if ($this->_tpl_vars['adminLeftMenu'] == 'products'): ?>active<?php endif; ?>">
        <a href="javascript:void(0);">
            <i class="icon-gift"></i>
            <span class="title">Товары</span>
            <span class="arrow <?php if ($this->_tpl_vars['adminLeftMenu'] == 'products'): ?>open<?php endif; ?>"></span>
        </a>
        <ul class="sub-menu">
            <li <?php if ($this->_tpl_vars['adminLeftMenuSub'] == 'sections'): ?>class="active"<?php endif; ?>><a href="/admin/sections/index/page/1">Разделы товаров</a></li>
            <li <?php if ($this->_tpl_vars['adminLeftMenuSub'] == 'products'): ?>class="active"<?php endif; ?>><a href="/admin/products/index/page/1">Список товаров</a></li>
        </ul>
    </li>

    <li class="<?php if ($this->_tpl_vars['adminLeftMenu'] == 'deals'): ?>active<?php endif; ?>">
        <a href="javascript:void(0);">
            <i class="icon-star-empty"></i>
            <span class="title">Акции</span>
            <span class="arrow <?php if ($this->_tpl_vars['adminLeftMenu'] == 'deals'): ?>open<?php endif; ?>"></span>
        </a>
        <ul class="sub-menu">
            <li <?php if ($this->_tpl_vars['adminLeftMenuSub'] == 'deals'): ?>class="active"<?php endif; ?>><a href="/admin/deals/index/page/1">Список акций</a></li>
            <li <?php if ($this->_tpl_vars['adminLeftMenuSub'] == 'deals_sections'): ?>class="active"<?php endif; ?>><a href="/admin/deals/sections/page/1">Разделы</a></li>
            <li <?php if ($this->_tpl_vars['adminLeftMenuSub'] == 'deals_cities'): ?>class="active"<?php endif; ?>><a href="/admin/deals/cities/page/1">Города</a></li>
            <li <?php if ($this->_tpl_vars['adminLeftMenuSub'] == 'deals_companies'): ?>class="active"<?php endif; ?>><a href="/admin/deals/companies/page/1">Компании</a></li>
            <li <?php if ($this->_tpl_vars['adminLeftMenuSub'] == 'deals_settings'): ?>class="active"<?php endif; ?>><a href="/admin/deals/settings">Настройки</a></li>
        </ul>
    </li>


    <li class="<?php if ($this->_tpl_vars['adminLeftMenu'] == 'orders'): ?>active<?php endif; ?>">
        <a href="/admin/orders/index/page/1">
            <i class="icon-money"></i>
            <span class="title">Заказы</span>
            <span class="selected"></span>
        </a>
    </li>
    <li class="<?php if ($this->_tpl_vars['adminLeftMenu'] == 'users'): ?>active<?php endif; ?>">
        <a href="/admin/users/index/page/1">
            <i class="icon-user"></i>
            <span class="title">Пользователи</span>
            <span class="selected"></span>
        </a>
    </li>
    <li class="last <?php if ($this->_tpl_vars['adminLeftMenu'] == 'settings'): ?>active<?php endif; ?>">
        <a href="/admin/settings/page">
            <i class="icon-cogs"></i>
            <span class="title">Настройки</span>
            <span class="selected"></span>
        </a>
    </li>
</ul>