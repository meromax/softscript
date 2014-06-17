<?php /* Smarty version 2.6.18, created on 2012-05-18 02:59:37
         compiled from map/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'map/index.tpl', 17, false),)), $this); ?>
<div class="content">

    <div class="centerpanel">
        <div class="title mB10 fs18 newstitle2">
            <strong>
                Карта сайта
            </strong>
        </div>
        <div class="title mB10 fs13">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'path.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>

        <div class="newstext mB15 fs13 pLeft40"">
            <p style="padding-top:8px; font-weight: bold;"><a href="/">Главная страница</a></p>
            <div class="newstext mB15 fs13 pLeft20">
                <?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
                    <p style="padding-top:8px;">— <a href="/<?php echo $this->_tpl_vars['page']['link']; ?>
/"><?php echo ((is_array($_tmp=$this->_tpl_vars['page']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a></p>
                <?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
        <div class="newstext mB15 fs13 pLeft40"">
            <p style="padding-top:8px; font-weight: bold;"><a href="/catalog/">Каталог</a></p>
            <div class="newstext mB15 fs13 pLeft20">
            <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sec']):
?>
                <p style="padding-top:8px;">— <a href="/catalog/<?php echo $this->_tpl_vars['sec']['link']; ?>
/"><?php echo ((is_array($_tmp=$this->_tpl_vars['sec']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a></p>
            <?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
        <div class="newstext mB15 fs13 pLeft40"">
        <p style="padding-top:8px; font-weight: bold;">Другие полезные ресурсы</p>
            <div class="newstext mB15 fs13 pLeft20">
            <?php $_from = $this->_tpl_vars['pages2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
                <p style="padding-top:8px;">— <a href="/content/<?php echo $this->_tpl_vars['page']['link']; ?>
/"><?php echo ((is_array($_tmp=$this->_tpl_vars['page']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a></p>
            <?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
    </div>

    <div class="rightpanel">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'news/slider.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'banners/show_items.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
</div>
</div>
</div>

</div>
<div class="clear"></div>