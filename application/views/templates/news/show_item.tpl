<div class="staticPageBox">
    <div class="pageTitle"><a href="/news/page/1">Новости</a></div>
    <div class="pageText">
        <div class="reviewListBox">

            <div class="item" style=" border-top:0px;">
                <div class="name">{$item.new_title|stripslashes|strip_tags}</div>
                <div class="date">{$item.new_date|date_format:"%d.%m.%Y"}</div>
                <div class="text">{$item.new_description|stripslashes}</div>
            </div>

        </div>
    </div>
</div>