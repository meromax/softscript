<?php /* Smarty version 2.6.18, created on 2014-02-07 16:33:52
         compiled from admin/content/add_modify_page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/content/add_modify_page.tpl', 53, false),)), $this); ?>
<div class="container-fluid">

<div class="row-fluid">
    <div class="span12">

        <h3 class="page-title">
            Статические страницы <small>&nbsp;</small>
        </h3>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="/admin">Главная</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="/admin/content">Статические страницы </a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="javascript:void(0);"><?php if ($this->_tpl_vars['action'] == 'modifypage'): ?><?php echo $this->_tpl_vars['adminLangParams']['STATICPAGES_MODIFY_STATIC_PAGE']; ?>
<?php else: ?><?php echo $this->_tpl_vars['adminLangParams']['STATICPAGES_ADD_STATIC_PAGE']; ?>
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
                    <div class="caption"><?php if ($this->_tpl_vars['action'] == 'modifypage'): ?><i class="icon-pencil"></i> <?php echo $this->_tpl_vars['adminLangParams']['STATICPAGES_MODIFY_STATIC_PAGE']; ?>
<?php else: ?><i class="icon-plus"></i> <?php echo $this->_tpl_vars['adminLangParams']['STATICPAGES_ADD_STATIC_PAGE']; ?>
<?php endif; ?></div>
                </div>
                <div class="portlet-body form">
                    <div class="row-fluid">
                        <div class="span12">
                            <form method="POST" action="/admin/content/<?php echo $this->_tpl_vars['action']; ?>
" name="pages_form" enctype="multipart/form-data">
                                <input type="hidden" name="step" value="2">

                                <?php if ($this->_tpl_vars['page']['page_id']): ?>
                                    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['page']['page_id']; ?>
">
                                <?php endif; ?>

                                <div style="padding-left: 10px; padding-top: 10px;">

                                    <div class="control-group">
                                        <label class="control-label">Заголовок:</label>
                                        <div class="controls">
                                            <?php if ($this->_tpl_vars['page']['type'] == 0): ?>
                                                <input type="text" name="title" id="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['page']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="span6 m-wrap" onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();" />
                                            <?php else: ?>
                                                <input type="text" name="title" id="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['page']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="span6 m-wrap" />
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Ссылка:</label>
                                        <div class="controls">
                                            <input type="text" name="link" id="link" readonly="readonly" value="<?php echo $this->_tpl_vars['page']['link']; ?>
" class="span6 m-wrap" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Короткое описание:</label>
                                        <div class="controls">
                                            <textarea name="description_short" class="ckeditor"><?php echo ((is_array($_tmp=$this->_tpl_vars['page']['description_short'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Полное описание:</label>
                                        <div class="controls">
                                            <textarea name="text" class="ckeditor"><?php echo ((is_array($_tmp=$this->_tpl_vars['page']['text'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                                        </div>
                                    </div>

                                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/content/meta.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                                </div>
                                <div class="form-actions" style="padding-left: 20px;">
                                    <button type="button" class="btn blue" onclick="<?php if ($this->_tpl_vars['action'] == 'modifypage'): ?>checkForm('<?php echo $this->_tpl_vars['page']['page_id']; ?>
');<?php else: ?>checkForm(0);<?php endif; ?>"><i class="icon-ok"></i> Сохранить</button>
                                    <button type="button" class="btn" onclick="document.location.href='/admin/content'"><i class="icon-undo"></i> Отмена</button>
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
	
	function checkForm(modify_id){

		var title = document.getElementById(\'title\');
		var link  = document.getElementById(\'link\');

		if ($("#title").val() == \'\') {
            customAlertBox("Вы должны заполнить поле Заголовок");
		} else {
			if(modify_id){
				var url = "page_link="+$("#link").val()+"&modify_id="+modify_id;
			} else {
				var url = "page_link="+$("#link").val();
			}
            customLoaderBox(\'Проверка данных...\');
			$.ajax({
			type: "POST",
			url: "/admin/content/checkexistpagelink",
			data: url,
			success: function(msg){
				if(msg==1){
					setTimeout(function() { 
						   $("#progress").hide();
					    }, 2000);
                    customAlertBox("Такая ссылка уже существует.");
				} else {
                    customLoaderBoxSetMessage(\'Идет сохранение данных...\');
					document.forms.pages_form.submit();
				}
			}
			});
		}
	}
</script>
'; ?>