{*<pre><i class="icon-warning-sign"></i> Здесь необходимо заполнить все поля.</pre>*}

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

<p class="push-down-10">
    <label for="author">Главный продукт</label>
    <select id="main" name="main" class="span2 m-wrap">
        <option value="1" {if $item.main==1}selected="selected"{/if}>ДА</option>
        <option value="0" {if $item.main==0}selected="selected"{/if}>НЕТ</option>
    </select>
</p>

<p class="push-down-10">
    <label for="author">Наименование товара<span class="red-clr bold">*</span>:</label>
    <input type="text" id="title" name="title" value="{$item.title|stripslashes|strip_tags}" class="span6 m-wrap" placeholder="Введите название вашего товара здесь..." onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();">
</p>

<p class="push-down-10">
    <label for="author">Ссылка<span class="red-clr bold">*</span>:</label>
    <input type="text" id="link" name="link" value="{$item.link}" class="span6 m-wrap" placeholder="Здесь появиться ссылка в транслите после ввода названия товара..." readonly="readonly">
</p>

<p class="push-down-10">
    <label for="author">Короткое описание<span class="red-clr bold">*</span>:</label>
    <textarea tabindex="4" id="description_short" name="description_short" rows="15" class="span6 m-wrap ckeditor" placeholder="Введите короткое описание здесь...">{$item.description_short|stripslashes}</textarea>
</p>

<p class="push-down-10">
    <label for="author">Полное описание<span class="red-clr bold">*</span>:</label>
    <textarea tabindex="4" id="description" name="description" rows="15" class="span6 m-wrap ckeditor" placeholder="Введите полное описание здесь...">{$item.description|stripslashes}</textarea>
</p>

<p class="push-down-10">
    <label for="author">Цена<span class="red-clr bold">*</span>:</label>
    <input type="text" id="price" name="price" value="{$item.price}" maxlength="7" class="span2 m-wrap" placeholder="Введите цену товара..." onkeyup="calculatePercents();">
</p>

<p class="push-down-10">
    <label for="author">Старая цена<span class="red-clr bold">*</span>:</label>
    <input type="text" id="old_price" name="old_price" value="{$item.old_price}" class="span2 m-wrap" maxlength="7" placeholder="Введите старую цену товара..." onkeyup="calculatePercents();">
</p>

<p class="push-down-10">
    <label for="author">Скидка в процентах:</label>
    <input type="text" id="discount" name="discount" value="{$item.discount}" readonly="readonly" maxlength="3" class="span2 m-wrap" style="text-align: center;" onclick="calculatePercents();">
</p>

<p class="push-down-10">
    <label for="author">Позиция<span class="red-clr bold">*</span>:</label>
    <input type="text" id="position" name="position" value="{$item.position} "maxlength="3" class="span2 m-wrap" style="text-align: center;" value="0">
</p>