<?php /* Smarty version 2.6.18, created on 2013-05-27 06:35:07
         compiled from error_page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'error_page.tpl', 18, false),array('modifier', 'strip_tags', 'error_page.tpl', 18, false),)), $this); ?>
<div class="redGrayLine">
    <table cellpaddong="0" cellspacing="0" width="100%" height="38">
        <tr>
            <td class="redLine">&nbsp;</td>
            <td class="middleLine"></td>
            <td class="grayLine">&nbsp;</td>
        </tr>
    </table>
</div>
<div class="redGrayLine2">
    <div class="redLine">
        <div class="pageTitle3">страница не существует...</div>
    </div>
    <div class="grayLine"></div>
</div>

<div class="topTextBlock">
    <div class="pageTitle"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['content']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</div>
    <div class="pageText" style="text-align: center; padding-top: 40px;">
        <img src="/images/system/404.png" />
    </div>
</div>