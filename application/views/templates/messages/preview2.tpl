<div class="cont_sr"><div class="cont_s_pos">
		<div class="gl_block">
			<div class="t_line"><i class="t_l"></i><i class="t_r"></i></div>
			<div class="gl_block_pos">
					<h1>{$frontendLangParams.TITLE__ORDER_DATA}</h1>
					
					<div class="profile">
						<form method="POST" action="/registration/index/joinnowpage2" id="order_preview_form2">
								<div class="line"></div>
								
								<div class="profile_tbl">
									<table cellspacing="0" cellpadding="0">
									<tr>
										<td>{$frontendLangParams.TITLE__YOUR_NAME}</td>
										<th><input type="text" id="order_user_name" name="order_user_name" value="{$userInfo.first_name}"></th>
										
										<td>{$frontendLangParams.TITLE__FROM_LANGUAGE}</td>
										<th>{$order.langFrom.title|stripslashes|strip_tags}</th>
									</tr>
									<tr>
										<td>{$frontendLangParams.TITLE__EMAIL}</td>
										<th><input type="text" id="order_user_email" name="order_user_email" value="{$userInfo.email}"></th>
										
										<td>{$frontendLangParams.TITLE__TO_LANGUAGE}</td>
										<th>{$order.langTo.title|stripslashes|strip_tags}</th>
									</tr>
									<tr>
										<td>{$frontendLangParams.TITLE__PHONE}</td>
										<th><input type="text" id="order_user_phone" name="order_user_phone" value="{$userInfo.phone}"></th>
										
										<td>{$frontendLangParams.TITLE__CATEGORY}</td>
										<th>{$order.ttheme.title|stripslashes|strip_tags}</th>
									</tr>
									</table>
                                    <div id="reg_errors_box" style="border:1px dotted #ffffff; background:#ff9999; display:none; text-align:center; margin-left:38px; margin-top:-30px; width:310px; padding:5px 5px 5px 5px; height:20px; color:#ffffff; position:absolute;"></div>
								</div>
								
								<div class="line"></div>
								<input type="hidden" name="reg_post" id="reg_post" value="0" />
								<a class="sbm_link" href="javascript:void(0);" id="order_link2">{$frontendLangParams.TITLE__ORDER}</a>
								<p class="zakaz_cost">{$frontendLangParams.TITLE__COST}<b>{$order.totalPrice} $</b></p>
								
								<div class="clear_line"></div>
						</form>
					</div>
			</div>
			<i class="b_l"></i><i class="b_r"></i>
		</div>
	</div>
</div>