{if $item.files}
<div class="underlined push-down-20">
    <h3><span class="light">Список</span> файлов</h3>
</div>
{/if}
{foreach from=$item.files item=pfile}

    <div class="pr_elem_sel" class="push-down-10 span12" id="fileCon{$pfile.id}">

        <table class="table table-bordered">
            <tbody>
            <tr>
                <td style="text-align: center; vertical-align: middle; width: 55px;">
                    {*<img src="/images/products/{$pimage.image}_square.jpg?time={$smarty.now}" width="55" height="55">*}
                    <div style="width: 55px; height: 55px; text-align: center; font-size: 10px; ">Здесь будет тип файла</div>
                </td>
                <td style="text-align: center; vertical-align: middle">
                    {$pfile.title|stripslashes|strip_tags}
                </td>

                <td style="text-align: center; padding-top: 23px;  vertical-align: middle;" class="span4" id="setLink{$pfile.id}">
                    <a href="/admin/products/get-file/id/{$pfile.id}" class="btn btn-success push-down-10">Скачать</a>
                    <a href="javascript:void(0)" onclick="delFile({$pfile.id});" class="btn btn-danger push-down-10">Удалить</a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

{/foreach}

<div class="underlined push-down-20">
    <h3><span class="light">Загрузка</span> фалов</h3>
</div>

<table class="table table-bordered">
    <thead>
    <tr>
        <th style="text-align: center;">#</th>
        <th>Название для файла</th>
        <th style="text-align: center;">Действия</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="text-align: center; vertical-align: middle;">
            1
        </td>
        <td style="text-align: center; padding-top: 15px;">
            <input type="text" name="file_title1" id="file_title1" class="span4" />
        </td>
        <td style="text-align: center; padding-top: 15px;">

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new">Выберите файл</span>
                        <span class="fileupload-exists">Выберите файл</span>
                        <input type="file" class="default" name="file1" id="file1" />
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
            <input type="text" name="file_title2" id="file_title2" class="span4" />
        </td>

        <td style="text-align: center; padding-top: 15px;">

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new">Выберите файл</span>
                        <span class="fileupload-exists">Выберите файл</span>
                        <input type="file" class="default" name="file2" id="file2" />
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
            <input type="text" name="file_title3" id="file_title3" class="span4" />
        </td>

        <td style="text-align: center; padding-top: 15px;">

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new">Выберите файл</span>
                        <span class="fileupload-exists">Выберите файл</span>
                        <input type="file" class="default" name="file3" id="file3" />
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
            <input type="text" name="file_title4" id="file_title4" class="span4" />
        </td>

        <td style="text-align: center; padding-top: 15px;">

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new">Выберите файл</span>
                        <span class="fileupload-exists">Выберите файл</span>
                        <input type="file" class="default" name="file4" id="file4" />
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
            <input type="text" name="file_title5" id="file_title5" class="span4" />
        </td>

        <td style="text-align: center; padding-top: 15px;">

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new">Выберите файл</span>
                        <span class="fileupload-exists">Выберите файл</span>
                        <input type="file" class="default" name="file5" id="file5" />
                    </span>
                </div>
            </div>

        </td>
    </tr>


    </tbody>
</table>