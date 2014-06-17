<?php /* Smarty version 2.6.18, created on 2014-02-04 19:22:58
         compiled from profile/products/products_recommended_box.tpl */ ?>
<div class="underlined push-down-20">
    <h3><span class="light">Рекомендуемые или похожие</span> товары</h3>
</div>

<div class="accordion-group accordion-style-2 active" style="margin-top: 0px;">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="javascript:void(0);">
            <span class="bg-for-icon"><i class="icon-list"></i></span>
            Список выбранных товаров&nbsp;&nbsp;<span id="rLoader">&nbsp;</span>
        </a>
    </div>
    <div id="collapseOne" class="accordion-body in collapse" style="height: auto;">
        <div class="accordion-inner" id="recommendedSelectedContainer">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'profile/products/products_recommended_selected.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>
</div>

<div class="accordion-group accordion-style-2 active" style="margin-top: 0px;">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="javascript:void(0);">
            <span class="bg-for-icon"><i class="icon-search"></i></span>
            Начните вводить название товара и появится список, если такое название существует:<br />
            <div style="padding: 10px 0px 0px 0px;">
                <input type="text" class="span8" name="product_search" id="product_search" autocomplete="off" onkeyup="searchRecommendedProducts();" />
            </div>
        </a>
    </div>
    <div id="collapseOne" class="accordion-body in collapse" style="height: auto;">
        <div class="accordion-inner" id="recommendedContainer">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'profile/products/products_recommended.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>
</div>