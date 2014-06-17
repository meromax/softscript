<?php /* Smarty version 2.6.18, created on 2014-02-06 14:45:58
         compiled from admin/deals/sections/add_modify_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/deals/sections/add_modify_item.tpl', 54, false),)), $this); ?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                <?php if ($this->_tpl_vars['action'] == 'modifysection'): ?>Изменение<?php else: ?>Добавление<?php endif; ?> раздела <small>&nbsp;</small>
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:void(0);">Акции</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/deals/sections/page/1">Разделы</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:void(0);"><?php if ($this->_tpl_vars['action'] == 'modifysection'): ?>Изменение<?php else: ?>Добавление<?php endif; ?> раздела</a>
                </li>
            </ul>
        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid ">
            <div class="span12">
                <!-- BEGIN INLINE TABS PORTLET-->
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><?php if ($this->_tpl_vars['action'] == 'modifysection'): ?><i class="icon-pencil"></i> Изменение<?php else: ?><i class="icon-plus"></i> Добавление<?php endif; ?> раздела</div>
                    </div>
                    <div class="portlet-body form">
                        <div class="row-fluid">
                            <div class="span12">
                                <form method="POST" action="/admin/deals/<?php echo $this->_tpl_vars['action']; ?>
" name="section_form" id="section_form" enctype="multipart/form-data">
                                    <input type="hidden" name="step" value="2">
                                    <?php if ($this->_tpl_vars['item']['id']): ?>
                                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
                                    <?php endif; ?>

                                    <div style="padding-left: 10px; padding-top: 10px;">

                                        <div class="control-group">
                                            <label class="control-label">Заголовок:</label>
                                            <div class="controls">
                                                <input type="text" name="title" id="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="span6 m-wrap" onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Ссылка:</label>
                                            <div class="controls">
                                                <input type="text" name="link" id="link" readonly="readonly" value="<?php echo $this->_tpl_vars['item']['link']; ?>
" class="span6 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Короткое описание:</label>
                                            <div class="controls">
                                                <textarea name="description_short" class="ckeditor"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description_short'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Полное описание:</label>
                                            <div class="controls">
                                                <textarea name="description" class="ckeditor"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Позиция:</label>
                                            <div class="controls">
                                                <input type="text" name="position" id="position" maxlength="3"  value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['position'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="span1 m-wrap" />
                                            </div>
                                        </div>

                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/deals/meta.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                                    </div>
                                    <div class="form-actions" style="padding-left: 20px;">
                                        <button type="button" class="btn blue" <?php if ($this->_tpl_vars['action'] != 'modifysection'): ?> onclick="checkForm('')" <?php else: ?> onclick="checkForm('modify')" <?php endif; ?>><i class="icon-ok"></i> Сохранить</button>
                                        <button type="button" class="btn" onclick="document.location.href='/admin/deals/sections/page/1'"><i class="icon-undo"></i> Отмена</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END INLINE TABS PORTLET-->
            </div>
        </div>

    </div>

</div>

<?php echo '
    <script>
        function checkForm(type){
            if(type==\'\'){
                if ($("#title").val() == \'\') {
                    alert(\'Вы должны заподнить поле заголовок...\');
                } else if ($("#position").val() == \'\') {
                    alert(\'Вы должны заподнить поле позиция...\');
                } else {
                    document.forms.section_form.submit();
                }
            } else {
                if ($("#title").val() == \'\') {
                    alert(\'Вы должны заподнить поле заголовок...\');
                } else if ($("#position").val() == \'\') {
                    alert(\'Вы должны заподнить поле позиция...\');
                } else {
                    document.forms.section_form.submit();
                }
            }


        }
        function setLink(){
            var link = createLinkFromTitle($("#title").val());
            $("#link").val(link);
        }
    </script>
'; ?>