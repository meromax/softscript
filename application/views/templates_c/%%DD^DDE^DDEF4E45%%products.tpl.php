<?php /* Smarty version 2.6.18, created on 2014-02-06 20:50:53
         compiled from profile/products.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'profile/products.tpl', 78, false),array('modifier', 'stripslashes', 'profile/products.tpl', 78, false),)), $this); ?>
<link rel="stylesheet" href="/css/bootstrap-plugins/plugins/bootstrap-switch/bootstrap-switch.min.css" />
<script src="/css/bootstrap-plugins/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script src="/css/bootstrap-plugins/plugins/bootstrap-switch/bootstrap-switch-init.js" type="text/javascript" ></script>

<script src="/js/profile_products_list.js" type="text/javascript" ></script>

<!-- Products -->
<div class="darker-stripe">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li><span class="icon-chevron-right"></span></li>
                    <li>
                        <a href="/profile.html">Личный кабинет</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="push-up blocks-spacer">
        <div class="row">

            <aside class="span3">
                <div class="sidebar-item">

                    <div>
                        <h3><span class="light">Личный</span> Кабинет</h3>
                    </div>

                    <div class="row">
                        <div class="span3">
                            <div class="widget">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "profile/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </div>
                        </div>
                    </div>

                </div>
            </aside>

            <section class="span9" style="min-height: 600px;">


                <div class="underlined push-down-20">
                    <h3><span class="light">Мои</span> Товары</h3>
                </div>

                <table class="table table-bordered" style="margin-bottom: 10px;">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Картинка</th>
                        <th>Наименование товара</th>
                        <th style="text-align: center;">Цена</th>
                        <th style="text-align: center;">Активен</th>
                        <th style="text-align: center;">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($this->_tpl_vars['products']): ?>
                        <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                            <tr>
                                <td class="span1">
                                    <a href="/product/<?php echo $this->_tpl_vars['item']['link']; ?>
" target="_blank">
                                        <img src="/images/products/<?php echo $this->_tpl_vars['item']['image']; ?>
_square.jpg" width="96" height="96" />
                                    </a>
                                </td>
                                <td style="vertical-align: middle;">
                                                                                                                                                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    $<?php echo $this->_tpl_vars['item']['price']; ?>

                                </td>
                                <td style="text-align: center; vertical-align: middle;" class="span1">
                                    <?php if ($this->_tpl_vars['item']['active'] == 1): ?>
                                        <a href="javascript:void(0);" title="Нажмите, чтобы сменить статус..." onclick="changeRecommend('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
"><span class="btn btn-success" style="width: 25px;">ДА</span></a>
                                    <?php else: ?>
                                        <a href="javascript:void(0);" title="Нажмите, чтобы сменить статус..." onclick="changeRecommend('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
"><span class="btn btn-danger" style="width: 25px;">НЕТ</span></a>
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="/profile/products/modify/id/<?php echo $this->_tpl_vars['item']['id']; ?>
" class="btn btn-warning"> <i class="icon-edit"></i> ИЗМЕНИТЬ</a>
                                    <a href="/profile/products/delete/id/<?php echo $this->_tpl_vars['item']['id']; ?>
" class="btn btn-danger"> <i class="icon-remove"></i> УДАЛИТЬ</a>
                                </td>
                            </tr>
                        <?php endforeach; endif; unset($_from); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">
                                У вас пока нет ни одного своего товара...
                                <br />
                                <a href="/profile/products/add" class="btn btn-success" style="margin: 10px 0px 10px 0px;"> <i class="icon-plus"></i> ДОБАВИТЬ</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <?php if ($this->_tpl_vars['products']): ?>
                <div style="text-align: right;">
                    <a href="/profile/products/add" class="btn btn-success"> <i class="icon-plus"></i> ДОБАВИТЬ</a>
                </div>
                <?php endif; ?>
            </section>
        </div>
    </div>
</div>