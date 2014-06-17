<br />
<center><span style="font-size:16px;">{$adminLangParams.PRODUCTS__HEADER}</span></center>
<br />
<div id="gallery">
<table align="center" width="97%" class="cont2">
<tr>
	<td align="left" colspan="7" style="border:0px">
		{include file='admin/products/paging.tpl'}
	</td>
</tr>

<tr>
	<td colspan="7" class="header">
		<table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="100" style="font-weight:bold; padding:5px 5px 5px 5px; border: 0px;"><a href="/admin/products/add">{$adminLangParams.PRODUCTS__ADD}</a></td>
                <td align="center"  style="border: 0px;">
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="border: 0px;">{$adminLangParams.PRODUCTS__CHOOSE_SECTION}:</td>
                            <td style="border: 0px;">
                                <select id="section" name="section" class="input" onchange="changeSection();">
                                <option value="0" {if $curr_section==0}selected="selected"{/if}> ----------- </option>
                                {foreach from=$sections item=sec}
                                    <option value="{$sec.id}" {if $curr_section==$sec.id}selected="selected"{/if}>{$sec.title|stripslashes|strip_tags}</option>
                                {/foreach}
                                </select>
                            </td>
                            <td style="border: 0px;">&nbsp;&nbsp;Выберите категорию:</td>
                            <td style="border: 0px;">
                                <select id="category" name="category" class="input" onchange="changeCategory();">
                                    <option value="0" {if $curr_category==0}selected="selected"{/if}> ----------- </option>
                                {foreach from=$categories item=cat}
                                    <option value="{$cat.id}" {if $curr_category==$cat.id}selected="selected"{/if}>{$cat.title|stripslashes|strip_tags}</option>
                                {/foreach}
                                </select>
                            </td>
                            {*<td style="border: 0px;">Укажите бренд:</td>*}
                            {*<td style="border: 0px;">*}
                                {*<select id="brand" name="brand" class="input" onchange="changeBrand();">*}
                                    {*<option value="0" {if $curr_brand==0}selected="selected"{/if}> ----------- </option>*}
                                {*{foreach from=$brands item=brand}*}
                                    {*<option value="{$brand.id}" {if $curr_brand==$brand.id}selected="selected"{/if}>{$brand.title|stripslashes|strip_tags}</option>*}
                                {*{/foreach}*}
                                {*</select>*}
                            {*</td>*}
                        </tr>
                    </table>
                </td>
                <td width="100" style="font-weight:bold; border: 0px;">&nbsp;</td>
            </tr>
		</table>
	</td>
</tr>

<tr>
    <td class="header" style="padding:5px 5px 5px 5px; width: 88px; text-align: center;"><b>Изображение</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.PRODUCTS__TITLE}</b></td>
    <td class="header" style="padding:5px 5px 5px 5px;" width="80"><b>Цена</b></td>
	<td class="header" align="center" width="80" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.PRODUCTS__POSITION}</b></td>
    <td class="header" align="center" width="170" style="padding:5px 5px 5px 5px;"><b>Активный/Архив</b></td>
    <td class="header" align="center" width="170" style="padding:5px 5px 5px 5px;"><b>Акция</b></td>
	<td class="header" width="200" align="center" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.PRODUCTS__ACTION}</b></td>
</tr>
{foreach from=$products item=item}
<tr bgcolor="{cycle values='#eeeeee,#ffffff'}">
    <td style="width: 88px; height: 58;" align="center">
        {if $item.image!=''}
            <span>
                <a href="/images/products/{$item.image}_big.jpg?time={$smarty.now}" rel="lightbox">
                    <img src="/images/products/{$item.image}_small.jpg"  width="88" height="62"  style="border:1px solid #b2b2b2;" />
                </a>
            </span>
        {/if}
    </td>
	<td style="padding:5px 5px 5px 5px;">{$item.title|stripslashes}</td>
    <td style="padding:5px 5px 5px 5px;">{$item.price|stripslashes} руб.</td>
	<td style="padding:5px 5px 5px 5px; width:60px;" align="center">{$item.position}</td>
    <td style="padding:5px 5px 5px 5px;" width="170" align="center">
        {if $item.active==1}
            <a href="javascript:void(0);" onclick="changeRecommend('{$item.id}');" id="status_link{$item.id}" style="text-decoration: none;"><span style="color:green; font-weight: bold;">Активный</span></a>
        {else}
            <a href="javascript:void(0);" onclick="changeRecommend('{$item.id}');" id="status_link{$item.id}" style="text-decoration: none;"><span style="color:red; font-weight: bold;">Архив</span></a>
        {/if}
    </td>
    <td style="padding:5px 5px 5px 5px;" width="170" align="center">
        {if $item.action==1}
            <a href="javascript:void(0);" onclick="changeAction('{$item.id}');" id="action_link{$item.id}" style="text-decoration: none;"><span style="color:green; font-weight: bold;">Акция</span></a>
            {else}
            <a href="javascript:void(0);" onclick="changeAction('{$item.id}');" id="action_link{$item.id}" style="text-decoration: none;">Продукт</a>
        {/if}
    </td>
	<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
		<a href="/admin/products/modify/id/{$item.id}">{$adminLangParams.PRODUCTS__MODIFY}</a>
		|
		<a href="/admin/products/delete/id/{$item.id}" onclick="return confirm({$adminLangParams.PRODUCTS__DELETE_PRODUCT})">{$adminLangParams.PRODUCTS__DELETE}</a>
        |
        <a href="/admin/products/reviews/product_id/{$item.id}/page/1">Отзывы</a>
	</td>
</tr>
{foreachelse}
<tr>
	<td colspan="7"><b>Ни одного товара не найдено...</b></td>
</tr>	
{/foreach}
<tr>
	<td colspan="7" class="header" style="padding:5px 5px 5px 5px;">
        <a href="/admin/products/add">{$adminLangParams.PRODUCTS__ADD}</a>
    </td>
</tr>
<tr>
	<td align="left" colspan="7" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/products/paging.tpl'}
	</td>
</tr>
</table>
</div>
{literal}
<script type="text/javascript">
//    function changeSection(){
//        document.location.href="/admin/products/index/section/"+$("#section").val()+"/brand/"+$("#brand").val()+"/page/1";
//    }
    function changeSection(){
        document.location.href="/admin/products/index/section/"+$("#section").val()+"/category/"+$("#category").val()+"/page/1";
    }

    function changeCategory(){
        document.location.href="/admin/products/index/section/"+$("#section").val()+"/category/"+$("#category").val()+"/page/1";
    }
    function getCategories(categoryId){
        var sectionId = $("#section").val();
        $.post("/admin/sections/ajax-get-categories", {section_id:sectionId, category_id:categoryId},
                function(data) {
                    if(data!=''){
                        $("#categories_container").html(data);
                    }
                }
        );
    }
    function changeBrand(){
        document.location.href="/admin/products/index/section/"+$("#section").val()+"/brand/"+$("#brand").val()+"/page/1";
    }

    function changeRecommend(productId){

        $.post("/admin/products/change-recommend", {id:productId},
                function(data) {
                    if(data==1){
                        $("#status_link"+productId).html('<span style="color:green; font-weight: bold;">Активный</span>');
                    } else {
                        $("#status_link"+productId).html('<span style="color:red; font-weight: bold;">Архив</span>');
                    }

                }
        );
    }

    function changeAction(productId){

        $.post("/admin/products/change-action", {id:productId},
                function(data) {
                    if(data==1){
                        $("#action_link"+productId).html('<span style="color:green; font-weight: bold;">Акция</span>');
                    } else {
                        $("#action_link"+productId).html('Продукт');
                    }

                }
        );
    }

</script>
{/literal}