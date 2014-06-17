<input type="hidden" name="recommendedIds" id="recommendedIds" value="{$recommendedIds}" />
<div style="min-height: 10px;" id="mainPRSCon">
    {foreach from=$productsRecommendedSelected item=prs}

        <div class="pr_elem_sel" class="push-down-10 span12" id="prConSel{$prs.id}">

            <table class="table table-bordered">
                <tbody>
                <tr id="prCon{$pr.id}">
                    <td style="text-align: center; vertical-align: middle; width: 88px;">
                        <img src="/images/products/{$prs.image}_small.jpg" width="88" height="62">
                    </td>
                    <td style="text-align: center; vertical-align: middle">
                        {$prs.title|stripslashes|strip_tags}
                    </td>

                    <td style="text-align: center; padding-top: 23px;  vertical-align: middle;" class="span1">
                        <button type="button" class="btn btn-danger push-down-10" onclick="delPR('{$prs.id}');">Удалить</button>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
    {/foreach}
</div>


{*<div id="mainPRSCon">*}
    {*{if $productsRecommendedSelected}*}
        {*<table class="table table-bordered">*}
            {*<thead>*}
            {*<tr>*}
                {*<th style="text-align: center;">Картинка</th>*}
                {*<th>Наименование товара</th>*}
                {*<th style="text-align: center;">Действия</th>*}
            {*</tr>*}
            {*</thead>*}
            {*<tbody>*}

            {*{foreach from=$productsRecommendedSelected item=prs}*}

                {*<tr id="prConSel{$prs.id}">*}
                    {*<td style="text-align: center; vertical-align: middle; width: 88px;">*}
                        {*<img src="/images/products/{$prs.image}_small.jpg" width="88" height="62">*}
                    {*</td>*}
                    {*<td style="text-align: center; vertical-align: middle">*}
                        {*{$prs.title|stripslashes|strip_tags}*}
                    {*</td>*}

                    {*<td style="text-align: center; padding-top: 23px; vertical-align: middle;">*}
                        {*<button type="button" class="btn btn-success push-down-10" onclick="delPR('{$prs.id}');">Удалить</button>*}
                    {*</td>*}
                {*</tr>*}

            {*{/foreach}*}

            {*</tbody>*}
        {*</table>*}
    {*{else}*}
        {*<div style="text-align: center;" id="sLoader">*}
            {*Пока ничего не выбрано...*}
        {*</div>*}
    {*{/if}*}
{*</div>*}