<?php /* Smarty version 2.6.18, created on 2012-03-31 19:22:23
         compiled from search/show_items.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'search/show_items.tpl', 29, false),array('modifier', 'strip_tags', 'search/show_items.tpl', 29, false),)), $this); ?>
<div class="content">

    <div class="centerpanel">
        <div class="title mB10 fs18">
            <strong>Поиск по каталогу</strong>
        </div>
        <div class="title mB10 fs13">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'path.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>

        <div>
        <?php if ($this->_tpl_vars['products']): ?>
            <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#8A8F95">
                <tbody>
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="middle" class="catalog" width="250">
                        Изображение
                    </td>
                    <td bgcolor="#ffffff" align="left" valign="middle" class="catalog" style="padding:3px 3px 3px 5px;">
                        DIN
                    </td>
                    <td bgcolor="#ffffff" align="left" valign="middle" class="catalog" style="padding:3px 3px 3px 5px; ">
                        Название
                    </td>
                </tr>
                    <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['prod']):
?>
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="middle" class="catalog" width="250">
                            <a href="/catalog/<?php echo $this->_tpl_vars['prod']['section_link']; ?>
/<?php echo $this->_tpl_vars['prod']['link']; ?>
/"><img src="/images/products/<?php echo $this->_tpl_vars['prod']['image']; ?>
_small.jpg" border="0" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
"></a>
                        </td>
                        <td bgcolor="#ffffff" align="left" valign="middle" class="catalog" style="padding:3px 3px 3px 5px;">
                            <a href="/catalog/<?php echo $this->_tpl_vars['prod']['section_link']; ?>
/<?php echo $this->_tpl_vars['prod']['link']; ?>
/"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['din'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
                        </td>
                        <td bgcolor="#ffffff" align="left" valign="middle" class="catalog" style="padding:3px 3px 3px 5px; ">
                            <a href="/catalog/<?php echo $this->_tpl_vars['prod']['section_link']; ?>
/<?php echo $this->_tpl_vars['prod']['link']; ?>
/"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
        <?php endif; ?>
            <div class="mTop20 fs13" style="padding-left: 3px;">
            <?php if ($this->_tpl_vars['search_result'] == 0): ?>
                Ничего не найдено...
            <?php endif; ?>
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