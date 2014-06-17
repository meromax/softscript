<link rel="stylesheet" type="text/css" href="/css/scrollable-horizontal.css" />
<link rel="stylesheet" type="text/css" href="/css/scrollable-buttons.css" />
<div class="news" style="height:173px;">
    <div class="title">
        <strong>НОВОСТИ</strong>
        <a class="next browse right"></a>
        <a class="prev browse left"></a>
        <div class="clear"></div>
    </div>
    <div class="newscontent" style="position:absolute;">
        <div class="scrollable" id="scrollable">
            <div class="items">
                {foreach from=$rightNews item=new}
                <div>
                    <div class="newsdate">{$new.new_date|date_format:"%d.%m.%Y"}</div>
                    <div class="newstitle">
                        <a href="/new{$new.new_id}.html">
                            {$new.new_title_up|stripslashes|strip_tags}
                        </a>
                    </div>
                    <div class="newstext">
                        <a href="/new{$new.new_id}.html">
                            {$new.new_description_short|stripslashes|strip_tags}
                        </a>
                    </div>
                </div>
                {/foreach}
            </div>
        </div>
    </div>
</div>
<div class="title2">
    <a href="/news.html">ВСЕ НОВОСТИ</a>
</div>
{literal}
<script>
    $(function() {
        // initialize scrollable
        $(".scrollable").scrollable({circular: true}).navigator().autoscroll({
            interval: 4000
        });
    });
</script>
{/literal}
