<?php /* Smarty version 2.6.18, created on 2014-02-04 20:40:28
         compiled from admin/users/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/users/list.tpl', 54, false),)), $this); ?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Пользователи
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <i class="icon-user"></i>
                    <a href="/admin/users/index/page/1">Пользователи</a>
                </li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список пользователей</div>
                        <div class="actions">
                                                    </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th>Имя</th>
                                <th class="hidden-480" style="text-align: center;">Контакты</th>
                                <th class="hidden-480" style="text-align: center;">Дата</th>
                                <th style="text-align: center;">Статус</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                <tr>
                                    <td class="span1" style="text-align: center; vertical-align: middle;"><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
                                    <td style="vertical-align: middle;">
                                        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['first_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['last_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                    </td>
                                    <td class="hidden-480" style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        <table class="table table-bordered" style="margin-bottom: 0px;">
                                            <tbody>
                                            <tr>
                                                <td style="background: #f9f9f9;" class="span2">Email:</td>
                                                <td style="background: #fff;"><?php echo $this->_tpl_vars['item']['email']; ?>
</td>
                                            </tr>
                                            <?php if ($this->_tpl_vars['item']['phone'] != ''): ?>
                                            <tr style="background: #fff;">
                                                <td style="background: #f9f9f9;" class="span2">Телефон:</td>
                                                <td style="background: #fff;"><?php echo $this->_tpl_vars['item']['phone']; ?>
</td>
                                            </tr>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="hidden-480" style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['creation_date'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                    </td>
                                    <td style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        <?php if ($this->_tpl_vars['item']['active'] == 1): ?>
                                            <a href="javascript:void(0);" onclick="changeUserStatus('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
"><span style="font-weight:bold; color:#006600;">Активный</span></a>
                                        <?php else: ?>
                                            <a href="javascript:void(0);" onclick="changeUserStatus('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
"><span style="font-weight:bold; color:#660000;">Заблокирован</span></a>
                                        <?php endif; ?>
                                    </td>
                                    <td class="span3" style="text-align: center; vertical-align: middle;">
                                        <a href="/admin/users/view/id/<?php echo $this->_tpl_vars['item']['id']; ?>
">Просмотр</a> |
                                        <a href="javascript:void(0);"  onclick="return customConfirmBox('Вы уверены что хотите удалить этого пользователя?','/admin/users/delete/id/<?php echo $this->_tpl_vars['item']['id']; ?>
')">Удалить</a>
                                    </td>
                                </tr>
                                <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="6" style="text-align: center;">Нет ни одного пользователя...</td>
                                </tr>
                            <?php endif; unset($_from); ?>
                            </tbody>
                        </table>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/users/paging.tpl', 'smarty_include_vars' => array()));
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
function changeUserStatus(user_id){
	$.post("/admin/users/change-user-status", {id:user_id},
		function(data) {
   			if(data==1){
				$("#status_link"+user_id).html("<span style=\'font-weight:bold; color:#006600;\'>Активный</span>");
   			} else {
   				$("#status_link"+user_id).html("<span style=\'font-weight:bold; color:#660000;\'>Заблокирован</span>");
   			}
		}
	);	
}
</script>
'; ?>