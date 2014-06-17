<div class="cont_sr">
	<div class="cont_s_pos">
		<div class="gl_block">
			<div class="t_line"><i class="t_l"></i><i class="t_r"></i></div>
			<div class="gl_block_pos">
					<h1>{$frontendLangParams.TITLE__ORDER_DATA} {$frontendLangParams.TITLE__NUMBER}{$order.id}</h1>
					
					<div class="profile">
						<form method="POST" action="">
								<div class="line"></div>
								
								<div class="profile_tbl">
									<table cellspacing="0" cellpadding="0">
									<tr>
										<td><nobr>{$frontendLangParams.TITLE__FROM_LANGUAGE}</nobr></td>
										<th>{$order.langFrom.title|stripslashes|strip_tags}</th>
										
										<td>{$frontendLangParams.TITLE__LETTERS_COUNT}</td>
										<th>{$order.letters_count}</th>
									</tr>
									<tr>
										<td><nobr>{$frontendLangParams.TITLE__TO_LANGUAGE}:</nobr></td>
										<th>{$order.langTo.title|stripslashes|strip_tags}</th>
										
										<td>{$frontendLangParams.TITLE__CATEGORY}</td>
										<th>{$order.ttheme.title|stripslashes|strip_tags}</th>
									</tr>
									</table>
								</div>
								
								<div class="line"></div>
								{if $order.pay_status==4}
									<a class="sbm_link" href="/tdownload{$order.id}.html">{$frontendLangParams.TITLE__DOWNLOAD}</a>
								{elseif $order.pay_status==1}
									<a class="sbm_link" href="">{$frontendLangParams.TITLE__PAY}</a>
								{elseif $order.pay_status==3}
									<a class="sbm_link" href="">{$frontendLangParams.TITLE__EXTRAPAY}</a>
								{/if}
								<p class="zakaz_stat">{$frontendLangParams.TITLE__COST} <b>{$order.totalPrice} $</b><br>
								{$frontendLangParams.TITLE__STATUS}: <b>{$order.pay_status_title|stripslashes|strip_tags}</b>
								
								<div class="clear_line"></div>
						</form>
					</div>
			</div>
			<i class="b_l"></i><i class="b_r"></i>
		</div>
	</div>
</div>