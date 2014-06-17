<?php /* Smarty version 2.6.18, created on 2014-02-07 19:55:04
         compiled from admin/sections/categories/items_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/sections/categories/items_list.tpl', 42, false),array('modifier', 'strip_tags', 'admin/sections/categories/items_list.tpl', 43, false),)), $this); ?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Категории товаров
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/sections/index/page/1">Разделы товаров</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/sections/categories/section_id/<?php echo $this->_tpl_vars['section_id']; ?>
/spage/1/page/1">Категории товаров</a>
                </li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">


            <div class="span3">
                <div class="portlet box grey">


                    <div class="portlet-title">
                        <div class="caption"><i class="icon-info"></i>Текущий раздел</div>
                    </div>
                    <div class="portlet-body">
                        <div class="scroller" data-height="300px">
                            <h4><?php echo ((is_array($_tmp=$this->_tpl_vars['section']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h4>
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['section']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                        </div>
                    </div>


                </div>
            </div>



            <div class="span9">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список категорий</div>
                        <div class="actions">
                            <a href="/admin/sections/addcategory/section_id/<?php echo $this->_tpl_vars['section_id']; ?>
/spage/<?php echo $this->_tpl_vars['spage']; ?>
" class="btn blue"><i class="icon-plus"></i> Добавить</a>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th>Заголовок</th>
                                <th class="hidden-480" style="text-align: center;">Позиция</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                <tr>
                                    <td class="span1" style="text-align: center; vertical-align: middle;"><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
                                    <td style="vertical-align: middle;">
                                        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                    </td>
                                    <td class="hidden-480" style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['position'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                    </td>
                                    <td class="span3" style="text-align: center; vertical-align: middle;">
                                        <a href="/admin/sections/modifycategory/id/<?php echo $this->_tpl_vars['item']['id']; ?>
/section_id/<?php echo $this->_tpl_vars['section_id']; ?>
/spage/<?php echo $this->_tpl_vars['spage']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a>
                                        &nbsp;|&nbsp;
                                        <a href="/admin/sections/deletecategory/id/<?php echo $this->_tpl_vars['item']['id']; ?>
/section_id/<?php echo $this->_tpl_vars['section_id']; ?>
/spage/<?php echo $this->_tpl_vars['spage']; ?>
" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
                                    </td>
                                </tr>
                                <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="6" style="text-align: center;">Нет ни одной категории...</td>
                                </tr>
                            <?php endif; unset($_from); ?>
                            </tbody>
                        </table>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/sections/categories/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                    </div>


                </div>
            </div>

        </div>

    </div>

</div>