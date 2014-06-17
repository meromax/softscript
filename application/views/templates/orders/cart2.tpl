<div class="clearfix">
    <div class="actions">
        <ul class="prod_list">
            <li><a class="p1" href="/catalog/{$section1.link|strip_tags}/">{$section1.title|strip_tags|stripslashes}</a></li>
            <li><a class="p2" href="/catalog/{$section2.link|strip_tags}/">{$section2.title|strip_tags|stripslashes}</a></li>
        </ul>
        {include file='leftBanners.tpl'}
    </div>
    <div class="cnt">
        <div class="breadcr"><a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;Процесс оплаты</div>
        <h3>Ваша корзина</h3>
        <div class="content">
            <table class="user">
                <tbody>
                <tr><td class="red">№</td><td class="red">Изображение</td><td class="red">Название</td><td class="red">Цена (руб.)</td><td class="red">Кол-во (шт)</td><td class="red">Стоимость (руб.)</td><td>&nbsp;</td></tr>
                <tr><td colspan="7"></td></tr>

                {foreach key=key from=$cart item=prod}
                    <tr class="gr">
                        <td>{$key+1}.</td>
                        <td><img src="/images/products/{$prod.image}_small.jpg" height="79"></td>
                        <td>{$prod.title|stripslashes|strip_tags}</td>
                        <td>{$prod.price|stripslashes|strip_tags}</td>
                        <td style="text-align: center!important;">{$prod.count|stripslashes|strip_tags}</td>
                        <td>{$prod.total_price|stripslashes|strip_tags}</td>
                    </tr>
                    <tr><td colspan="7"></td></tr>
                {/foreach}

                <tr>
                    <td colspan="6" style="font-size:18px;text-align:right;vertical-align:top;">к оплате: <b class="sum">{$roboData.out_summ} руб.</b></td>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="padding-top:20px;text-align:right;">
                        <form action='{$roboData.url}' method=post>
                            <input type=hidden name=MrchLogin value={$roboData.mrh_login}>
                            <input type=hidden name=OutSum value={$roboData.out_summ}>
                            <input type=hidden name=InvId value={$roboData.inv_id}>
                            <input type=hidden name=Desc value='{$roboData.inv_desc}'>
                            <input type=hidden name=SignatureValue value={$roboData.crc}>
                            <input type=hidden name=Shp_item value='{$roboData.shp_item}'>
                            <input type=hidden name=IncCurrLabel value={$roboData.in_curr}>
                            <input type=hidden name=Culture value={$roboData.culture}>
                            <input type="hidden" name="status" id="status" value="0" />
                            <input type="submit" class="blue_btn" value="Оплатить"  style="margin-right:0px; cursor: pointer;">
                        </form>
                    </td>
                    <td>

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>