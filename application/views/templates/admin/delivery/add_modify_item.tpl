<br />
<center><span style="font-size:16px;">Доставка</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/delivery/{$action}" name="delivery_form">
			<input type="hidden" name="step" value="2">
			{if $destination.id}
				<input type="hidden" name="id" value="{$destination.id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modify'}Изменить{else}Добавить{/if} пункт назначения</b></td>
				</tr>
				<tr>
					<td class="header" width="100px">Пункт зазначения:</td>
					<td><input type="text" id="destination" class="input" style="width:400px;" name="destination" value="{$destination.destination|stripslashes}"></td>
				</tr>
				<tr>
					<td class="header">Цена доставки:</td>
                    <td><input type="text" id="price" class="input" style="width:100px;" maxlength="10" name="price" value="{$destination.price|stripslashes}"></td>
				</tr>
                <tr>
                    <td class="header">Позиция:</td>
                    <td><input type="text" id="position" class="input" style="width:40px;" maxlength="10" name="position" value="{$destination.position|stripslashes}"></td>
                </tr>
				<tr>
					<td colspan="2" class="header" align="center">
						<input type="button" class="input" value="save" onclick="checkForm();">&nbsp;
						<input type="button" class="input" value="cancel" onclick="document.location='/admin/delivery/index/page/1'">
					</td>
				</tr>
			</table>
		</form>
	</td>
</tr>
</table>
{literal}

<script type="text/javascript">
    
function checkForm(){
	if ($("#destination").val() == '') {
		alert('Введите пункт назначения');
	} else if($("#price").val() == '') {
		alert('Введите цену доставки');
	} else if($("#position").val() == '') {
        alert('Введите позицию');
    } else {
		document.forms.delivery_form.submit();
	}
}
</script>
{/literal}