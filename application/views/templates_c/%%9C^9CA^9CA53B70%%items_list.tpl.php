<?php /* Smarty version 2.6.18, created on 2013-01-25 20:44:37
         compiled from admin/forum/comments/items_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/forum/comments/items_list.tpl', 31, false),array('modifier', 'strip_tags', 'admin/forum/comments/items_list.tpl', 32, false),)), $this); ?>
<br />
<br />
<table width="98%" style="margin-top:20px; border:0px;"  class="cont2">
<tr>
    <td style="border: 0px; width: 20px;">&nbsp;</td>
	<td width="20%" style="padding:5px 5px 5px 5px; border:1px solid #c5c5c5;" valign="top">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/forum/comments/topic_view.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
	<td valign="top" width="80%" style="border:0px;">
		<center><span style="font-size:16px;">Форум->Комментарии</span></center>
		<br />
		<div id="gallery">
		<table align="center" width="97%">
        <?php if ($this->_tpl_vars['countpage'] > 1): ?>
		<tr>
			<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/forum/comments/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</td>
		</tr>
        <?php endif; ?>

		<tr>
			<td class="header"><b><?php echo $this->_tpl_vars['adminLangParams']['CATEGORIES_TITLE']; ?>
</b></td>
			<td class="header" align="center"><b>Дата</b></td>
            <td class="header" width="80" align="center"><b>Доступно</b></td>
			<td class="header" width="80" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_ACTION']; ?>
</b></td>
		</tr>
		<?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<tr bgcolor="#ffffff">
			<td style="padding:5px 5px 5px 5px;">
                <b><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</b><br />
                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

			</td>
			<td style="padding:5px 5px 5px 5px; width:80px;" align="center"><?php echo $this->_tpl_vars['item']['post_date']; ?>
</td>
            <td style="padding:5px 5px 5px 5px; width:80px;" align="center">
                <?php if ($this->_tpl_vars['item']['active'] == 1): ?>
                    <a href="javascript:void(0);" onclick="changeForumCommentActive('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="/images/active.png" /></a>
                    <?php else: ?>
                    <a href="javascript:void(0);" onclick="changeForumCommentActive('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="/images/passive.png" /></a>
                <?php endif; ?>
            </td>
			<td align="center" style="padding:5px 5px 5px 5px; width:80px;">
				<a href="/admin/forum/delete-comment/forum_id/<?php echo $this->_tpl_vars['forum']['id']; ?>
/comment_id/<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="return confirm('Вы уверены, что хотите удалить комментарий?')"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
			</td>
		</tr>
		<?php endforeach; else: ?>
		<tr>
			<td colspan="4"><b>Нет ни одного комментария...</b></td>
		</tr>	
		<?php endif; unset($_from); ?>
							        <?php if ($this->_tpl_vars['countpage'] > 1): ?>
														         <?php endif; ?>
		</table>
		</div>
	
	</td>
</tr>
</table>
<?php echo '
<script type="text/javascript">
    function chnagePage(){
        document.location.href="/admin/sections/index/content_page_id/"+$("#content_page_id").val()+"/page/1";
    }

    function changeForumCommentActive(commentId){

        $.post("/admin/forum/change-comment-active", {id:commentId},
                function(data) {
                    if(data==1){
                        $("#status_link"+commentId).html(\'<img src="/images/active.png" />\');
                    } else {
                        $("#status_link"+commentId).html(\'<img src="/images/passive.png" />\');
                    }

                }
        );
    }
</script>
'; ?>
