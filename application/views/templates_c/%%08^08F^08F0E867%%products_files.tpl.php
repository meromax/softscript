<?php /* Smarty version 2.6.18, created on 2014-02-07 17:11:12
         compiled from admin/products/products_files.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/products/products_files.tpl', 18, false),array('modifier', 'strip_tags', 'admin/products/products_files.tpl', 18, false),)), $this); ?>
<?php if ($this->_tpl_vars['item']['files']): ?>
<div class="underlined push-down-20">
    <h3><span class="light">Список</span> файлов</h3>
</div>
<?php endif; ?>
<?php $_from = $this->_tpl_vars['item']['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pfile']):
?>

    <div class="pr_elem_sel" class="push-down-10 span12" id="fileCon<?php echo $this->_tpl_vars['pfile']['id']; ?>
">

        <table class="table table-bordered">
            <tbody>
            <tr>
                <td style="text-align: center; vertical-align: middle; width: 55px;">
                                        <div style="width: 55px; height: 55px; text-align: center; font-size: 10px; ">Здесь будет тип файла</div>
                </td>
                <td style="text-align: center; vertical-align: middle">
                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pfile']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                </td>

                <td style="text-align: center; padding-top: 11px;  vertical-align: middle;" class="span4" id="setLink<?php echo $this->_tpl_vars['pfile']['id']; ?>
">
                    <a href="/admin/products/get-file/id/<?php echo $this->_tpl_vars['pfile']['id']; ?>
" class="btn green"><i class="icon-ok"></i> Скачать</a>
                    <a href="javascript:void(0)" onclick="delFile(<?php echo $this->_tpl_vars['pfile']['id']; ?>
);" class="btn red"><i class="icon-remove"></i> Удалить</a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

<?php endforeach; endif; unset($_from); ?>

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
        <td style="text-align: center; vertical-align: middle;">
            <input type="text" name="file_title1" id="file_title1" class="span12 m-wrap" style="margin-bottom: 0px;" />
        </td>
        <td style="text-align: center; vertical-align: middle;">

            <div class="fileupload fileupload-new" data-provides="fileupload"  style="margin-bottom: 0px;">
                <div class="input-append" style="margin-bottom: 0px;">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new"><i class="icon-file"></i> Выберите файл</span>
                        <span class="fileupload-exists"><i class="icon-file"></i> Выберите файл</span>
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
        <td style="text-align: center; vertical-align: middle;">
            <input type="text" name="file_title2" id="file_title2" class="span12 m-wrap" style="margin-bottom: 0px;" />
        </td>

        <td style="text-align: center; vertical-align: middle;">

            <div class="fileupload fileupload-new" data-provides="fileupload"  style="margin-bottom: 0px;">
                <div class="input-append" style="margin-bottom: 0px;">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new"><i class="icon-file"></i> Выберите файл</span>
                        <span class="fileupload-exists"><i class="icon-file"></i> Выберите файл</span>
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
        <td style="text-align: center; vertical-align: middle;">
            <input type="text" name="file_title3" id="file_title3" class="span12 m-wrap" style="margin-bottom: 0px;" />
        </td>

        <td style="text-align: center; vertical-align: middle;">

            <div class="fileupload fileupload-new" data-provides="fileupload"  style="margin-bottom: 0px;">
                <div class="input-append" style="margin-bottom: 0px;">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new"><i class="icon-file"></i> Выберите файл</span>
                        <span class="fileupload-exists"><i class="icon-file"></i> Выберите файл</span>
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
        <td style="text-align: center; vertical-align: middle;">
            <input type="text" name="file_title4" id="file_title4" class="span12 m-wrap" style="margin-bottom: 0px;" />
        </td>

        <td style="text-align: center; vertical-align: middle;">

            <div class="fileupload fileupload-new" data-provides="fileupload"  style="margin-bottom: 0px;">
                <div class="input-append" style="margin-bottom: 0px;">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new"><i class="icon-file"></i> Выберите файл</span>
                        <span class="fileupload-exists"><i class="icon-file"></i> Выберите файл</span>
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
        <td style="text-align: center; vertical-align: middle;">
            <input type="text" name="file_title5" id="file_title5" class="span12 m-wrap" style="margin-bottom: 0px;" />
        </td>

        <td style="text-align: center; vertical-align: middle;">

            <div class="fileupload fileupload-new" data-provides="fileupload"  style="margin-bottom: 0px;">
                <div class="input-append" style="margin-bottom: 0px;">
                    <div class="uneditable-input" style="margin-right: 5px;">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-success btn-file">
                        <span class="fileupload-new"><i class="icon-file"></i> Выберите файл</span>
                        <span class="fileupload-exists"><i class="icon-file"></i> Выберите файл</span>
                        <input type="file" class="default" name="file5" id="file5" />
                    </span>
                </div>
            </div>

        </td>
    </tr>


    </tbody>
</table>