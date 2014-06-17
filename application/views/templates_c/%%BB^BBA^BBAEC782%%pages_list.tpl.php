<?php /* Smarty version 2.6.18, created on 2014-02-07 15:52:48
         compiled from admin/content/pages_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/content/pages_list.tpl', 61, false),array('modifier', 'strip_tags', 'admin/content/pages_list.tpl', 61, false),)), $this); ?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Статические страницы
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/content">Статические страницы</a></li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список страниц</div>
                        <div class="actions">
                            <a href="/admin/content/addpage" class="btn blue"><i class="icon-plus"></i> Добавить</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th>Заголовок</th>
                                <th class="hidden-480">Ссылка</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pkey'] => $this->_tpl_vars['page']):
?>
                                <tr>
                                    <td class="span1" style="text-align: center;"><?php echo $this->_tpl_vars['pkey']+1; ?>
</td>
                                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['page']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
                                    <td class="hidden-480">
                                        <?php echo $this->_tpl_vars['page']['link']; ?>

                                    </td>
                                    <td class="span3" style="text-align: center;">
                                        <a href="/admin/content/modifypage/id/<?php echo $this->_tpl_vars['page']['page_id']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a>
                                        <?php if ($this->_tpl_vars['page']['type'] == 0): ?>
                                            &nbsp;|&nbsp;
                                            <a href="javascript:void(0);"  onclick="customConfirmBox('Вы уверены, что хотите удалить эту запись?','/admin/content/delete/id/<?php echo $this->_tpl_vars['page']['page_id']; ?>
');">Удалить</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="4" style="text-align: center;">Нет ни одной страницы...</td>
                                </tr>
                            <?php endif; unset($_from); ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>

    </div>

</div>