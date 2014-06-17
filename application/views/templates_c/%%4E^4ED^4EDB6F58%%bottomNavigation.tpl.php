<?php /* Smarty version 2.6.18, created on 2013-12-27 14:39:54
         compiled from bottomNavigation.tpl */ ?>
<ul>
    <li><a href="/about-company.html" <?php if ($this->_tpl_vars['menuActive'] == 'about-company'): ?>class="active"<?php endif; ?>>О компании</a></li>
    <li><a href="/news/page/1" <?php if ($this->_tpl_vars['menuActive'] == 'news'): ?>class="active"<?php endif; ?>>Новости</a></li>
    <li><a href="/catalog/page/1" <?php if ($this->_tpl_vars['menuActive'] == 'production'): ?>class="active"<?php endif; ?>>Продукция</a></li>
    <li><a href="/documentation.html" <?php if ($this->_tpl_vars['menuActive'] == 'documentation'): ?>class="active"<?php endif; ?>>Документы</a></li>
    <li><a href="/wholesalers.html" <?php if ($this->_tpl_vars['menuActive'] == 'wholesalers'): ?>class="active"<?php endif; ?>>Оптовикам</a></li>
    <li><a href="/reviews/page/1" <?php if ($this->_tpl_vars['menuActive'] == 'reviews'): ?>class="active"<?php endif; ?>>Отзывы</a></li>
    <li><a class="last <?php if ($this->_tpl_vars['menuActive'] == 'contacts'): ?>active<?php endif; ?>" href="/contacts.html">Контакты</a></li>
</ul>