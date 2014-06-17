{*<div style="height: 330px; overflow: auto;">*}
<div>

{if $productsRecommended}
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="text-align: center;">Картинка</th>
            <th>Наименование товара</th>
            <th style="text-align: center;">Действия</th>
        </tr>
        </thead>
        <tbody>

            {foreach from=$productsRecommended item=pr}

                <tr id="prCon{$pr.id}">
                    <td style="text-align: center; vertical-align: middle; width: 88px;">
                        <img src="/images/products/{$pr.image}_small.jpg" width="88" height="62">
                    </td>
                    <td style="text-align: center; vertical-align: middle">
                        {$pr.title|stripslashes|strip_tags}
                    </td>

                    <td style="text-align: center; padding-top: 23px; vertical-align: middle;">
                        <button type="button" class="btn btn-success push-down-10" onclick="addPR('{$pr.id}');">Добавить</button>
                    </td>
                </tr>

            {/foreach}

        </tbody>
    </table>
{else}
    <div style="text-align: center;" id="sLoader">
        Пока ничего не найдено...
    </div>
{/if}
</div>


