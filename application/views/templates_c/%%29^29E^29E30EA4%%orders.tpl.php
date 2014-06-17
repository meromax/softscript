<?php /* Smarty version 2.6.18, created on 2014-02-06 20:50:49
         compiled from profile/orders.tpl */ ?>
<!-- Orders -->
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
                    <h3><span class="light">История</span> Заказов</h3>
                </div>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th>Список товаров</th>
                        <th style="text-align: center;">Цена(у.е.)</th>
                        <th style="text-align: center;">Дата</th>
                        <th style="text-align: center;">Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($this->_tpl_vars['orders']): ?>
                    <?php $_from = $this->_tpl_vars['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['orderItem']):
?>
                    <tr>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $this->_tpl_vars['orderItem']['id']; ?>
</td>
                        <td>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">Ссылка для просмотра товара</th>
                                                                        <th style="text-align: center;">Ссылка</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $_from = $this->_tpl_vars['orderItem']['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['orderItemProd']):
?>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <a href="/product/<?php echo $this->_tpl_vars['orderItemProd']['link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['orderItemProd']['title']; ?>
</a>
                                        </td>
                                                                                                                                                                    <td style="text-align: center; vertical-align: middle; width: 80px;">
                                            <?php if ($this->_tpl_vars['orderItem']['status'] == 1): ?>
                                            <a href="/download/product/<?php echo $this->_tpl_vars['orderItemProd']['hash']; ?>
">Скачать</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif; unset($_from); ?>
                                </tbody>
                            </table>
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            <?php echo $this->_tpl_vars['orderItem']['sprice']; ?>

                            <?php if ($this->_tpl_vars['orderItem']['skidka'] != 0): ?>
                                <br /><b>скидка <?php echo $this->_tpl_vars['orderItem']['skidka']; ?>
 %</b>
                            <?php endif; ?>
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            <?php echo $this->_tpl_vars['orderItem']['post_date']; ?>

                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            <?php if ($this->_tpl_vars['orderItem']['status'] == 1): ?>
                                <b>Оплачен</b>
                            <?php elseif ($this->_tpl_vars['orderItem']['status'] == 2): ?>
                                <b>Не обработан</b>
                            <?php elseif ($this->_tpl_vars['orderItem']['status'] == 4): ?>
                                <b>Подтвержден</b>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">
                                Вы пока ничего не заказывали...
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>

            </section>
        </div>
    </div>
</div>