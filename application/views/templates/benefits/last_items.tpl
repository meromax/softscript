<div class="header_txt_1">{$settings.benefits|stripslashes}</div>
{foreach from=$benefits item=item}
<div class="txt_block"> 
{$item.description|stripslashes|strip_tags|replace:"&nbsp;":""} 
</div>
{/foreach}