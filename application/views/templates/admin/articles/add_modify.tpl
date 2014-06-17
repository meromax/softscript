<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Статьи <small>&nbsp;</small>
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/articles/page/1">Статьи</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:void(0);">{if $action == 'modify'}Изменение{else}Добавление{/if} статьи</a>
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
                        <div class="caption">{if $action == 'modify'}<i class="icon-pencil"></i> Изменение{else}<i class="icon-plus"></i> Добавление{/if} статьи</div>
                    </div>
                    <div class="portlet-body form">
                        <div class="row-fluid">
                            <div class="span12">
                                <form method="POST" action="/admin/articles/{$action}" name="article_form" id="article_form" enctype="multipart/form-data">
                                    <input type="hidden" name="step" value="2">
                                    {if $item.id}
                                        <input type="hidden" name="article_id" value="{$item.id}">
                                    {/if}

                                    <div style="padding-left: 10px; padding-top: 10px;">


                                        <p class="push-down-10">
                                            <label for="author">Выберите раздел<span class="red-clr bold">*</span>:</label>
                                            <select id="section" name="section" class="span2 m-wrap" onchange="getCategories('{$item.category_id}');">
                                                {foreach from=$sections item=sec}
                                                    <option value="{$sec.id}" {if $sec.id==$item.section_id}selected="selected"{/if}>{$sec.title|stripslashes|strip_tags}</option>
                                                {/foreach}
                                            </select>
                                            <input type="hidden" name="category" value="0" />
                                        </p>

                                        <p class="push-down-10">
                                            <label for="author">Укажите категорию:</label>
                                            <span id="categories_container">
                                                <!-- here will categories list -->
                                            </span>
                                        </p>

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

                                        {include file='admin/articles/meta.tpl'}

                                    </div>
                                    <div class="form-actions" style="padding-left: 20px;">
                                        <button type="button" class="btn blue" {if $action!='modify'} onclick="checkForm('')" {else} onclick="checkForm('modify')" {/if}><i class="icon-ok"></i> Сохранить</button>
                                        <button type="button" class="btn" onclick="document.location.href='/admin/articles/page/1'"><i class="icon-undo"></i> Отмена</button>
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


<script>
    {literal}
    function setLink(){
        var link = createLinkFromTitle($("#title").val());
        $("#link").val(link+'.html');
    }

    function checkForm(type){
        if(type==''){
            if ($("#section").val() == 0) {
                alert('Вы должны указать раздел.');
            } else if ($("#title").val() == '') {
                alert('Заполните поле "Заголовок"');
            } else {
                $("#article_form").submit();
            }
        } else {
            if ($("#section").val() == 0) {
                alert('Вы должны указать раздел.');
            } else if ($("#title").val() == '') {
                alert('Заполните поле "Заголовок"');
            } else {
                $("#article_form").submit();
            }
        }
    }

    function getCategories(categoryId){
        var sectionId = $("#section").val();
        $("#categories_container").html("<img src='/images/loading.gif'>");
        $.post("/admin/articles/ajax-get-categories", {section_id:sectionId, category_id:categoryId},
                function(data) {
                    if(data!=''){
                        $("#categories_container").html(data);
                    }
                }
        );
    }
    {/literal}
    getCategories({$item.category_id});
</script>
