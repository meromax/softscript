<?php /* Smarty version 2.6.18, created on 2014-01-28 20:17:33
         compiled from admin/banners/items.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'admin/banners/items.tpl', 59, false),array('modifier', 'stripslashes', 'admin/banners/items.tpl', 59, false),)), $this); ?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Баннеры
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/banners/index/page/1">Баннеры</a></li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список баннеров</div>
                        <div class="actions">
                            <a href="/admin/banners/addbanner" class="btn red"><i class="icon-plus"></i> Добавить</a>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th class="span1">Картинка</th>
                                <th>Заголовок</th>
                                <th class="hidden-480" style="text-align: center; max-width: 100px;">Ссылка</th>
                                <th class="hidden-480" style="text-align: center;">Позиция</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $_from = $this->_tpl_vars['banners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bkey'] => $this->_tpl_vars['item']):
?>
                            <tr>
                                <td class="span1" style="text-align: center;"><?php echo $this->_tpl_vars['bkey']+1; ?>
</td>
                                <td style="vertical-align: middle;">
                                    <?php if ($this->_tpl_vars['item']['image'] != ""): ?>
                                        <?php if ($this->_tpl_vars['item']['type'] == 0): ?>
                                            <a href="/images/banners/<?php echo $this->_tpl_vars['item']['image']; ?>
_big.jpg" rel="prettyPhoto[mixed]"><img align="center" src="/images/banners/<?php echo $this->_tpl_vars['item']['image']; ?>
_small.jpg?time=<?php echo time(); ?>
"></a></td>
                                    <?php else: ?>
                                            <a href="/images/banners/<?php echo $this->_tpl_vars['item']['image']; ?>
_big.jpg" rel="prettyPhoto[mixed]"><img align="center" src="/images/banners/<?php echo $this->_tpl_vars['item']['image']; ?>
_small.jpg?time=<?php echo time(); ?>
"></a></td>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td style="vertical-align: middle;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
                                <td class="hidden-480" style="text-align: center; max-width: 100px; vertical-align: middle;">
                                    <?php if ($this->_tpl_vars['item']['link'] != ""): ?>
                                        <a href="<?php echo $this->_tpl_vars['item']['link']; ?>
" target="_blank" style="padding:5px 5px 5px 5px; width:50px;">Посмотреть</a>
                                    <?php endif; ?>
                                </td>
                                <td class="hidden-480" style="text-align: center; vertical-align: middle;">
                                    <?php echo $this->_tpl_vars['item']['position']; ?>

                                </td>
                                <td class="span3" style="text-align: center; vertical-align: middle;">
                                    <a href="/admin/banners/modifybanner/id/<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a>|
                                    <a href="/admin/banners/delete/id/<?php echo $this->_tpl_vars['item']['id']; ?>
"  onclick="return confirm(<?php echo $this->_tpl_vars['adminLangParams']['NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN']; ?>
)"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
                                </td>
                            </tr>
                                <?php endforeach; else: ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">Нет ни одного баннера...</td>
                            </tr>
                            <?php endif; unset($_from); ?>
                            </tbody>
                        </table>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/banners/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


                    </div>


                </div>


            </div>



        </div>

    </div>

</div>