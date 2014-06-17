<?php /* Smarty version 2.6.18, created on 2014-02-07 17:11:12
         compiled from admin/products/products_meta.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/products/products_meta.tpl', 7, false),)), $this); ?>
<div class="underlined push-down-20">
    <h3><span class="light">Информация, которая необходима для</span> поисковисков</h3>
</div>

<p class="push-down-10">
    <label for="author">МЕТА заколовок:</label>
    <input type="text" id="meta_title" name="meta_title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['meta_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="span6 m-wrap" placeholder="Введите МЕТА название вашего товара здесь...">
</p>

<p class="push-down-10">
    <label for="author">МЕТА ключевые слова:</label>
    <input type="text" id="meta_keywords" name="meta_keywords" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['meta_keywords'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="span6 m-wrap" placeholder="Введите МЕТА ключевые слова вашего товара здесь...">
</p>

<p class="push-down-10">
    <label for="author">МЕТА описание:</label>
    <input type="text" id="meta_description" name="meta_description" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['meta_description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="span6 m-wrap" placeholder="Введите МЕТА описание вашего товара здесь...">
</p>