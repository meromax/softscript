<table style="width:100%; border: solid 1px #b2b2b2; margin: 4px 4px 4px 4px;"> 
<tr>
	<td class="innerformtemp">
		<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
		  <td colspan="2">
		    List of files:
		  </td>
		</tr>
		<tr>
		  <td colspan="2" >
		  <form method="POST" action="/admin/portfolio/delimg">
				<SELECT id="id_from" name="selectimg" {if $images[0]==""} disabled {/if} single SIZE=8 style="width:385px; color:blue; " onchange="setValue('id_from','/images/portfolios/{$portfolio_id}')" onclick="setValue('id_from','/images/portfolios/{$portfolio_id}')">
				{foreach key=cid item=node from=$titles}
				{if $node!=''}
					<option value="{$images[$cid]}" {if $cid==0} selected {/if}>{$node}</option>
				{/if} 
				{/foreach}
	  	 		</SELECT>
		  </td>
		</tr>
		<tr><td colspan="2" class="separator"></td></tr>		
		<tr>
		  <td align="left" colspan="2">
		    
			<input type="submit" id="del_id" {if $images[0]==""} disabled {/if} class="input" value="delete selected image" onClick="return LockButton()" >
    		<input type='hidden' name='portfolio_id' value='{$portfolio_id}'>
    	 </form>					    
		  </td>
		</tr>
		</table>
	</td>
</tr>
</table>