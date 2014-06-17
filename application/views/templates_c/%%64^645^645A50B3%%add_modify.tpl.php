<?php /* Smarty version 2.6.18, created on 2014-02-06 21:49:27
         compiled from admin/articles/add_modify.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/articles/add_modify.tpl', 52, false),array('modifier', 'strip_tags', 'admin/articles/add_modify.tpl', 52, false),)), $this); ?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Статьи <small>&nbsp;</small>
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/articles/page/1">Статьи</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:void(0);"><?php if ($this->_tpl_vars['action'] == 'modify'): ?>Изменение<?php else: ?>Добавление<?php endif; ?> статьи</a>
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
                        <div class="caption"><?php if ($this->_tpl_vars['action'] == 'modify'): ?><i class="icon-pencil"></i> Изменение<?php else: ?><i class="icon-plus"></i> Добавление<?php endif; ?> статьи</div>
                    </div>
                    <div class="portlet-body form">
                        <div class="row-fluid">
                            <div class="span12">
                                <form method="POST" action="/admin/articles/<?php echo $this->_tpl_vars['action']; ?>
" name="article_form" id="article_form" enctype="multipart/form-data">
                                    <input type="hidden" name="step" value="2">
                                    <?php if ($this->_tpl_vars['item']['id']): ?>
                                        <input type="hidden" name="article_id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
                                    <?php endif; ?>

                                    <div style="padding-left: 10px; padding-top: 10px;">


                                        <p class="push-down-10">
                                            <label for="author">Выберите раздел<span class="red-clr bold">*</span>:</label>
                                            <select id="section" name="section" class="span2 m-wrap" onchange="getCategories('<?php echo $this->_tpl_vars['item']['category_id']; ?>
');">
                                                <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sec']):
?>
                                                    <option value="<?php echo $this->_tpl_vars['sec']['id']; ?>
" <?php if ($this->_tpl_vars['sec']['id'] == $this->_tpl_vars['item']['section_id']): ?>selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sec']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                            <input type="hidden" name="category" value="0" />
                                        </p>

                                        <p class="push-down-10">
                                            <label for="author">Укажите категорию:</label>
                                            <span id="categories_container">
                                                <!-- here will categories list -->
                                            </span>
                                        </p>

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

                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/articles/meta.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                                    </div>
                                    <div class="form-actions" style="padding-left: 20px;">
                                        <button type="button" class="btn blue" <?php if ($this->_tpl_vars['action'] != 'modify'): ?> onclick="checkForm('')" <?php else: ?> onclick="checkForm('modify')" <?php endif; ?>><i class="icon-ok"></i> Сохранить</button>
                                        <button type="button" class="btn" onclick="document.location.href='/admin/articles/page/1'"><i class="icon-undo"></i> Отмена</button>
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


<script>
    <?php echo '
    function setLink(){
        var link = createLinkFromTitle($("#title").val());
        $("#link").val(link+\'.html\');
    }

    function checkForm(type){
        if(type==\'\'){
            if ($("#section").val() == 0) {
                alert(\'Вы должны указать раздел.\');
            } else if ($("#title").val() == \'\') {
                alert(\'Заполните поле "Заголовок"\');
            } else {
                $("#article_form").submit();
            }
        } else {
            if ($("#section").val() == 0) {
                alert(\'Вы должны указать раздел.\');
            } else if ($("#title").val() == \'\') {
                alert(\'Заполните поле "Заголовок"\');
            } else {
                $("#article_form").submit();
            }
        }
    }

    function getCategories(categoryId){
        var sectionId = $("#section").val();
        $("#categories_container").html("<img src=\'/images/loading.gif\'>");
        $.post("/admin/articles/ajax-get-categories", {section_id:sectionId, category_id:categoryId},
                function(data) {
                    if(data!=\'\'){
                        $("#categories_container").html(data);
                    }
                }
        );
    }
    '; ?>

    getCategories(<?php echo $this->_tpl_vars['item']['category_id']; ?>
);
</script>