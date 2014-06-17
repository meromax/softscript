<br />
<center><span style="font-size:16px;">{$adminLangParams.SETTINGS_HEADER}</span></center>
<br />
<center>
<form method="POST" action="/admin/settings/update" name="settings_form">
<table width="90%">
<tr>
	<td>

		<div style="float:left; height: 200px; margin: 0px 40px 40px 0px;">
            <fieldset style="background: #f9f9f9; width: 320px; height: 195px;">
                <legend style="font-size: 12px; font-weight: bold; background: #f9f9f9; border: 1px solid #7A7A7A; padding: 5px;">{$adminLangParams.SETTINGS_EMAILS}</legend>
                <table>
                    <tr>
                        <td style="font-weight:bold; color:#595959;">
                        {$adminLangParams.SETTINGS_EMAIL1}:<br />
                            <input type="text" class="inp2" name="settings_email1" id="settings_email1" autocomplete=off value="{$admin_settings->settings_email1}" />
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; color:#595959;">
                        {$adminLangParams.SETTINGS_EMAIL2}:<br />
                            <input type="text" class="inp2" name="settings_email2" id="settings_email2" autocomplete=off value="{$admin_settings->settings_email2}" />
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; color:#595959;">
                        {$adminLangParams.SETTINGS_EMAIL3}:<br />
                            <input type="text" class="inp2" name="settings_email3" id="settings_email3" autocomplete=off value="{$admin_settings->settings_email3}" />
                        </td>
                    </tr>
                </table>
            </fieldset>
		</div>
        {*<div style="float:left; height: 200px; margin: 0px 40px 40px 0px;">*}
            {*<fieldset style="background: #f9f9f9; width: 320px; height: 195px;">*}
                {*<legend style="font-size: 12px; font-weight: bold; background: #f9f9f9; border: 1px solid #7A7A7A; padding: 5px;">Скидки на товары с учетом покупок</legend>*}
                {*<table>*}
                    {*<tr>*}
                        {*<td style="font-weight:bold; color:#595959;">*}

                        {*</td>*}
                    {*</tr>*}
                    {*<tr>*}
                        {*<td style="font-weight:bold; color:#595959;">*}
                            {*<table>*}
                                {*<tr>*}
                                    {*<td style="font-weight:bold; color:#595959;">*}
                                        {*БОЛЬШЕ <input type="text" class="inp2" name="settings_pcount1" id="settings_pcount1" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_pcount1}" /> ТОВАРОВ*}
                                        {*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka1" id="settings_skidka1" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka1}" /> %*}
                                    {*</td>*}
                                {*</tr>*}
                            {*</table>*}
                        {*</td>*}
                    {*</tr>*}
                    {*<tr>*}
                        {*<td style="font-weight:bold; color:#595959;">*}
                            {*<table>*}
                                {*<tr>*}
                                    {*<td style="font-weight:bold; color:#595959;">*}
                                        {*БОЛЬШЕ <input type="text" class="inp2" name="settings_pcount2" id="settings_pcount2" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_pcount2}" /> ТОВАРОВ*}
                                        {*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka2" id="settings_skidka2" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka2}" /> %*}
                                    {*</td>*}
                                {*</tr>*}
                            {*</table>*}
                        {*</td>*}
                    {*</tr>*}
                    {*<tr>*}
                        {*<td style="font-weight:bold; color:#595959;">*}
                            {*<table>*}
                                {*<tr>*}
                                    {*<td style="font-weight:bold; color:#595959;">*}
                                        {*БОЛЬШЕ <input type="text" class="inp2" name="settings_pcount3" id="settings_pcount3" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_pcount3}" /> ТОВАРОВ*}
                                        {*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka3" id="settings_skidka3" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka3}" /> %*}
                                    {*</td>*}
                                {*</tr>*}
                            {*</table>*}
                        {*</td>*}
                    {*</tr>*}
                    {*<tr>*}
                        {*<td style="font-weight:bold; color:#595959;">*}
                            {*<table>*}
                                {*<tr>*}
                                    {*<td style="font-weight:bold; color:#595959;">*}
                                        {*БОЛЬШЕ <input type="text" class="inp2" name="settings_pcount4" id="settings_pcount4" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_pcount4}" /> ТОВАРОВ*}
                                        {*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka4" id="settings_skidka4" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka4}" /> %*}
                                    {*</td>*}
                                {*</tr>*}
                            {*</table>*}
                        {*</td>*}
                    {*</tr>*}
                    {*<tr>*}
                        {*<td style="font-weight:bold; color:#595959;">*}
                            {*<table>*}
                                {*<tr>*}
                                    {*<td style="font-weight:bold; color:#595959;">*}
                                        {*БОЛЬШЕ <input type="text" class="inp2" name="settings_pcount5" id="settings_pcount5" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_pcount5}" /> ТОВАРОВ*}
                                        {*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka5" id="settings_skidka5" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka5}" /> %*}
                                    {*</td>*}
                                {*</tr>*}
                            {*</table>*}
                        {*</td>*}
                    {*</tr>*}
                {*</table>*}
            {*</fieldset>*}
        {*</div>*}

        <div style="float:left; height: 200px; margin: 0px 40px 40px 0px;">
            <fieldset style="background: #f9f9f9; width: 320px; height: 195px;">
                <legend style="font-size: 12px; font-weight: bold; background: #f9f9f9; border: 1px solid #7A7A7A; padding: 5px;">Скидки на товары с учетом покупок</legend>
                <table>
                    <tr>
                        <td style="font-weight:bold; color:#595959;">

                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; color:#595959;">
                            <table>
                                <tr>
                                    <td style="font-weight:bold; color:#595959;">
                                        БОЛЬШЕ <input type="text" class="inp2" name="settings_pprice1" id="settings_pprice1" style="width: 70px;" autocomplete=off value="{$admin_settings->settings_pprice1}" /> РУБ.
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka1" id="settings_skidka1" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka1}" /> %
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; color:#595959;">
                            <table>
                                <tr>
                                    <td style="font-weight:bold; color:#595959;">
                                        БОЛЬШЕ <input type="text" class="inp2" name="settings_pprice2" id="settings_pprice2" style="width: 70px;" autocomplete=off value="{$admin_settings->settings_pprice2}" /> РУБ.
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka2" id="settings_skidka2" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka2}" /> %
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; color:#595959;">
                            <table>
                                <tr>
                                    <td style="font-weight:bold; color:#595959;">
                                        БОЛЬШЕ <input type="text" class="inp2" name="settings_pprice3" id="settings_pprice3" style="width: 70px;" autocomplete=off value="{$admin_settings->settings_pprice3}" /> РУБ.
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka3" id="settings_skidka3" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka3}" /> %
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; color:#595959;">
                            <table>
                                <tr>
                                    <td style="font-weight:bold; color:#595959;">
                                        БОЛЬШЕ <input type="text" class="inp2" name="settings_pprice4" id="settings_pprice4" style="width: 70px;" autocomplete=off value="{$admin_settings->settings_pprice4}" /> РУБ.
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka4" id="settings_skidka4" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka4}" /> %
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; color:#595959;">
                            <table>
                                <tr>
                                    <td style="font-weight:bold; color:#595959;">
                                        БОЛЬШЕ <input type="text" class="inp2" name="settings_pprice5" id="settings_pprice5" style="width: 70px;" autocomplete=off value="{$admin_settings->settings_pprice5}" /> РУБ.
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka5" id="settings_skidka5" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka5}" /> %
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>

        <div style="float:left; height: 200px; margin: 0px 40px 40px 0px;">
            <fieldset style="background: #f9f9f9; width: 320px; height: 195px;">
                <legend style="font-size: 12px; font-weight: bold; background: #f9f9f9; border: 1px solid #7A7A7A; padding: 5px;">{$adminLangParams.SETTINGS_META_INFORMATION}</legend>
                <table>
                    <tr>
                        <td style="font-weight:bold; color:#595959;">
                            МЕТА-TITLE:<br />
                            <input type="text" class="inp2" style="width:300px;"  name="settings_meta_title" id="settings_meta_title" autocomplete=off value="{$admin_settings->settings_meta_title}" />
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; color:#595959;">
                            МЕТА-KEYWORDS:<br />
                            <input type="text" class="inp2" style="width:300px;" name="settings_meta_keywords" id="settings_meta_keywords" autocomplete=off value="{$admin_settings->settings_meta_keywords}" />
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; color:#595959;">
                            МЕТА-DESCRIPTION:<br />
                            <textarea name="settings_meta_description" id="settings_meta_description" style="width:300px; height:70px;">{$admin_settings->settings_meta_description}</textarea>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>

	</td>
	
	<td width="2%">&nbsp;</td>
	

</tr>
<tr>
	<td width="100%" colspan="3" align="center" style="padding-top:20px;">
		<input type="hidden" name="settings_id" id="settings_id" value="1" />
		<input type="button" class="input" value="{$adminLangParams.BUTTON_SAVE}" onclick="checkSettingsForm();">
	</td>
</tr>
</table>
</form>
</center>


<script type="text/javascript">
var message = '{$adminLangParams.NOTYFICATION_FIELDS_CHOULD_FILLED_CORRECTLY}';

{literal}
function checkSettingsForm(){
	var mail      = /^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
	var flag=0;
	var settings_price     = $("#settings_price").val();
	var settings_email1    = $("#settings_email1").val();
	var settings_email2    = $("#settings_email2").val();
	var settings_email3    = $("#settings_email3").val();

	var settings_roboxchange_username    = $("#settings_roboxchange_username").val();
	var settings_roboxchange_password    = $("#settings_roboxchange_password").val();

	if(settings_price==''||settings_email1==''||settings_email2==''||settings_email3==''||settings_roboxchange_username==''||settings_roboxchange_password==''){
		flag=1;
		alert(message);
	} else if(settings_email1.match(mail)==null||settings_email2.match(mail)==null||settings_email3.match(mail)==null){
		flag=1;
		alert(message);
	} 	
		
	if(flag==0){
		document.forms.settings_form.submit();
	}
}
{/literal}
</script>
