{*<pre><i class="icon-warning-sign"></i> Здесь необходимо заполнить все поля.</pre>*}

<p class="push-down-10">
    <label for="author">Название<span class="red-clr bold">*</span>:</label>
    <input type="text" id="title" name="title" value="{$item.title|stripslashes|strip_tags}" class="span6 m-wrap" placeholder="Введите название акции здесь..." onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();">
</p>

<p class="push-down-10">
    <label for="author">Ссылка:</label>
    <input type="text" id="link" name="link" value="{$item.link}" class="span6 m-wrap" placeholder="Здесь появиться ссылка в транслите после ввода названия акции..." readonly="readonly">
</p>

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
    <label for="author">Выберите город:</label>
    <select id="city" name="city" class="span2 m-wrap">
        <option value="0" {if 0==$item.city_id}selected="selected"{/if}>-- все города --</option>
        {foreach from=$cities item=city}
            <option value="{$city.id}" {if $city.id==$item.city_id}selected="selected"{/if}>{$city.title|stripslashes|strip_tags}</option>
        {/foreach}
    </select>
</p>

<p class="push-down-10">
    <label for="author">Тип сделки:</label>
    <select name="type" id="type" class="span2 m-wrap">
        <option value="0" {if $item.type==0}selected="selected"{/if}>Бесплатная</option>
        <option value="1" {if $item.type==1}selected="selected"{/if}>Чистая продажа</option>
        <option value="2" {if $item.type==2}selected="selected"{/if}>Договор комиссии</option>
    </select>
</p>

<p class="push-down-10">
    <label for="author">Статус акции:</label>
    <select name="status" id="status" class="span2 m-wrap">
        <option value="0" {if $item.type==0}selected="selected"{/if}>Отклонена модератором</option>
        <option value="1" {if $item.type==1}selected="selected"{/if}>На модерацию</option>
        <option value="2" {if $item.type==2}selected="selected"{/if}>Черновик</option>
        <option value="3" {if $item.type==3}selected="selected"{/if}>Активная</option>
    </select>
</p>

<p class="push-down-10">
    <label for="author">Главная акция:</label>
    <select id="main" name="main" class="span2 m-wrap">
        <option value="1" {if $item.main==1}selected="selected"{/if}>ДА</option>
        <option value="0" {if $item.main==0}selected="selected"{/if}>НЕТ</option>
    </select>
</p>