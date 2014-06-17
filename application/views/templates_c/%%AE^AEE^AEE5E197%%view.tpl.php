<?php /* Smarty version 2.6.18, created on 2014-02-04 13:37:50
         compiled from admin/orders/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/orders/view.tpl', 64, false),array('modifier', 'strip_tags', 'admin/orders/view.tpl', 64, false),)), $this); ?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Заказы <small>&nbsp;</small>
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/orders/index/page/1">Заказы</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:void(0);">Просмотр заказа</a>
                </li>
            </ul>
        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid ">
            <div class="span12">
                <!-- BEGIN INLINE TABS PORTLET-->
                <div class="portlet box grey" id="printCon">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-info"></i> Информация о заказе</div>
                    </div>
                    <div class="portlet-body form">
                        <div class="row-fluid">
                            <div class="span12">
                                <form method="POST" action="/admin/orders/<?php echo $this->_tpl_vars['action']; ?>
" name="order_form" enctype="multipart/form-data" class="form-horizontal">
                                    <input type="hidden" name="step" value="2">
                                    <?php if ($this->_tpl_vars['order']['id']): ?>
                                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['order']['id']; ?>
">
                                    <?php endif; ?>

                                    <div style="padding-left: 10px; padding-top: 10px;">

                                        <div class="control-group">
                                            <label class="control-label">Номер заказа:</label>
                                            <div class="controls">
                                                <input type="text" name="order_number" id="order_number" value="<?php echo $this->_tpl_vars['order']['id']; ?>
" readonly="readonly" class="span2 m-wrap" onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Дата и время:</label>
                                            <div class="controls">
                                                <input type="text" name="order_date" id="order_date" readonly="readonly" value="<?php echo $this->_tpl_vars['order']['post_date']; ?>
" class="span2 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Имя клиента:</label>
                                            <div class="controls">
                                                <input type="text" name="order_name" id="order_name" readonly="readonly" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" class="span3 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Электронная почта:</label>
                                            <div class="controls">
                                                <input type="text" name="order_email" id="order_email" readonly="readonly" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" class="span3 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Телефон:</label>
                                            <div class="controls">
                                                <input type="text" name="order_phone" id="order_phone" readonly="readonly" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['phone'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" class="span2 m-wrap" />
                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label">Начальная стоимость:</label>
                                            <div class="controls">
                                                <input type="text" name="order_price" id="order_price" readonly="readonly" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" class="span2 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Стоимость со скидкой:</label>
                                            <div class="controls">
                                                <input type="text" name="order_sprice" id="order_sprice" readonly="readonly" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['sprice']+$this->_tpl_vars['order']['dostavka'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" class="span2 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Скидка:</label>
                                            <div class="controls">
                                                <input type="text" name="order_skidka" id="order_skidka" readonly="readonly" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['skidka'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
%" class="span2 m-wrap" />
                                            </div>
                                        </div>


                                        <div class="portlet box yellow" style="margin-top: 40px;">

                                            <div class="caption" style="padding: 5px 5px 5px 15px;"><i class="icon-list"></i> СПИСОК ТОВАРОВ</div>

                                            <div class="portlet-body" style="padding-top: 20px; padding-left: 20px; padding-right: 20px;">

                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th class="span1">#</th>
                                                        <th class="span1">Картинка</th>
                                                        <th>Название</th>
                                                        <th class="hidden-480">Цена</th>
                                                        <th>Количество</th>
                                                        <th>Стоимость</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $_from = $this->_tpl_vars['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pkey'] => $this->_tpl_vars['prod']):
?>
                                                    <tr>
                                                        <td class="span1" style="text-align: center; vertical-align: middle;"><?php echo $this->_tpl_vars['pkey']+1; ?>
</td>
                                                        <td class="span1" style="text-align: center; vertical-align: middle;"><img src="/images/products/<?php echo $this->_tpl_vars['prod']['image']; ?>
_square.jpg" height="80" width="80"></td>
                                                        <td style="vertical-align: middle;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
                                                        <td class="hidden-480" style="text-align: center; vertical-align: middle;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
                                                        <td style="text-align: center; vertical-align: middle;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['count'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
                                                        <td style="text-align: center; vertical-align: middle;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['total_price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
                                                    </tr>
                                                    <?php endforeach; endif; unset($_from); ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions" style="padding-left: 20px;">
                                        <button type="button" class="btn blue" onclick="printOrder();"><i class="icon-print"></i> Распечатать</button>
                                        <button type="button" class="btn" onclick="document.location.href='/admin/orders/index/page/<?php echo $this->_tpl_vars['page']; ?>
'"><i class="icon-undo"></i> Отмена</button>
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

<script language=javascript src="<?php echo $this->_tpl_vars['site_url']; ?>
/js/jquery.print.js" type="text/javascript"></script>
<?php echo '
    <script type="text/javascript">
        function printOrder(){
            $("#printCon").print();
        }
    </script>
'; ?>