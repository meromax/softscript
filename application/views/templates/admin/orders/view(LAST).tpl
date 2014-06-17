<br />
<center><span style="font-size:16px;">{$adminLangParams.ORDERS__HEADER} -> {$adminLangParams.ORDERS__NUMBER2}{$order.id}</span></center>
<br />
<center>
<form method="POST" action="/admin/orders/{$action}" name="order_form" enctype="multipart/form-data">
<table border="0">
<tr class="printCon">
	<td valign="top" align="right"">
		<input type="hidden" name="step" value="2">
		{if $order.id}
			<input type="hidden" name="id" value="{$order.id}">
		{/if}
		<table class="cont2" align="center" style="border:1px solid #666;">
			<tr>
				<td colspan="2" class="header"><b>{$adminLangParams.ORDERS__VIEW}</b></td>
			</tr>
			<tr>
				<td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__NUMBER}:</td>
				<td width="700" height="26">{$order.id}</td>
			</tr>				
			<tr>
				<td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__DATE_AND_TIME}:</td>
				<td width="700" height="26">{$order.post_date}</td>
			</tr>
            <tr>
                <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__CLIENT_NAME}:</td>
                <td width="700" height="26">{$order.name|stripslashes|strip_tags}</td>
            </tr>
            <tr>
                <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__CLIENT_EMAIL}:</td>
                <td width="700" height="26">{$order.email|stripslashes|strip_tags}</td>
            </tr>
            <tr>
                <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__CLIENT_PHONE}:</td>
                <td width="700" height="26">{$order.phone|stripslashes|strip_tags}</td>
            </tr>
            <tr>
                <td class="header" width="160px" style="padding:5px 5px 5px 5px;">Число товаров:</td>
                <td width="700" height="26">{$order.cd_count|stripslashes|strip_tags}</td>
            </tr>
            <tr>
                <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__PRICE}:</td>
                <td width="700" height="26">{$order.price|stripslashes|strip_tags}</td>
            </tr>
            {*<tr>*}
                {*<td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__DOSTAVKA}:</td>*}
                {*<td width="700" height="26">{$order.dostavka|stripslashes|strip_tags}</td>*}
            {*</tr>*}
            <tr>
                <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__TOTAL_PRICE}:</td>
                <td width="700" height="26">{$order.total_price|stripslashes|strip_tags}</td>
            </tr>
			{*<tr>*}
				{*<td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__COUNTRY}:</td>*}
				{*<td width="700" height="26">{$order.country|stripslashes|strip_tags}</td>*}
			{*</tr>*}
            {*<tr>*}
                {*<td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__CITY}:</td>*}
                {*<td width="700" height="26">{$order.city|stripslashes|strip_tags}</td>*}
            {*</tr>*}
            {*<tr>*}
                {*<td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__ZIP}:</td>*}
                {*<td width="700" height="26">{$order.zip|stripslashes|strip_tags}</td>*}
            {*</tr>*}
			<tr>
				<td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__ADDRESS}:</td>
				<td width="700" height="26">{$order.address|stripslashes|strip_tags}</td>
			</tr>
            <tr>
                <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__COMMENT}:</td>
                <td width="700" height="26">{$order.comment|stripslashes|strip_tags}</td>
            </tr>
            {*<tr>*}
                {*<td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__STATUS}:</td>*}
                {*<td width="700" height="26">*}
                    {*{if $order.status==0}*}
                        {*<b>{$adminLangParams.ORDERS__STATUSES_STATUS0}</b>*}
                    {*{elseif $order.status==1}*}
                        {*<b>{$adminLangParams.ORDERS__STATUSES_STATUS1}</b>*}
                    {*{elseif $order.status==2}*}
                        {*<b>{$adminLangParams.ORDERS__STATUSES_STATUS2}</b>*}
                    {*{elseif $order.status==3}*}
                        {*<b>{$adminLangParams.ORDERS__STATUSES_STATUS3}</b>*}
                    {*{elseif $order.status==4}*}
                        {*<b>{$adminLangParams.ORDERS__STATUSES_STATUS4}</b>*}
                    {*{elseif $order.status==5}*}
                        {*<b>{$adminLangParams.ORDERS__STATUSES_STATUS5}</b>*}
                    {*{elseif $order.status==6}*}
                        {*<b>{$adminLangParams.ORDERS__STATUSES_STATUS6}</b>*}
                    {*{elseif $order.status==7}*}
                        {*<b>{$adminLangParams.ORDERS__STATUSES_STATUS7}</b>*}
                    {*{/if}*}
                {*</td>*}
            {*</tr>*}
            {*<tr>*}
                {*<td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__HOST}:</td>*}
                {*<td width="700" height="26">*}
                    {*<a href="{$order.host}" target="_blank">{$order.host}</a>*}
                {*</td>*}
            {*</tr>            *}
            {*<tr>*}
                {*<td class="header" width="160px" style="padding:5px 5px 5px 5px;">Action Pay:</td>*}
                {*<td width="700" height="26">*}
                    {*{if $order.action_pay==1}*}
                        {*<span style="color:green;">YES</span>*}
                    {*{else}*}
                        {*<span style="color:red;">NO</span>*}
                    {*{/if}*}
                {*</td>*}
            {*</tr>*}
            {*<tr>*}
                {*<td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__POST_NUMBER}:</td>*}
                {*<td width="700" height="26">{if $order.post_number!=""}<a href="http://search.belpost.by/#{$order.post_number}" target="_blank">{$order.post_number|stripslashes|strip_tags}</a>{/if}</td>*}
            {*</tr>*}
            <tr>
                <td class="header" width="160px" style="padding:5px 5px 5px 5px;">Товары:</td>
                <td width="700" height="26">
                    <table class="user">
                        <tr>
                            <td class="gray2" style="border: 0px; text-align: center; padding: 0px 5px 0px 5px;">№</td>
                            <td class="gray2" style="width: 88px; text-align: center;">Изображение</td>
                            <td class="gray">Название</td>
                            <td class="gray2" style="text-align: center;">Цена (руб.)</td>
                            <td class="gray2" style="text-align: center;">Кол-во (шт)</td><td class="gray">Стоимость (руб.)</td>
                        </tr>
                        <tr><td colspan="8" style="border: 0px;"></td></tr>

                        {foreach key=pkey from=$cart item=prod}
                        <tr class="gr"  {if $pkey%2==0}style="background: #F0EEEE;"{else}style="background: #f8f6f6;"{/if}>
                            <td style="padding: 0px; text-align: center;">{$key+1}.</td>
                            <td style="padding: 0px;"><img src="/images/products/{$prod.image}_small.jpg" height="88"></td>
                            <td style="width: 200px;">{$prod.title|stripslashes|strip_tags}</td>
                            <td style="padding: 0px; text-align: center;">{$prod.price|stripslashes|strip_tags}</td>
                            <td style="padding: 0px; text-align: center;">{$prod.count|stripslashes|strip_tags}</td>
                            <td style="padding: 0px; text-align: center;">{$prod.total_price|stripslashes|strip_tags}</td>
                        </tr>
                        <tr><td colspan="7" style="border: 0px;"></td></tr>
                        {/foreach}
                    </table>
                </td>
            </tr>
		</table>
	</td>

</tr>
<tr>
	<td colspan="2" class="header" align="center" height="60" style="background:none;">
        {*<input type="button" class="input" value="{$adminLangParams.BUTTON_MODIFY}" onclick="document.location='/admin/orders/modify/id/{$order.id}/page/{$page}'">*}
        <input type="button" class="input" value="Распечатать" onclick="printOrder();">
		<input type="button" class="input" value="{$adminLangParams.BUTTON_BACK}" onclick="document.location='/admin/orders/index/page/{$page}'">
	</td>
</tr>
</table>
</form>
</center>

<script language=javascript src="{$site_url}/js/jquery.print.js" type="text/javascript"></script>
{literal}
<script type="text/javascript">
    function printOrder(){
        $(".printCon").print();
    }
</script>
{/literal}