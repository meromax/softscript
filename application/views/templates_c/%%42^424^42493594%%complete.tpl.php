<?php /* Smarty version 2.6.18, created on 2012-03-28 07:52:54
         compiled from contact/complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'contact/complete.tpl', 5, false),array('modifier', 'strip_tags', 'contact/complete.tpl', 5, false),array('modifier', 'date_format', 'contact/complete.tpl', 8, false),array('modifier', 'replace', 'contact/complete.tpl', 12, false),)), $this); ?>
<div class="content">
    <div class="centerpanel">
        <div class="title mB10 fs18 newstitle2">
            <strong>
                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

            </strong>
            <br />
            <span style="color: #5d5d5d; font-size: 10px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['new_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y, %M:%S") : smarty_modifier_date_format($_tmp, "%d.%m.%Y, %M:%S")); ?>
</span>
        </div>

        <div class="content_text mB15">
            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['text'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, "&nbsp;", "") : smarty_modifier_replace($_tmp, "&nbsp;", "")); ?>

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
<?php echo '
<script type="text/javascript">
    setTimeout(function () { document.location.href=\'/order-online/\'; }, 5000);
</script>
'; ?>