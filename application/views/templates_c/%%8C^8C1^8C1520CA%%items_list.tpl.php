<?php /* Smarty version 2.6.18, created on 2014-02-10 11:20:42
         compiled from admin/deals/items_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/deals/items_list.tpl', 47, false),array('modifier', 'strip_tags', 'admin/deals/items_list.tpl', 47, false),)), $this); ?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Акции
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/deals/index/page/1">Список акций</a></li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Фильтр</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="portlet-body" id="gallery">

                        <form action="#" class="form-horizontal" style="margin: 10px 0px 10px 0px;">

                        <div class="control-group" style="padding-top: 0px; margin-bottom: 0px;">
                            <div class="span3">
                                &nbsp;
                            </div>
                            <div class="span3">
                                <label class="control-label">Выберите раздел:</label>
                                <div class="controls">
                                    <select id="section" name="section" class="m-wrap chosen" tabindex="1" onchange="changeSection();">
                                        <option value="0" <?php if ($this->_tpl_vars['curr_section'] == 0): ?>selected="selected"<?php endif; ?>> ----------- </option>
                                        <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sec']):
?>
                                            <option value="<?php echo $this->_tpl_vars['sec']['id']; ?>
" <?php if ($this->_tpl_vars['curr_section'] == $this->_tpl_vars['sec']['id']): ?>selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sec']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
                                        <?php endforeach; endif; unset($_from); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="span3">
                                <label class="control-label">Выберите категорию:</label>
                                <div class="controls">
                                    <select id="category" name="category" class="m-wrap chosen" tabindex="1" onchange="changeCategory();">
                                        <option value="0" <?php if ($this->_tpl_vars['curr_category'] == 0): ?>selected="selected"<?php endif; ?>> ----------- </option>
                                        <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
                                            <option value="<?php echo $this->_tpl_vars['cat']['id']; ?>
" <?php if ($this->_tpl_vars['curr_category'] == $this->_tpl_vars['cat']['id']): ?>selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['cat']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
                                        <?php endforeach; endif; unset($_from); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="span3">
                                &nbsp;
                            </div>
                        </div>
                        </form>


                    </div>


                </div>


            </div>

        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список акций</div>
                        <div class="actions">
                            <a href="/admin/deals/add" class="btn blue"><i class="icon-plus"></i> Добавить</a>
                            <div class="btn-group">
                                <a class="btn green" href="#" data-toggle="dropdown">
                                    <i class="icon-cogs"></i> Инструменты
                                    <i class="icon-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-right" style="width: 250px;">
                                    <li><a href="javascript:void(0);" onclick="customAlertBox('Распечатать');"><i class="icon-print"></i> Распечатать</a></li>
                                    <li><a href="javascript:void(0);" onclick="customAlertBox('Удалить отмеченные');"><i class="icon-trash"></i> Удалить отмеченные</a></li>
                                    <li><a href="javascript:void(0);" onclick="customAlertBox('Экпортировать в Excel');"><i class="icon-sort-by-alphabet"></i> Экпортировать в Excel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body" id="gallery">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th>Картинка</th>
                                <th>Заголовок</th>
                                <th class="hidden-480" style="text-align: center;">Цена</th>
                                <th class="hidden-480" style="text-align: center;">Позиция</th>
                                <th class="hidden-480" style="text-align: center;">Статус</th>
                                <th class="hidden-480" style="text-align: center;">Акция</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                <tr>
                                    <td class="span1" style="text-align: center; vertical-align: middle;"><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
                                    <td class="span1" style="vertical-align: middle;">
                                        <?php if ($this->_tpl_vars['item']['image'] != ''): ?>
                                            <span>
                                                <a href="/images/products/<?php echo $this->_tpl_vars['item']['image']; ?>
_big.jpg?time=<?php echo time(); ?>
" rel="lightbox">
                                                    <img src="/images/products/<?php echo $this->_tpl_vars['item']['image']; ?>
_small.jpg"  width="88" height="62"  style="border:1px solid #b2b2b2;" />
                                                </a>
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                    </td>
                                    <td class="hidden-480 span2" style="text-align: center; vertical-align: middle;">
                                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['price'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                    </td>
                                    <td class="hidden-480 span2" style="text-align: center; vertical-align: middle;">
                                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['position'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                    </td>
                                    <td class="hidden-480 span2" style="text-align: center; vertical-align: middle;">
                                        <?php if ($this->_tpl_vars['item']['active'] == 1): ?>
                                            <a href="javascript:void(0);" onclick="changeRecommend('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
" style="text-decoration: none;"><span style="color:green; font-weight: bold;">Активный</span></a>
                                        <?php else: ?>
                                            <a href="javascript:void(0);" onclick="changeRecommend('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
" style="text-decoration: none;"><span style="color:red; font-weight: bold;">Архив</span></a>
                                        <?php endif; ?>
                                    </td>
                                    <td class="hidden-480 span2" style="text-align: center; vertical-align: middle;">
                                        <?php if ($this->_tpl_vars['item']['action'] == 1): ?>
                                            <a href="javascript:void(0);" onclick="changeAction('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="action_link<?php echo $this->_tpl_vars['item']['id']; ?>
" style="text-decoration: none;"><span style="color:green; font-weight: bold;">Акция</span></a>
                                        <?php else: ?>
                                            <a href="javascript:void(0);" onclick="changeAction('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="action_link<?php echo $this->_tpl_vars['item']['id']; ?>
" style="text-decoration: none;">Продукт</a>
                                        <?php endif; ?>
                                    </td>
                                    <td class="span4" style="text-align: center; vertical-align: middle;">
                                        <a href="/admin/products/modify/id/<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['PRODUCTS__MODIFY']; ?>
</a>
                                        &nbsp;|&nbsp;
                                        <a href="/admin/products/delete/id/<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="return confirm(<?php echo $this->_tpl_vars['adminLangParams']['PRODUCTS__DELETE_PRODUCT']; ?>
)"><?php echo $this->_tpl_vars['adminLangParams']['PRODUCTS__DELETE']; ?>
</a>
                                        &nbsp;|&nbsp;
                                        <a href="/admin/products/reviews/product_id/<?php echo $this->_tpl_vars['item']['id']; ?>
/page/1">Отзывы</a>
                                    </td>
                                </tr>
                                <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="8" style="text-align: center;">Нет ни одной акции...</td>
                                </tr>
                            <?php endif; unset($_from); ?>
                            </tbody>
                        </table>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/products/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                    </div>


                </div>


            </div>

        </div>

    </div>

</div>

<?php echo '
<script type="text/javascript">
//    function changeSection(){
//        document.location.href="/admin/deals/index/section/"+$("#section").val()+"/brand/"+$("#brand").val()+"/page/1";
//    }
    function changeSection(){
        document.location.href="/admin/deals/index/section/"+$("#section").val()+"/category/"+$("#category").val()+"/page/1";
    }

    function changeCategory(){
        document.location.href="/admin/deals/index/section/"+$("#section").val()+"/category/"+$("#category").val()+"/page/1";
    }
    function getCategories(categoryId){
        var sectionId = $("#section").val();
        $.post("/admin/sections/ajax-get-categories", {section_id:sectionId, category_id:categoryId},
                function(data) {
                    if(data!=\'\'){
                        $("#categories_container").html(data);
                    }
                }
        );
    }
    function changeBrand(){
        document.location.href="/admin/deals/index/section/"+$("#section").val()+"/brand/"+$("#brand").val()+"/page/1";
    }

    function changeRecommend(dealId){

        $.post("/admin/deals/change-recommend", {id:dealId},
                function(data) {
                    if(data==1){
                        $("#status_link"+dealId).html(\'<span style="color:green; font-weight: bold;">Активный</span>\');
                    } else {
                        $("#status_link"+dealId).html(\'<span style="color:red; font-weight: bold;">Архив</span>\');
                    }

                }
        );
    }

    function changeAction(dealId){

        $.post("/admin/deals/change-action", {id:dealId},
                function(data) {
                    if(data==1){
                        $("#action_link"+dealId).html(\'<span style="color:green; font-weight: bold;">Акция</span>\');
                    } else {
                        $("#action_link"+dealId).html(\'Продукт\');
                    }

                }
        );
    }

</script>
'; ?>