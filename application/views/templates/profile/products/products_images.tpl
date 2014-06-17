{if $item.image!=""}

    <div class="underlined push-down-20">
        <h3><span class="light">Список</span> картинок</h3>
    </div>
    {foreach from=$item.images item=pimage}
        {if $pimage.main==1}
            <div class="pr_elem_sel" class="push-down-10 span12" id="imageDataCon{$pimage.id}">

                <table class="table table-bordered" id="innerImageDataCon{$pimage.id}" style="border:1px solid #9dcc41;">
                    <tbody>
                    <tr id="prCon{$pr.id}">
                        <td style="text-align: center; vertical-align: middle; width: 55px;">
                            <img src="/images/products/{$pimage.image}_square.jpg?time={$smarty.now}" width="55" height="55">
                        </td>
                        <td style="text-align: center; vertical-align: middle">
                            {$pimage.title|stripslashes|strip_tags}
                        </td>

                        <td style="text-align: center; vertical-align: middle; padding-top: 10px;" class="span4" id="setLink{$pimage.id}">
                            <h4>Главная <span class="light">картинка</span></h4>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>

        {else}

            <div class="pr_elem_sel" class="push-down-10 span12" id="imageDataCon{$pimage.id}">

                <table class="table table-bordered" id="innerImageDataCon{$pimage.id}">
                    <tbody>
                    <tr id="prCon{$pr.id}">
                        <td style="text-align: center; vertical-align: middle; width: 55px;">
                            <img src="/images/products/{$pimage.image}_square.jpg?time={$smarty.now}" width="55" height="55">
                        </td>
                        <td style="text-align: center; vertical-align: middle">
                            {$pimage.title|stripslashes|strip_tags}
                        </td>

                        <td style="text-align: center; padding-top: 23px;  vertical-align: middle;" class="span4" id="setLink{$pimage.id}">
                            <button type="button" class="btn btn-success push-down-10" onclick="setMainImageStatus({$pimage.id},{$item.id});">Сделать главной</button>
                            <button type="button" class="btn btn-danger push-down-10" onclick="delImage({$pimage.id});">Удалить</button>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>

        {/if}
    {/foreach}
{/if}




<div class="underlined push-down-20">
    <h3><span class="light">Загрузка</span> картинок</h3>
</div>

<table class="table table-bordered">
    <thead>
    <tr>
        <th style="text-align: center;">#</th>
        <th>Название для картинки</th>
        <th style="text-align: center;">Действия</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="text-align: center; vertical-align: middle;">
            1
        </td>
        <td style="text-align: center; padding-top: 15px;">
            <input type="text" name="image_title1" id="image_title1" class="span4" />
        </td>

        <td style="text-align: center; padding-top: 15px;">

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new">Выберите картинку</span>
                        <span class="fileupload-exists">Выберите картинку</span>
                        <input type="file" class="default" name="image1" id="image1" />
                    </span>
                </div>
            </div>

        </td>
    </tr>

    <tr>
        <td style="text-align: center; vertical-align: middle;">
            2
        </td>
        <td style="text-align: center; padding-top: 15px;">
            <input type="text" name="image_title2" id="image_title2" class="span4" />
        </td>

        <td style="text-align: center; padding-top: 15px;">

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new">Выберите картинку</span>
                        <span class="fileupload-exists">Выберите картинку</span>
                        <input type="file" class="default" name="image2" id="image2" />
                    </span>
                </div>
            </div>

        </td>
    </tr>

    <tr>
        <td style="text-align: center; vertical-align: middle;">
            3
        </td>
        <td style="text-align: center; padding-top: 15px;">
            <input type="text" name="image_title3" id="image_title3" class="span4" />
        </td>

        <td style="text-align: center; padding-top: 15px;">

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new">Выберите картинку</span>
                        <span class="fileupload-exists">Выберите картинку</span>
                        <input type="file" class="default" name="image3" id="image3" />
                    </span>
                </div>
            </div>

        </td>
    </tr>

    <tr>
        <td style="text-align: center; vertical-align: middle;">
            4
        </td>
        <td style="text-align: center; padding-top: 15px;">
            <input type="text" name="image_title4" id="image_title4" class="span4" />
        </td>

        <td style="text-align: center; padding-top: 15px;">

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new">Выберите картинку</span>
                        <span class="fileupload-exists">Выберите картинку</span>
                        <input type="file" class="default" name="image4" id="image4" />
                    </span>
                </div>
            </div>

        </td>
    </tr>

    <tr>
        <td style="text-align: center; vertical-align: middle;">
            5
        </td>
        <td style="text-align: center; padding-top: 15px;">
            <input type="text" name="image_title5" id="image_title5" class="span4" />
        </td>
        <td style="text-align: center; padding-top: 15px;">

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new">Выберите картинку</span>
                        <span class="fileupload-exists">Выберите картинку</span>
                        <input type="file" class="default" name="image5" id="image5" />
                    </span>
                </div>
            </div>

        </td>
    </tr>


    </tbody>
</table>