<div class="content">
    <div class="centerpanel">
        <div class="title mB10 fs18 newstitle2">
            <strong>
                {$item.title|stripslashes|strip_tags}
            </strong>
            <br />
            <span style="color: #5d5d5d; font-size: 10px;">{$item.new_date|date_format:"%d.%m.%Y, %M:%S"}</span>
        </div>

        <div class="content_text mB15">
            {$item.text|stripslashes|replace:"&nbsp;":""}
        </div>
    </div>

    <div class="rightpanel">
    {include file='news/slider.tpl'}
        {include file='banners/show_items.tpl'}
    </div>
</div>
</div>
</div>

</div>
<div class="clear"></div>
{literal}
<script type="text/javascript">
    setTimeout(function () { document.location.href='/order-online/'; }, 5000);
</script>
{/literal}