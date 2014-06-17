<?php /* Smarty version 2.6.18, created on 2014-02-04 19:22:58
         compiled from profile/products/products_images.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'profile/products/products_images.tpl', 17, false),array('modifier', 'strip_tags', 'profile/products/products_images.tpl', 17, false),)), $this); ?>
<?php if ($this->_tpl_vars['item']['image'] != ""): ?>

    <div class="underlined push-down-20">
        <h3><span class="light">Список</span> картинок</h3>
    </div>
    <?php $_from = $this->_tpl_vars['item']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pimage']):
?>
        <?php if ($this->_tpl_vars['pimage']['main'] == 1): ?>
            <div class="pr_elem_sel" class="push-down-10 span12" id="imageDataCon<?php echo $this->_tpl_vars['pimage']['id']; ?>
">

                <table class="table table-bordered" id="innerImageDataCon<?php echo $this->_tpl_vars['pimage']['id']; ?>
" style="border:1px solid #9dcc41;">
                    <tbody>
                    <tr id="prCon<?php echo $this->_tpl_vars['pr']['id']; ?>
">
                        <td style="text-align: center; vertical-align: middle; width: 55px;">
                            <img src="/images/products/<?php echo $this->_tpl_vars['pimage']['image']; ?>
_square.jpg?time=<?php echo time(); ?>
" width="55" height="55">
                        </td>
                        <td style="text-align: center; vertical-align: middle">
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pimage']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                        </td>

                        <td style="text-align: center; vertical-align: middle; padding-top: 10px;" class="span4" id="setLink<?php echo $this->_tpl_vars['pimage']['id']; ?>
">
                            <h4>Главная <span class="light">картинка</span></h4>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>

        <?php else: ?>

            <div class="pr_elem_sel" class="push-down-10 span12" id="imageDataCon<?php echo $this->_tpl_vars['pimage']['id']; ?>
">

                <table class="table table-bordered" id="innerImageDataCon<?php echo $this->_tpl_vars['pimage']['id']; ?>
">
                    <tbody>
                    <tr id="prCon<?php echo $this->_tpl_vars['pr']['id']; ?>
">
                        <td style="text-align: center; vertical-align: middle; width: 55px;">
                            <img src="/images/products/<?php echo $this->_tpl_vars['pimage']['image']; ?>
_square.jpg?time=<?php echo time(); ?>
" width="55" height="55">
                        </td>
                        <td style="text-align: center; vertical-align: middle">
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pimage']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                        </td>

                        <td style="text-align: center; padding-top: 23px;  vertical-align: middle;" class="span4" id="setLink<?php echo $this->_tpl_vars['pimage']['id']; ?>
">
                            <button type="button" class="btn btn-success push-down-10" onclick="setMainImageStatus(<?php echo $this->_tpl_vars['pimage']['id']; ?>
,<?php echo $this->_tpl_vars['item']['id']; ?>
);">Сделать главной</button>
                            <button type="button" class="btn btn-danger push-down-10" onclick="delImage(<?php echo $this->_tpl_vars['pimage']['id']; ?>
);">Удалить</button>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>

        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>




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