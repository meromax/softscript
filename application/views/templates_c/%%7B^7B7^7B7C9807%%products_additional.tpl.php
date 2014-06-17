<?php /* Smarty version 2.6.18, created on 2014-02-07 17:11:12
         compiled from admin/products/products_additional.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/products/products_additional.tpl', 7, false),)), $this); ?>
<div class="underlined push-down-20">
    <h3><span class="light">Дополнительная</span> информация</h3>
</div>

<p class="push-down-10">
    <label for="author">Вставка видео-кода с youtube.com:</label>
    <textarea tabindex="4" id="video" name="video" rows="10" class="span7 ckeditor" placeholder="Вставьте код видео..."><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['video'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
</p>

<p class="push-down-10">
    <label for="author">Дополнительная информация:</label>
    <textarea tabindex="4" id="addinfo2" name="addinfo2" rows="10" class="span7 ckeditor" placeholder="Вставьте какой-нибудь текст..."><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['addinfo2'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
</p>