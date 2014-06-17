<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Новости <small>&nbsp;</small>
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/news/page/1">Новости </a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:void(0);">{if $action == 'modify'}{$adminLangParams.NEWS_MODIFY_NEW}{else}{$adminLangParams.NEWS_ADD_NEW}{/if}</a>
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
                        <div class="caption">{if $action == 'modify'}<i class="icon-pencil"></i> {$adminLangParams.NEWS_MODIFY_NEW}{else}<i class="icon-plus"></i> {$adminLangParams.NEWS_ADD_NEW}{/if}</div>
                    </div>
                    <div class="portlet-body form">
                        <div class="row-fluid">
                            <div class="span12">
                                <form method="POST" action="/admin/news/{$action}" name="news_form" enctype="multipart/form-data">
                                    <input type="hidden" name="step" value="2">
                                    {if $new.new_id}
                                        <input type="hidden" name="new_id" value="{$new.new_id}">
                                    {/if}

                                    <div style="padding-left: 10px; padding-top: 10px;">

                                        <div class="control-group">
                                            <label class="control-label">Заголовок:</label>
                                            <div class="controls">
                                                <input type="text" name="title" id="title" value="{$new.new_title|stripslashes}" class="span6 m-wrap" onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Ссылка:</label>
                                            <div class="controls">
                                                <input type="text" name="link" id="link" readonly="readonly" value="{$new.link}" class="span6 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Короткое описание:</label>
                                            <div class="controls">
                                                <textarea name="description_short" class="ckeditor">{$new.new_description_short|stripslashes}</textarea>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Полное описание:</label>
                                            <div class="controls">
                                                <textarea name="description" class="ckeditor">{$new.new_description|stripslashes}</textarea>
                                            </div>
                                        </div>

                                        {include file='admin/news/meta.tpl'}

                                    </div>
                                    <div class="form-actions" style="padding-left: 20px;">
                                        <button type="button" class="btn blue" {if $action!='modify'} onclick="checkForm('')" {else} onclick="checkForm('modify')" {/if}><i class="icon-ok"></i> Сохранить</button>
                                        <button type="button" class="btn" onclick="document.location.href='/admin/news/page/1'"><i class="icon-undo"></i> Отмена</button>
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

        function checkForm(type){
            var title    = document.getElementById('title').value;
            //var ChekStr = document.getElementById('upload_id').value;


            if(type==''){
                if (title == '') {
                    alert('You must fill the title field.');
                } else {
                    document.forms.news_form.submit();
                }
            } else {
                if (title == '') {
                    alert('You must fill the title field.');
                } else {
                    document.forms.news_form.submit();
                }
            }
        }

    </script>
{/literal}