<?php /* Smarty version 2.6.18, created on 2014-04-03 13:10:26
         compiled from topNavigation.tpl */ ?>
<ul class="nav" id="mainNavigation">
    <li <?php if ($this->_tpl_vars['menuActive'] == 'index'): ?>class="active"<?php endif; ?>><a href="/">Главная</a></li>
    <li <?php if ($this->_tpl_vars['menuActive'] == 'catalog'): ?>class="active"<?php endif; ?>><a href="/catalog.html">Каталог</a></li>
    <li <?php if ($this->_tpl_vars['menuActive'] == 'products'): ?>class="active"<?php endif; ?>><a href="/products/page/1">Каталог</a></li>
        <li <?php if ($this->_tpl_vars['menuActive'] == 'articles'): ?>class="active"<?php endif; ?>><a href="/articles/page/1">Статьи</a></li>
    <li <?php if ($this->_tpl_vars['menuActive'] == 'feedback'): ?>class="active"<?php endif; ?>><a href="/feedback.html">Контакты</a></li>

</ul>