<?php /* Smarty version 2.6.18, created on 2014-02-03 14:19:59
         compiled from admin/news/meta.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/news/meta.tpl', 10, false),)), $this); ?>
<div class="portlet box yellow" style="margin-top: 20px;">

    <div class="caption" style="padding: 5px 5px 5px 15px;">META ИНФОРМАЦИЯ</div>

    <div class="portlet-body" style="padding-top: 20px; padding-left: 20px;">

        <div class="control-group">
            <label class="control-label"><?php echo $this->_tpl_vars['adminLangParams']['META_TITLE']; ?>
:</label>
            <div class="controls">
                <input type="text" name="meta_title" id="meta_title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['new']['meta_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="span6 m-wrap" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">МЕТА описание:</label>
            <div class="controls">
                <input type="text" name="meta_description" id="meta_description" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['new']['meta_description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="span6 m-wrap" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">МЕТА ключевые слова:</label>
            <div class="controls">
                <input type="text" name="meta_keywords" id="meta_keywords" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['new']['meta_keywords'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="span6 m-wrap" />
            </div>
        </div>
    </div>
</div>