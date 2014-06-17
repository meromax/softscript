<div class="container-fluid">

<div class="row-fluid">
    <div class="span12">

        <h3 class="page-title">
            Статические страницы <small>&nbsp;</small>
        </h3>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="/admin">Главная</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="/admin/content">Статические страницы </a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="javascript:void(0);">{if $action == 'modifypage'}{$adminLangParams.STATICPAGES_MODIFY_STATIC_PAGE}{else}{$adminLangParams.STATICPAGES_ADD_STATIC_PAGE}{/if}</a>
            </li>
        </ul>

    </div>
</div>

<div id="dashboard">

    <div class="row-fluid ">
        <div class="span12">
            <!-- BEGIN INLINE TABS PORTLET-->
            <div class="portlet box grey">
                <div class="portlet-title">
                    <div class="caption">{if $action == 'modifypage'}<i class="icon-pencil"></i> {$adminLangParams.STATICPAGES_MODIFY_STATIC_PAGE}{else}<i class="icon-plus"></i> {$adminLangParams.STATICPAGES_ADD_STATIC_PAGE}{/if}</div>
                </div>
                <div class="portlet-body form">
                    <div class="row-fluid">
                        <div class="span12">
                            <form method="POST" action="/admin/content/{$action}" name="pages_form" enctype="multipart/form-data">
                                <input type="hidden" name="step" value="2">

                                {if $page.page_id}
                                    <input type="hidden" name="id" value="{$page.page_id}">
                                {/if}

                                <div style="padding-left: 10px; padding-top: 10px;">

                                    <div class="control-group">
                                        <label class="control-label">Заголовок:</label>
                                        <div class="controls">
                                            {if $page.type==0}
                                                <input type="text" name="title" id="title" value="{$page.title|stripslashes}" class="span6 m-wrap" onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();" />
                                            {else}
                                                <input type="text" name="title" id="title" value="{$page.title|stripslashes}" class="span6 m-wrap" />
                                            {/if}
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Ссылка:</label>
                                        <div class="controls">
                                            <input type="text" name="link" id="link" readonly="readonly" value="{$page.link}" class="span6 m-wrap" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Короткое описание:</label>
                                        <div class="controls">
                                            <textarea name="description_short" class="ckeditor">{$page.description_short|stripslashes}</textarea>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Полное описание:</label>
                                        <div class="controls">
                                            <textarea name="text" class="ckeditor">{$page.text|stripslashes}</textarea>
                                        </div>
                                    </div>

                                    {include file='admin/content/meta.tpl'}

                                </div>
                                <div class="form-actions" style="padding-left: 20px;">
                                    <button type="button" class="btn blue" onclick="{if $action == 'modifypage'}checkForm('{$page.page_id}');{else}checkForm(0);{/if}"><i class="icon-ok"></i> Сохранить</button>
                                    <button type="button" class="btn" onclick="document.location.href='/admin/content'"><i class="icon-undo"></i> Отмена</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END INLINE TABS PORTLET-->
        </div>
    </div>

</div>

</div>

{literal}
<script>

    function setLink(){
        var link = createLinkFromTitle($("#title").val());
        $("#link").val(link+'.html');
    }
	
	function checkForm(modify_id){

		var title = document.getElementById('title');
		var link  = document.getElementById('link');

		if ($("#title").val() == '') {
            customAlertBox("Вы должны заполнить поле Заголовок");
		} else {
			if(modify_id){
				var url = "page_link="+$("#link").val()+"&modify_id="+modify_id;
			} else {
				var url = "page_link="+$("#link").val();
			}
            customLoaderBox('Проверка данных...');
			$.ajax({
			type: "POST",
			url: "/admin/content/checkexistpagelink",
			data: url,
			success: function(msg){
				if(msg==1){
					setTimeout(function() { 
						   $("#progress").hide();
					    }, 2000);
                    customAlertBox("Такая ссылка уже существует.");
				} else {
                    customLoaderBoxSetMessage('Идет сохранение данных...');
					document.forms.pages_form.submit();
				}
			}
			});
		}
	}
</script>
{/literal}