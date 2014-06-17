<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                {if $action == 'modifysection'}Изменение{else}Добавление{/if} раздела <small>&nbsp;</small>
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:void(0);">Акции</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/deals/sections/page/1">Разделы</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:void(0);">{if $action == 'modifysection'}Изменение{else}Добавление{/if} раздела</a>
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
                        <div class="caption">{if $action == 'modifysection'}<i class="icon-pencil"></i> Изменение{else}<i class="icon-plus"></i> Добавление{/if} раздела</div>
                    </div>
                    <div class="portlet-body form">
                        <div class="row-fluid">
                            <div class="span12">
                                <form method="POST" action="/admin/deals/{$action}" name="section_form" id="section_form" enctype="multipart/form-data">
                                    <input type="hidden" name="step" value="2">
                                    {if $item.id}
                                        <input type="hidden" name="id" value="{$item.id}">
                                    {/if}

                                    <div style="padding-left: 10px; padding-top: 10px;">

                                        <div class="control-group">
                                            <label class="control-label">Заголовок:</label>
                                            <div class="controls">
                                                <input type="text" name="title" id="title" value="{$item.title|stripslashes}" class="span6 m-wrap" onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Ссылка:</label>
                                            <div class="controls">
                                                <input type="text" name="link" id="link" readonly="readonly" value="{$item.link}" class="span6 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Короткое описание:</label>
                                            <div class="controls">
                                                <textarea name="description_short" class="ckeditor">{$item.description_short|stripslashes}</textarea>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Полное описание:</label>
                                            <div class="controls">
                                                <textarea name="description" class="ckeditor">{$item.description|stripslashes}</textarea>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Позиция:</label>
                                            <div class="controls">
                                                <input type="text" name="position" id="position" maxlength="3"  value="{$item.position|stripslashes}" class="span1 m-wrap" />
                                            </div>
                                        </div>

                                        {include file='admin/deals/meta.tpl'}

                                    </div>
                                    <div class="form-actions" style="padding-left: 20px;">
                                        <button type="button" class="btn blue" {if $action!='modifysection'} onclick="checkForm('')" {else} onclick="checkForm('modify')" {/if}><i class="icon-ok"></i> Сохранить</button>
                                        <button type="button" class="btn" onclick="document.location.href='/admin/deals/sections/page/1'"><i class="icon-undo"></i> Отмена</button>
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
        function checkForm(type){
            if(type==''){
                if ($("#title").val() == '') {
                    alert('Вы должны заподнить поле заголовок...');
                } else if ($("#position").val() == '') {
                    alert('Вы должны заподнить поле позиция...');
                } else {
                    document.forms.section_form.submit();
                }
            } else {
                if ($("#title").val() == '') {
                    alert('Вы должны заподнить поле заголовок...');
                } else if ($("#position").val() == '') {
                    alert('Вы должны заподнить поле позиция...');
                } else {
                    document.forms.section_form.submit();
                }
            }


        }
        function setLink(){
            var link = createLinkFromTitle($("#title").val());
            $("#link").val(link);
        }
    </script>
{/literal}