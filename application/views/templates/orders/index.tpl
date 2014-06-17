<div class="cont_sr">
	<div class="cont_s_pos">
		<h2>{$frontendLangParams.TITLE__MY_ORDERS}</h2>
		
		<div class="zakaz_tbl_pos">
			<table class="zakaz_tbl" width="100%" border="0" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<td>{$frontendLangParams.TITLE__STATUS}</td>
					<td width="67">{$frontendLangParams.TITLE__ORDER_NUMBER}</td>
					<td>{$frontendLangParams.TITLE__ORDER_NAME}</td>
					<td>{$frontendLangParams.TITLE__DOWNLOAD_WORK}</td>
				</tr>
			</thead>
			<tbody>
			{foreach from=$orders item=order}
				<tr>
					<td>
						<a class="zakaz_stat_{$order.pay_status}" href="/orders/view/{$order.id}">
							<span>
							{if $order.pay_status==1}
								{$frontendLangParams.STATUSES__STATUS1}
							{elseif $order.pay_status==2}
								{$frontendLangParams.STATUSES__STATUS2}
							{elseif $order.pay_status==3}
								{$frontendLangParams.STATUSES__STATUS3}
							{else}
								{$frontendLangParams.STATUSES__STATUS4}
							{/if}
							</span>
						</a>
					</td>
					<td>{$frontendLangParams.TITLE__NUMBER}{$order.id}</td>
					<td>
                        {if $order.filename_original!=''}
                            <a class="doc_link" href="/download{$order.id}.html"><i><img src="/images/ico_doc.gif" alt=""></i>{$order.filename_original|stripslashes|strip_tags}</a>
                        {/if}
                        {if $order.filename_original!='' && $order.filename_original2!=''}<br />{/if}
                        {if $order.filename_original2!=''}
                            <a class="doc_link" href="/2download{$order.id}.html"><i><img src="/images/ico_doc.gif" alt=""></i>{$order.filename_original2|stripslashes|strip_tags}</a>
                        {/if}
                    </td>
					<td>
                        {if $order.filename_translated!=''&&$order.pay_status==4}
                            <a class="doc_link_on" href="/tdownload{$order.id}.html"><i><img src="/images/ico_doc.gif" alt=""></i>{$order.filename_translated_original|stripslashes|strip_tags}</a>
                        {else}
                            &nbsp;
                        {/if}
                    </td>
				</tr>
			{/foreach}	
				<tr>
					<td colspan="4" align="center">
						{if $page_count>1 }
						<span style="color:#0276b1; font-size:11px;">{$frontendLangParams.TITLE__PAGES}: </span>
						{section name=item start=1 loop=$page_count+1 }
						  {if $page_num eq $smarty.section.item.index}
						    <span style="color:#000000; font-size:11px;" >{$page_num}</span>
						  {else}
						    <a href="/orders/page/{$smarty.section.item.index}" style="font-size:11px; text-decoration:none;">{$smarty.section.item.index}</a>
						  {/if}
						  {if $smarty.section.item.index != $page_count }
						  {/if}
						{/section}
						{/if}
					</td>
				</tr>
			</tbody>
			</table>
			
			
						
		</div>
	</div>
</div>