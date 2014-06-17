<?php /* Smarty version 2.6.18, created on 2014-02-04 20:17:43
         compiled from admin/news/news_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/news/news_list.tpl', 49, false),)), $this); ?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Новости
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/news/page/1">Новости</a></li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список новостей</div>
                        <div class="actions">
                            <a href="/admin/news/add" class="btn blue"><i class="icon-plus"></i> Добавить</a>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th>Заголовок</th>
                                <th class="hidden-480" style="text-align: center;">Дата</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $_from = $this->_tpl_vars['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                            <tr>
                                <td class="span1" style="text-align: center; vertical-align: middle;"><?php echo $this->_tpl_vars['item']['new_id']; ?>
</td>
                                <td style="vertical-align: middle;">
                                    <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['new_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                </td>
                                <td class="hidden-480" style="text-align: center; max-width: 150px; vertical-align: middle;">
                                    <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['new_date'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                </td>
                                <td class="span3" style="text-align: center; vertical-align: middle;">
                                    <a href="/admin/news/modify/new_id/<?php echo $this->_tpl_vars['item']['new_id']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a> |
                                    <a href="/admin/news/delete/new_id/<?php echo $this->_tpl_vars['item']['new_id']; ?>
" onclick="return confirm(<?php echo $this->_tpl_vars['adminLangParams']['NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN']; ?>
)"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
                                </td>
                            </tr>
                                <?php endforeach; else: ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">Нет ни одной новости...</td>
                            </tr>
                            <?php endif; unset($_from); ?>
                            </tbody>
                        </table>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/news/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                    </div>


                </div>


            </div>

        </div>

    </div>

</div>