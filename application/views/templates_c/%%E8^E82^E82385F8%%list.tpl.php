<?php /* Smarty version 2.6.18, created on 2012-02-01 17:09:58
         compiled from admin/operators/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/operators/list.tpl', 23, false),array('modifier', 'stripslashes', 'admin/operators/list.tpl', 24, false),)), $this); ?>
<br />
<center><span style="font-size:16px;"><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__HEADER']; ?>
</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/operators/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>

<tr>
	<td colspan="4" class="header"><a href="/admin/operators/add"><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__ADD']; ?>
</a></td>
</tr>

<tr><td colspan="4" height="4" style="line-height:5px;">&nbsp;</td></tr>
<tr>
	<td class="header"><b><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__NAME']; ?>
</b></td>
	<td class="header" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__EMAIL']; ?>
</b></td>
	<td class="header" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__STATUS']; ?>
</b></td>
	<td class="header" width="150" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__ACTION']; ?>
</b></td>
</tr>
<?php $_from = $this->_tpl_vars['operators']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pages_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pages_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['pages_loop']['iteration']++;
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#FFEFAA,#ffffff'), $this);?>
">
	<td style="padding:5px 5px 5px 5px; width:400px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	<td style="padding:5px 5px 5px 5px;" width="200" align="center">
		<?php echo $this->_tpl_vars['item']['email']; ?>

	</td>
	<td style="padding:5px 5px 5px 5px;" width="100" align="center">
		<?php if ($this->_tpl_vars['item']['active'] == 1): ?>
			<a href="javascript:void(0);" onclick="changeOperatorStatus('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
"><span style="font-weight:bold; color:#006600;"><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__STATUS_ITEM2']; ?>
</span></a>
		<?php else: ?>
			<a href="javascript:void(0);" onclick="changeOperatorStatus('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
"><span style="font-weight:bold; color:#660000;"><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__STATUS_ITEM1']; ?>
</span></a>
		<?php endif; ?>
	</td>	
	<td align="center"><a href="/admin/operators/modify/id/<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__MODIFY']; ?>
</a> | <a href="/admin/operators/delete/id/<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="return confirm(<?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__DELETE_OPERATOR']; ?>
)"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a></td>
</tr>
<tr><td colspan="4" height="4" style="line-height:5px;">&nbsp;</td></tr>
<?php endforeach; else: ?>
<tr>
	<td colspan="4"><b><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__NO_OPERATORS_FOUND']; ?>
</b></td>
</tr>	
<?php endif; unset($_from); ?>

<tr>
	<td colspan="4" class="header"><a href="/admin/operators/add"><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__ADD']; ?>
</a></td>
</tr>

<tr>
	<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/operators/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
</table>
<input type="hidden" id="status1" value="<?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__STATUS_ITEM1']; ?>
">
<input type="hidden" id="status2" value="<?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__STATUS_ITEM2']; ?>
">
<?php echo '
<script type="text/javascript">
function changeOperatorStatus(user_id){
	$.post("/admin/operators/change-operator-status", {id:user_id},
		function(data) {
   			if(data==1){
				$("#status_link"+user_id).html("<span style=\'font-weight:bold; color:#006600;\'>"+$("#status2").val()+"</span>");
   			} else {
   				$("#status_link"+user_id).html("<span style=\'font-weight:bold; color:#660000;\'>"+$("#status1").val()+"</span>");
   			}
		}
	);	
}
</script>
'; ?>