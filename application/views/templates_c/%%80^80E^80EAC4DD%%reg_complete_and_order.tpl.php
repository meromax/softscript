<?php /* Smarty version 2.6.18, created on 2011-12-01 19:09:31
         compiled from registration/reg_complete_and_order.tpl */ ?>
<div class="cont_sr">
	<div class="cont_s_pos">
		<div class="gl_block">
			<div class="t_line"><i class="t_l"></i><i class="t_r"></i></div>
			<div class="gl_block_pos">
					<h1><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__REGISTRATION_COMPLETED']; ?>
</h1>
			</div>
			<i class="b_l"></i><i class="b_r"></i>
		</div>
	</div>
</div>
<div class="cont_sr"><div class="cont_s_pos">
		<div class="gl_block">
			<div class="t_line"><i class="t_l"></i><i class="t_r"></i></div>
			<div class="gl_block_pos">
				<div class="line"></div>
				<h1><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__ORDERS_COMPLETE']; ?>
</h1>

				<div class="profile">



							<div class="line"></div>

							<a class="sbm_link" href="javascript:void(0);" onclick="document.location.href='/orders/page/1'"><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__ORDERS']; ?>
</a>

							<div class="clear_line"></div>
					</form>
				</div>
			</div>
				<i class="b_l"></i><i class="b_r"></i>

		</div>
	</div>
</div>
<?php echo '
<script type="text/javascript">
	setTimeout(function () { document.location.href=\'/orders/page/1\'; }, 5000);
</script>
'; ?>