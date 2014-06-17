<?php /* Smarty version 2.6.18, created on 2013-03-10 17:20:21
         compiled from admin/forum/forum/items_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/forum/forum/items_list.tpl', 29, false),array('modifier', 'stripslashes', 'admin/forum/forum/items_list.tpl', 30, false),array('modifier', 'strip_tags', 'admin/forum/forum/items_list.tpl', 31, false),)), $this); ?>
<br />
<center><span style="font-size:16px;">Форум</span></center>
<br />
<div id="gallery">
<table align="center" width="97%" class="cont2">
<?php if ($this->_tpl_vars['countpage'] > 1): ?>
<tr>
	<td align="left" colspan="6" style="padding:5px 5px 5px 5px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/forum/forum/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
<?php endif; ?>

<tr>
	<td colspan="6" class="header">
		<a href="/admin/forum/add-forum">Добавить</a>
	</td>
</tr>

<tr>
	<td class="header"><b>Заголовок</b></td>
	<td class="header" align="center"><b>Короткое описание</b></td>
	<td class="header" width="80" align="center"><b>Дата</b></td>
	<td class="header" width="80" align="center"><b>Комментарии</b></td>
    <td class="header" width="80" align="center"><b>Доступно</b></td>
	<td class="header" width="80" align="center"><b>Действия</b></td>
</tr>
<?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#ffffff,#EEEEEE'), $this);?>
">
	<td style="padding:5px 5px 5px 5px; width: 350px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	<td style="padding:5px 5px 5px 5px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['description_short'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
	<td align="center" style="padding:5px 5px 5px 5px; width:80px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	<td align="center" style="padding:5px 5px 5px 5px; width:80px;">
        <a href="/admin/forum/comments/forum_id/<?php echo $this->_tpl_vars['item']['id']; ?>
/spage/<?php echo $this->_tpl_vars['page']; ?>
/page/0">Смотреть</a>
    </td>
    <td style="padding:5px 5px 5px 5px;" width="100" align="center">
        <?php if ($this->_tpl_vars['item']['active'] == 1): ?>
            <a href="javascript:void(0);" onclick="changeActive('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="/images/active.png" /></a>
            <?php else: ?>
            <a href="javascript:void(0);" onclick="changeActive('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="/images/passive.png" /></a>
        <?php endif; ?>
    </td>
	<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
        <a href="/admin/forum/modify-forum/id/<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a>
            &nbsp;|&nbsp;
        <a href="/admin/forum/delete-forum/id/<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
	</td>
</tr>
<?php endforeach; else: ?>
<tr>
	<td colspan="6"><b>Нет ни одной записи...</b></td>
</tr>	
<?php endif; unset($_from); ?>
<tr>
	<td colspan="6" class="header"><a href="/admin/forum/add-forum">Добавить</a></td>
</tr>
<?php if ($this->_tpl_vars['countpage'] > 1): ?>
    <tr>
        <td align="left" colspan="6" style="padding:5px 5px 5px 5px;">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/forum/forum/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </td>
    </tr>
<?php endif; ?>
</table>
</div>
<?php echo '
<script type="text/javascript">
    function changeActive(forumId){

        $.post("/admin/forum/change-forum-active", {id:forumId},
                function(data) {
                    if(data==1){
                        $("#status_link"+forumId).html(\'<img src="/images/active.png" />\');
                    } else {
                        $("#status_link"+forumId).html(\'<img src="/images/passive.png" />\');
                    }

                }
        );
    }
</script>
'; ?>