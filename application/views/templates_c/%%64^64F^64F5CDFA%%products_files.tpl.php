<?php /* Smarty version 2.6.18, created on 2014-01-23 12:32:38
         compiled from profile/products_files.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'profile/products_files.tpl', 4, false),array('modifier', 'strip_tags', 'profile/products_files.tpl', 4, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['item']['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pfile']):
?>
    <div style="clear: both;" id="fileCon<?php echo $this->_tpl_vars['pfile']['id']; ?>
">
        <div style="float: left; padding: 5px 5px 5px 5px;"><a href="javascript:void(0)" onclick="delFile(<?php echo $this->_tpl_vars['pfile']['id']; ?>
);" title="удалить"><img src="/images/passive.png" /></a></div>
        <div style="float: left; padding: 5px 5px 5px 5px;"><a href="/admin/products/get-file/id/<?php echo $this->_tpl_vars['pfile']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pfile']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a><br /></div>
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