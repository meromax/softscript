<div class="staticPageBox reviewListBox">
    <div class="pageTitle"><a href="/deals/page/1">Горячие предложения</a></div>
    <div class="pageText reviewListBox">
        <div class="item" style=" border-top:0px;">
            <div class="name">{$item.title|stripslashes|strip_tags}</div>
            <div class="date">{$item.post_date|date_format:"%d.%m.%Y"}</div>
            <div class="text">{$item.description|stripslashes}</div>
        </div>
    </div>
</div>