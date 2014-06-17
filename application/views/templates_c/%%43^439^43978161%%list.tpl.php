<?php /* Smarty version 2.6.18, created on 2014-01-21 12:00:31
         compiled from admin/reviews/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/reviews/list.tpl', 23, false),array('modifier', 'strip_tags', 'admin/reviews/list.tpl', 24, false),array('modifier', 'stripslashes', 'admin/reviews/list.tpl', 24, false),)), $this); ?>
<br />
<center><span style="font-size:16px;">Отзывы</span></center>
<br />
<table align="center" width="97%" class="cont2">
<tr>
	<td align="left" colspan="5" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/reviews/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
<!--
<tr>
	<td colspan="5" class="header"><a href="/admin/reviews/addnew"><?php echo $this->_tpl_vars['adminLangParams']['REVIEWS__ADD']; ?>
</a></td>
</tr>
-->
<tr>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>Отзыв</b></td>
	<td class="header" align="center"><b>Пользователь</b></td>
	<td class="header" align="center"><b>Дата</b></td>
	<td class="header" align="center"><b>Статус</b></td>
	<td class="header" width="150" align="center"><b>Действия</b></td>
</tr>
<?php $_from = $this->_tpl_vars['reviews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pages_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pages_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['pages_loop']['iteration']++;
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#ffffff, #eeeeee'), $this);?>
">
	<td style="padding:5px 5px 5px 5px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['text'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	<td style="padding:5px 5px 5px 5px;" width="150" align="center">
		<a href="/admin/users/view/id/<?php echo $this->_tpl_vars['item']['user_id']; ?>
">
			<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['first_name'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['last_name'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

		</a>
	</td>
	<td style="padding:5px 5px 5px 5px;" width="150" align="center"><?php echo $this->_tpl_vars['item']['post_date']; ?>
</td>
	<td style="padding:5px 5px 5px 5px;" width="100" align="center">
		<?php if ($this->_tpl_vars['item']['active'] == 1): ?>
			<a href="javascript:void(0);" onclick="changeReviewStatus('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
"><span style="font-weight:bold; color:#006600;">активный</span></a>
		<?php else: ?>
			<a href="javascript:void(0);" onclick="changeReviewStatus('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
"><span style="font-weight:bold; color:#660000;">не активный</span></a>
		<?php endif; ?>
	</td>	
	<td align="center"><!--<a href="/admin/reviews/modify/id/<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a> | --><a href="/admin/reviews/delete/id/<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="return confirm(<?php echo $this->_tpl_vars['adminLangParams']['NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN']; ?>
)"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a></td>
</tr>
<?php endforeach; else: ?>
<tr>
	<td colspan="5"><b>Нет ни одного отзыва...</b></td>
</tr>	
<?php endif; unset($_from); ?>
<!--
<tr>
	<td colspan="5" class="header"><a href="/admin/reviews/add"><?php echo $this->_tpl_vars['adminLangParams']['REVIEWS__ADD']; ?>
</a></td>
</tr>
-->
<tr>
	<td align="left" colspan="5" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/reviews/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
</table>
<input type="hidden" id="status1" value="<?php echo $this->_tpl_vars['adminLangParams']['REVIEWS__STATUS_ITEM1']; ?>
">
<input type="hidden" id="status2" value="<?php echo $this->_tpl_vars['adminLangParams']['REVIEWS__STATUS_ITEM2']; ?>
">
<?php echo '
<script type="text/javascript">
function changeReviewStatus(review_id){
	$.post("/admin/reviews/change-review-status", {id:review_id},
		function(data) {
   			if(data==1){
				$("#status_link"+review_id).html("<span style=\'font-weight:bold; color:#006600;\'>активный</span>");
   			} else {
   				$("#status_link"+review_id).html("<span style=\'font-weight:bold; color:#660000;\'>не активный</span>");
   			}
		}
	);	
}
</script>
'; ?>