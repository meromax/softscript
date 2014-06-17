<div class="staticPageBox">
    <div class="pageTitle">{$content.title|stripslashes|strip_tags}</div>
    <div class="pageText">
        {$content.text|stripslashes}
    </div>

    <div class="documents">
        {foreach key=dkey from=$documents item=item}
            <a href="/admin/files/getfile/id/{$item.id}" title="Нажмите, чтобы скачать...">
            <div class="item">
                <table>
                    <tr>
                        <td valign="middle">
                            <img src="/images/icons/{$item.file_ext}.png" align="left" />
                        </td>
                        <td valign="middle">
                            {$item.title}
                        </td>
                    </tr>
                </table>
            </div>
            </a>
            {*<div style="clear: both;"></div>*}
        {/foreach}
    </div>
</div>