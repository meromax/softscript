<br />
<center><span style="font-size:16px;">{$adminLangParams.ORDERS__HEADER} -> {$adminLangParams.ORDERS__NUMBER2}{$order.id}</span></center>
<br />
<center>
    <form method="POST" action="/admin/orders/{$action}" name="order_form" enctype="multipart/form-data">
        <table border="0">
            <tr>
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
                        <td width="400" height="26">{$order.id}</td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__DATE_AND_TIME}:</td>
                        <td width="400" height="26">{$order.post_date}</td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__CLIENT_NAME}:</td>
                        <td width="400" height="26">
                            <input type="text" name="name" id="name" value="{$order.name|stripslashes|strip_tags}" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__CLIENT_EMAIL}:</td>
                        <td width="400" height="26">
                            <input type="text" name="email" id="email" value="{$order.email|stripslashes|strip_tags}" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__CLIENT_PHONE}:</td>
                        <td width="400" height="26">
                            <input type="text" name="phone" id="phone" value="{$order.phone|stripslashes|strip_tags}" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__COUNT}:</td>
                        <td width="400" height="26">{$order.cd_count|stripslashes|strip_tags}</td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__PRICE}:</td>
                        <td width="400" height="26">{$order.price|stripslashes|strip_tags}</td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__DOSTAVKA}:</td>
                        <td width="400" height="26">{$order.dostavka|stripslashes|strip_tags}</td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__TOTAL_PRICE}:</td>
                        <td width="400" height="26">{$order.total_price|stripslashes|strip_tags}</td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__COUNTRY}:</td>
                        <td width="400" height="26">
                            <input type="text" name="country" id="country" value="{$order.country|stripslashes|strip_tags}" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__CITY}:</td>
                        <td width="400" height="26">
                            <input type="text" name="city" id="city" value="{$order.city|stripslashes|strip_tags}" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__ZIP}:</td>
                        <td width="400" height="26">
                            <input type="text" name="zip" id="zip" value="{$order.zip|stripslashes|strip_tags}" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__ADDRESS}:</td>
                        <td width="400" height="26">
                            <input type="text" name="address" id="address" value="{$order.address|stripslashes|strip_tags}" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__COMMENT}:</td>
                        <td width="400" height="26">
                            <textarea name="comment" id="comment" style="width:398px; height: 100px;">{$order.comment|stripslashes|strip_tags}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__STATUS}:</td>
                        <td width="400" height="26">
                            <select name="status" id="status" style="width:110px;">
                                <option value="0" {if $order.status==0} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS0}</option>
                                <option value="1" {if $order.status==1} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS1}</option>
                                <option value="2" {if $order.status==2} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS2}</option>
                                <option value="3" {if $order.status==3} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS3}</option>
                                <option value="4" {if $order.status==4} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS4}</option>
                                <option value="5" {if $order.status==5} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS5}</option>
                                <option value="6" {if $order.status==6} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS6}</option>
                                <option value="7" {if $order.status==7} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS7}</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__HOST}:</td>
                        <td width="400" height="26">
                            <a href="{$order.host}" target="_blank">{$order.host}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">Action Pay:</td>
                        <td width="400" height="26">
                            <select name="action_pay" id="action_pay" style="width:60px;">
                                <option value="0" {if $order.action_pay==0}selected{/if}>NO</option>
                                <option value="1" {if $order.action_pay==1}selected{/if}>YES</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS__POST_NUMBER}:</td>
                        <td width="400" height="26">
                            <input type="text" name="post_number" id="post_number" value="{$order.post_number|stripslashes|strip_tags}" style="width:200px;" /> {if $order.post_number!=""}<a href="http://search.belpost.by/#{$order.post_number}" target="_blank">{$adminLangParams.ORDERS__LINK}</a>{/if}
                        </td>
                    </tr>
                </table>
                </td>

            </tr>
            <tr>
                <td colspan="2" class="header" align="center" height="60" style="background:none;">
                    <input type="hidden" name="page" id="page" value="{$page}" />
                    <input type="submit" class="input" value="{$adminLangParams.BUTTON_SAVE}">
                    <input type="button" class="input" value="{$adminLangParams.BUTTON_BACK}" onclick="document.location='/admin/orders/view/id/{$order.id}/page/{$page}'">
                </td>
            </tr>
        </table>
    </form>
</center>