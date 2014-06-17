<div class="darker-stripe blocks-spacer more-space latest-news with-shadows">
    <div class="container">

        <!--  ==========  -->
        <!--  = Title =  -->
        <!--  ==========  -->
        <div class="row">
            <div class="span12">
                <div class="main-titles center-align">
                    <h2 class="title">
                        <span class="clickable icon-chevron-left" id="tweetsLeft"></span> &nbsp;&nbsp;&nbsp;
                        <span class="light">Последние</span> Новости &nbsp;&nbsp;&nbsp;
                        <span class="clickable icon-chevron-right" id="tweetsRight"></span>
                    </h2>
                </div>
            </div>
        </div> <!-- /title -->

        <!--  ==========  -->
        <!--  = News content =  -->
        <!--  ==========  -->
        <div class="row">
            <div class="span12">
                <div class="carouFredSel" data-nav="tweets" data-autoplay="false">

                    {foreach key=nKey from=$latestNews item=new}

                        <!-- Slide -->
                        <div class="slide">
                            <div class="row">
                                <div class="span1">&nbsp;</div>
                                <div class="span10">
                                    <div class="news-item" style="min-height: 120px; max-height: 120px;">
                                        <div class="published">{$new.new_date|date_format:"%d-%m-%Y"}</div>
                                        <h6><a href="javascript:void(0);">{$new.new_title|stripslashes|strip_tags}</a></h6>
                                        <p>
                                            {$new.new_description_short|stripslashes}
                                        </p>
                                    </div>
                                </div>
                                <div class="span1">&nbsp;</div>
                            </div>
                        </div>
                        <!-- /Slide -->

                    {/foreach}

                </div>
            </div>
        </div> <!-- /news content -->
    </div>
</div>


{*{foreach from=$lastnews item=item}*}
    {*<div class="news_box">*}
        {*<a href="/new{$item.new_id}.html">{$item.new_title|stripslashes|strip_tags}</a>*}
        {*<br />*}
        {*{$item.new_description|stripslashes|strip_tags|replace:"&nbsp;":""|truncate:150}*}
    {*</div>*}
{*{/foreach}*}