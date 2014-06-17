<div class="content">

    <div class="centerpanel">
        <div class="title mB10 fs18 newstitle2">
            <strong>
                {$item.title|stripslashes|strip_tags}
            </strong>
        </div>
        <div class="title mB10 fs13">
        {include file='path.tpl'}
        </div>

        <div class="content_text mB15">
            {$item.text|stripslashes|replace:"&nbsp;":""}
        </div>
        <div style="width: 100%;" class="mTop20">
            <center>
            {include file='contact/form.tpl'}
            </center>
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