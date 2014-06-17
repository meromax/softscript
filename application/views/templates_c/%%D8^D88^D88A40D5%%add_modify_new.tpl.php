<?php /* Smarty version 2.6.18, created on 2014-02-03 13:36:14
         compiled from admin/news/add_modify_new.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/news/add_modify_new.tpl', 50, false),)), $this); ?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Новости <small>&nbsp;</small>
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/news/page/1">Новости </a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:void(0);"><?php if ($this->_tpl_vars['action'] == 'modify'): ?><?php echo $this->_tpl_vars['adminLangParams']['NEWS_MODIFY_NEW']; ?>
<?php else: ?><?php echo $this->_tpl_vars['adminLangParams']['NEWS_ADD_NEW']; ?>
<?php endif; ?></a>
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
                        <div class="caption"><?php if ($this->_tpl_vars['action'] == 'modify'): ?><i class="icon-pencil"></i> <?php echo $this->_tpl_vars['adminLangParams']['NEWS_MODIFY_NEW']; ?>
<?php else: ?><i class="icon-plus"></i> <?php echo $this->_tpl_vars['adminLangParams']['NEWS_ADD_NEW']; ?>
<?php endif; ?></div>
                    </div>
                    <div class="portlet-body form">
                        <div class="row-fluid">
                            <div class="span12">
                                <form method="POST" action="/admin/news/<?php echo $this->_tpl_vars['action']; ?>
" name="news_form" enctype="multipart/form-data">
                                    <input type="hidden" name="step" value="2">
                                    <?php if ($this->_tpl_vars['new']['new_id']): ?>
                                        <input type="hidden" name="new_id" value="<?php echo $this->_tpl_vars['new']['new_id']; ?>
">
                                    <?php endif; ?>

                                    <div style="padding-left: 10px; padding-top: 10px;">

                                        <div class="control-group">
                                            <label class="control-label">Заголовок:</label>
                                            <div class="controls">
                                                <input type="text" name="title" id="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['new']['new_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="span6 m-wrap" onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Ссылка:</label>
                                            <div class="controls">
                                                <input type="text" name="link" id="link" readonly="readonly" value="<?php echo $this->_tpl_vars['new']['link']; ?>
" class="span6 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Короткое описание:</label>
                                            <div class="controls">
                                                <textarea name="description_short" class="ckeditor"><?php echo ((is_array($_tmp=$this->_tpl_vars['new']['new_description_short'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Полное описание:</label>
                                            <div class="controls">
                                                <textarea name="description" class="ckeditor"><?php echo ((is_array($_tmp=$this->_tpl_vars['new']['new_description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                                            </div>
                                        </div>

                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/news/meta.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                                    </div>
                                    <div class="form-actions" style="padding-left: 20px;">
                                        <button type="button" class="btn blue" <?php if ($this->_tpl_vars['action'] != 'modify'): ?> onclick="checkForm('')" <?php else: ?> onclick="checkForm('modify')" <?php endif; ?>><i class="icon-ok"></i> Сохранить</button>
                                        <button type="button" class="btn" onclick="document.location.href='/admin/news/page/1'"><i class="icon-undo"></i> Отмена</button>
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

        function setLink(){
            var link = createLinkFromTitle($("#title").val());
            $("#link").val(link+\'.html\');
        }

        function checkForm(type){
            var title    = document.getElementById(\'title\').value;
            //var ChekStr = document.getElementById(\'upload_id\').value;


            if(type==\'\'){
                if (title == \'\') {
                    alert(\'You must fill the title field.\');
                } else {
                    document.forms.news_form.submit();
                }
            } else {
                if (title == \'\') {
                    alert(\'You must fill the title field.\');
                } else {
                    document.forms.news_form.submit();
                }
            }
        }

    </script>
'; ?>