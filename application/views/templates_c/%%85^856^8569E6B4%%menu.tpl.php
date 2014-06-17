<?php /* Smarty version 2.6.18, created on 2014-02-06 20:50:53
         compiled from profile/menu.tpl */ ?>
<ul class="nav nav-pills nav-stacked">
    <li <?php if ($this->_tpl_vars['profileMenuActive'] == 'profile'): ?>class="active"<?php endif; ?>><a href="/profile.html">Личная информация<i class="icon-caret-right pull-right"></i></a></li>
    <li <?php if ($this->_tpl_vars['profileMenuActive'] == 'orders'): ?>class="active"<?php endif; ?>><a href="/profile/orders.html">История заказов<i class="icon-caret-right pull-right"></i></a></li>
    <li <?php if ($this->_tpl_vars['profileMenuActive'] == 'products'): ?>class="active"<?php endif; ?>><a href="/profile/products.html">Мои товары<i class="icon-caret-right pull-right"></i></a></li>
    <li <?php if ($this->_tpl_vars['profileMenuActive'] == 'sales'): ?>class="active"<?php endif; ?>><a href="/profile/sales.html">Мои продажи<i class="icon-caret-right pull-right"></i></a></li>
</ul>