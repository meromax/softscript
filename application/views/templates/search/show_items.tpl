<div class="content">

    <div class="centerpanel">
        <div class="title mB10 fs18">
            <strong>Поиск по каталогу</strong>
        </div>
        <div class="title mB10 fs13">
            {include file='path.tpl'}
        </div>

        <div>
        {if $products}
            <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#8A8F95">
                <tbody>
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="middle" class="catalog" width="250">
                        Изображение
                    </td>
                    <td bgcolor="#ffffff" align="left" valign="middle" class="catalog" style="padding:3px 3px 3px 5px;">
                        DIN
                    </td>
                    <td bgcolor="#ffffff" align="left" valign="middle" class="catalog" style="padding:3px 3px 3px 5px; ">
                        Название
                    </td>
                </tr>
                    {foreach from=$products item=prod}
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="middle" class="catalog" width="250">
                            <a href="/catalog/{$prod.section_link}/{$prod.link}/"><img src="/images/products/{$prod.image}_small.jpg" border="0" alt="{$prod.title|stripslashes|strip_tags}"></a>
                        </td>
                        <td bgcolor="#ffffff" align="left" valign="middle" class="catalog" style="padding:3px 3px 3px 5px;">
                            <a href="/catalog/{$prod.section_link}/{$prod.link}/">{$prod.din|stripslashes|strip_tags}</a>
                        </td>
                        <td bgcolor="#ffffff" align="left" valign="middle" class="catalog" style="padding:3px 3px 3px 5px; ">
                            <a href="/catalog/{$prod.section_link}/{$prod.link}/">{$prod.title|stripslashes|strip_tags}</a>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        {/if}
            <div class="mTop20 fs13" style="padding-left: 3px;">
            {if $search_result==0}
                Ничего не найдено...
            {/if}
            </div>
        </div>
    </div>

    <div class="rightpanel">
    {include file='news/slider.tpl'}
        {include file='banners/show_items.tpl'}
    </div>
</div>
</div>
</div>

</div>
<div class="clear"></div>
