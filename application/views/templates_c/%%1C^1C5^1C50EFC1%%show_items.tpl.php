<?php /* Smarty version 2.6.18, created on 2013-06-30 02:13:06
         compiled from banners/show_items.tpl */ ?>
<div class="banners mTop20">
    <div class="banner" <?php if ($this->_tpl_vars['rightBannersMenu'] != 'plus'): ?> onmouseover="changeImage(3, 1);" onmouseout="changeImage(3, 0);" <?php endif; ?>>
        <a href="/plus/">
            <?php if ($this->_tpl_vars['rightBannersMenu'] != 'plus'): ?>
                <img id="b3" src="/images/banners/3.png" alt="" border="0" />
            <?php else: ?>
                <img id="b3" src="/images/banners/3_pushed.png" alt="" border="0" />
            <?php endif; ?>
        </a>
    </div>
    <div class="banner" onmouseover="changeImage(4, 1);" onmouseout="changeImage(4, 0);">
        <a href="/getfile1.html">
            <img id="b4" src="/images/banners/4.png" alt="" border="0" />
        </a>
    </div>
    <div class="clear"></div>
    <div class="banner_title" <?php if ($this->_tpl_vars['rightBannersMenu'] != 'plus'): ?> onmouseover="changeImage(3, 1);" onmouseout="changeImage(3, 0);" <?php endif; ?>>
        <a href="/plus/">
            Готовые предложения
        </a>
    </div>
    <div class="banner_title" onmouseover="changeImage(4, 1);" onmouseout="changeImage(4, 0);">
        <a href="/getfile1.html">
            Каталог нержаве-
            ющего крепежа
        </a>
    </div>



    <div class="banner" onmouseover="changeImage(5, 1);" onmouseout="changeImage(5, 0);">
        <a href="/getfile2.html">
            <img id="b5" src="/images/banners/5.png" alt="" border="0" />
        </a>
    </div>
    <div class="banner" <?php if ($this->_tpl_vars['rightBannersMenu'] != 'advantages'): ?> onmouseover="changeImage(2, 1);" onmouseout="changeImage(2, 0);" <?php endif; ?>>
        <a href="/advantages/">
            <?php if ($this->_tpl_vars['rightBannersMenu'] != 'advantages'): ?>
                <img id="b2" src="/images/banners/2.png" alt="" border="0" />
            <?php else: ?>
                <img id="b2" src="/images/banners/2_pushed.png" alt="" border="0" />
            <?php endif; ?>
        </a>
    </div>
    <div class="clear"></div>
    <div class="banner_title"  onmouseover="changeImage(5, 1);" onmouseout="changeImage(5, 0);">
        <a href="/getfile2.html">
            Каталог такелажа
        </a>
    </div>
    <div class="banner_title" <?php if ($this->_tpl_vars['rightBannersMenu'] != 'advantages'): ?> onmouseover="changeImage(2, 1);" onmouseout="changeImage(2, 0);" <?php endif; ?>>
        <a href="/advantages/">
            Преимужества работы
        </a>
    </div>



    <div class="banner" <?php if ($this->_tpl_vars['rightBannersMenu'] != 'reviews'): ?> onmouseover="changeImage(6, 1);" onmouseout="changeImage(6, 0);" <?php endif; ?>>
        <a href="/reviews/">
            <?php if ($this->_tpl_vars['rightBannersMenu'] != 'reviews'): ?>
                <img id="b6" src="/images/banners/6.png" alt="" border="0" />
            <?php else: ?>
                <img id="b6" src="/images/banners/6_pushed.png" alt="" border="0" />
            <?php endif; ?>
        </a>
    </div>
    <div class="banner" <?php if ($this->_tpl_vars['rightBannersMenu'] != 'payment'): ?> onmouseover="changeImage(1, 1);" onmouseout="changeImage(1, 0);" <?php endif; ?>>
        <a href="/payment/">
            <?php if ($this->_tpl_vars['rightBannersMenu'] != 'payment'): ?>
                <img id="b1" src="/images/banners/1.png" alt="" border="0" />
            <?php else: ?>
                <img id="b1" src="/images/banners/1_pushed.png" alt="" border="0" />
            <?php endif; ?>
        </a>
    </div>
    <div class="clear"></div>
    <div class="banner_title" <?php if ($this->_tpl_vars['rightBannersMenu'] != 'reviews'): ?> onmouseover="changeImage(6, 1);" onmouseout="changeImage(6, 0);" <?php endif; ?>>
        <a href="/reviews/">
            Вопросы и предложения
        </a>
    </div>
    <div class="banner_title" <?php if ($this->_tpl_vars['rightBannersMenu'] != 'payment'): ?> onmouseover="changeImage(1, 1);" onmouseout="changeImage(1, 0);" <?php endif; ?>>
        <a href="/payment/">
            Доставка и оплата
        </a>
    </div>
</div>
<?php echo '
<script type="text/javascript">
    function changeImage(id, type){
        if(type){
            $("#b"+id).attr(\'src\',\'/images/banners/\'+id+\'__selected.png\');
        } else {
            $("#b"+id).attr(\'src\',\'/images/banners/\'+id+\'.png\');
        }
    }
</script>
        
'; ?>
