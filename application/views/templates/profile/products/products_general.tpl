{*<pre><i class="icon-warning-sign"></i> Здесь необходимо заполнить все поля.</pre>*}

<p class="push-down-10">
    <label for="author">Выберите раздел<span class="red-clr bold">*</span>:</label>
    <select id="section" name="section" onchange="getCategories('{$item.category_id}');">
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
    <select id="main" name="main">
        <option value="1" {if $item.main==1}selected="selected"{/if}>ДА</option>
        <option value="0" {if $item.main==0}selected="selected"{/if}>НЕТ</option>
    </select>
</p>

<p class="push-down-10">
    <label for="author">Наименование товара<span class="red-clr bold">*</span>:</label>
    <input type="text" id="title" name="title" value="{$item.title|stripslashes|strip_tags}" class="span7" placeholder="Введите название вашего товара здесь..." onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();">
</p>

<p class="push-down-10">
    <label for="author">Ссылка<span class="red-clr bold">*</span>:</label>
    <input type="text" id="link" name="link" value="{$item.link}" class="span7" placeholder="Здесь появиться ссылка в транслите после ввода названия товара..." readonly="readonly">
</p>

<p class="push-down-10">
    <label for="author">Короткое описание:</label>
    <input type="text" id="addinfo" name="addinfo" value="{$item.addinfo|strip_tags|stripslashes}"  class="span7" placeholder="Введите короткое описание здесь...">
</p>

<p class="push-down-10">
    <label for="author">Полное описание<span class="red-clr bold">*</span>:</label>
    <textarea tabindex="4" id="description" name="description" rows="10" class="span7 ckeditor" placeholder="Введите полное описание здесь...">{$item.description|stripslashes}</textarea>
</p>

<p class="push-down-10">
    <label for="author">Цена<span class="red-clr bold">*</span>:</label>
    <input type="text" id="price" name="price" value="{$item.price}" maxlength="7" placeholder="Введите цену товара..." onkeyup="calculatePercents();">
</p>

<p class="push-down-10">
    <label for="author">Старая цена<span class="red-clr bold">*</span>:</label>
    <input type="text" id="old_price" name="old_price" value="{$item.old_price}" maxlength="7" placeholder="Введите старую цену товара..." onkeyup="calculatePercents();">
</p>

<p class="push-down-10">
    <label for="author">Скидка в процентах:</label>
    <input type="text" id="discount" name="discount" value="{$item.discount}" readonly="readonly" maxlength="3" class="span1" style="text-align: center;" onclick="calculatePercents();">
</p>

<p class="push-down-10">
    <label for="author">Позиция<span class="red-clr bold">*</span>:</label>
    <input type="text" id="position" name="position" value="{$item.position} "maxlength="3" class="span1" style="text-align: center;" value="0">
</p>