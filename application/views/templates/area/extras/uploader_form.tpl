<div id="form">

 <form enctype="multipart/form-data" {literal} method='post' action="/api/imgup/upload" target="uploader" onsubmit="if(document.getElementById('image').value != '') {showPreloader(); return true;}else{return false;}">{/literal}
                                    <div class="tools_full">
                                    <span style="font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#455fff;">{if $type !='back'}Default Image:{else}Background{/if}</span><input type="file" name="image" style="margin:0 0 0 20px; width:160px; padding:2px 3px;" class="file"/>
                                    <table cellpadding="0" cellspacing="0" style="margin:11px 0 0 0;">
                                        <tr>
                                            <td class="img"><img
                                                {if $type !='back'} 
                                                {if $info.default_image == ''}src="images/no_image.jpg"{else}src="/images/users/{$step}/small_{$info.default_image}.jpg?rnd={$random}"{/if}
                                                {else}
                                                {if $info.def_background == ''}src="images/no_image.jpg"{else}src="/images/users/{$step}/back_{$info.def_background}.jpg?rnd={$random}"{/if}
                                                {/if} 
                                              alt="No Image" /></td>
                                            <td style="width:161px; padding:0 0 0 12px;">
                                                <!-- <input type="button" value="Browse" style="background:#E3E3E3; color:#6D6D6D; font-weight:bold; width:auto; font-size:11px; border:1px solid #C2C2C2; padding:0 3px; float:right; cursor:pointer;"/> -->
                                                <p style="clear:both; padding:13px 0; margin:0;">Browse your new default photo or replace current one</p>
                                                <input type="submit" value="Upload" style="background:#E3E3E3; color:#6D6D6D; font-weight:bold; width:auto; font-size:11px; border:1px solid #C2C2C2; padding:0 3px; float:right; cursor:pointer;" />
                                                <input type="hidden" name="type" value="{$type}">
                                                <input type="hidden" name="step" value="{$step}">
                                            </td>
                                        </tr>
                                    </table>
                                    </div> 
                                </form>
</div>
                                
<script>
    window.top.document.getElementById('{$type}').innerHTML = document.getElementById('form').innerHTML;
    window.top.hidePreloader();
</script>