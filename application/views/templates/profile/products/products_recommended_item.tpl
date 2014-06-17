<div class="pr_elem_sel" class="push-down-10 span12" id="prConSel{$prs.id}">

    <table class="table table-bordered">
        <tbody>
            <tr id="prCon{$pr.id}">
                <td style="text-align: center; vertical-align: middle; width: 88px;">
                    <img src="/images/products/{$prs.image}_small.jpg" width="88" height="62">
                </td>
                <td style="text-align: center; vertical-align: middle">
                    {$prs.title|stripslashes|strip_tags}
                </td>

                <td style="text-align: center; padding-top: 11px;  vertical-align: middle;" class="span1">
                    <button type="button" class="btn btn-danger push-down-10" onclick="delPR('{$prs.id}');">Удалить</button>
                </td>
            </tr>
        </tbody>
    </table>

</div>
