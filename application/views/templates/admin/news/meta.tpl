<div class="portlet box yellow" style="margin-top: 20px;">

    <div class="caption" style="padding: 5px 5px 5px 15px;">META ИНФОРМАЦИЯ</div>

    <div class="portlet-body" style="padding-top: 20px; padding-left: 20px;">

        <div class="control-group">
            <label class="control-label">{$adminLangParams.META_TITLE}:</label>
            <div class="controls">
                <input type="text" name="meta_title" id="meta_title" value="{$new.meta_title|stripslashes}" class="span6 m-wrap" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">МЕТА описание:</label>
            <div class="controls">
                <input type="text" name="meta_description" id="meta_description" value="{$new.meta_description|stripslashes}" class="span6 m-wrap" />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">МЕТА ключевые слова:</label>
            <div class="controls">
                <input type="text" name="meta_keywords" id="meta_keywords" value="{$new.meta_keywords|stripslashes}" class="span6 m-wrap" />
            </div>
        </div>
    </div>
</div>