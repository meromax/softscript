<?php /* Smarty version 2.6.18, created on 2014-01-23 12:32:38
         compiled from profile/products_images.tpl */ ?>
<?php if ($this->_tpl_vars['item']['image'] != ""): ?>

    <tr>
        <td class="header" width="100px">Изображение(я):</td>
        <td align="left" style="padding-left:6px; width: 800px;" id="gallery">
            <?php echo '
                <script type="text/javascript">
                    //                                    $(function() {
                    //                                        $(\'#gallery a\').lightBox({fixedNavigation:true});
                    //                                    });
                </script>
            '; ?>

            <?php $_from = $this->_tpl_vars['item']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pimage']):
?>
                <?php if ($this->_tpl_vars['pimage']['main'] == 1): ?>
                    <div style="float:left; width: 110px; margin: 4px 2px 4px 0px; padding: 0px 1px 0px 1px;">
                        <table style="background: #c2fdae; border: 1px solid green;" id="imageDataCon<?php echo $this->_tpl_vars['pimage']['id']; ?>
">
                            <tr>
                                <td align="right" style="border: 0px; height: 15px;" id="delLink<?php echo $this->_tpl_vars['pimage']['id']; ?>
">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 0px;">
                                    <span>
                                        <a href="/images/products/<?php echo $this->_tpl_vars['pimage']['image']; ?>
_big.jpg?time=<?php echo time(); ?>
" rel="lightbox">
                                            <img style="border:1px solid #b2b2b2; margin: 0px; padding: 0px;" align="left" src="/images/products/<?php echo $this->_tpl_vars['pimage']['image']; ?>
_square.jpg?time=<?php echo time(); ?>
" width="96" height="96" alt="" title="">
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" height="40" valign="middle" style="border: 0px;" id="setLink<?php echo $this->_tpl_vars['pimage']['id']; ?>
"><b style="color: red;">главная</b></td>
                            </tr>
                        </table>
                    </div>
                <?php else: ?>
                    <div  id="imageCon<?php echo $this->_tpl_vars['pimage']['id']; ?>
" style="float:left; width: 110px;  margin: 4px 2px 4px 0px; padding: 0px 1px 0px 1px;">
                        <table style="background: #fff; border: 1px solid #dedede;" id="imageDataCon<?php echo $this->_tpl_vars['pimage']['id']; ?>
">
                            <tr>
                                <td align="right" style="border: 0px; height: 15px;" id="delLink<?php echo $this->_tpl_vars['pimage']['id']; ?>
"><a href="javascript:void(0)" onclick="delImage(<?php echo $this->_tpl_vars['pimage']['id']; ?>
);" title="удалить"><img src="/images/passive.png" /></a></td>
                            </tr>
                            <tr>
                                <td style="border: 0px;">
                                    <span>
                                        <a href="/images/products/<?php echo $this->_tpl_vars['pimage']['image']; ?>
_large.jpg?time=<?php echo time(); ?>
" rel="lightbox">
                                            <img style="border:1px solid #b2b2b2; margin: 0px; padding: 0px;" align="left" src="/images/products/<?php echo $this->_tpl_vars['pimage']['image']; ?>
_square.jpg?time=<?php echo time(); ?>
" width="96" height="96" alt="" title="">
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" height="40" valign="middle" style="border: 0px;" id="setLink<?php echo $this->_tpl_vars['pimage']['id']; ?>
"><a href="javascript:void(0);" onclick="setMainImageStatus(<?php echo $this->_tpl_vars['pimage']['id']; ?>
,<?php echo $this->_tpl_vars['item']['id']; ?>
);">сделать<br />главной</a></td>
                            </tr>
                        </table>
                    </div>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </td>
    </tr>
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

        <td style="padding-top: 15px;">

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