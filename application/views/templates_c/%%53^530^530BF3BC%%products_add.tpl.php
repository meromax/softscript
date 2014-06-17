<?php /* Smarty version 2.6.18, created on 2014-01-23 12:32:38
         compiled from profile/products_add.tpl */ ?>
<link rel="stylesheet" type="text/css" href="/css/bootstrap-plugins/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
<script type="text/javascript" src="/css/bootstrap-plugins/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="/css/bootstrap-plugins/plugins/ckeditor/ckeditor.js"></script>



<!-- Products -->
<div class="darker-stripe">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li><span class="icon-chevron-right"></span></li>
                    <li>
                        <a href="/profile.html">Личный кабинет</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="push-up blocks-spacer">
        <div class="row">

            <aside class="span3">
                <div class="sidebar-item">

                    <div>
                        <h3><span class="light">Личный</span> Кабинет</h3>
                    </div>

                    <div class="row">
                        <div class="span3">
                            <div class="widget">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "profile/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </div>
                        </div>
                    </div>

                </div>
            </aside>

            <section class="span9" style="min-height: 600px;">

                <div class="underlined push-down-20">
                    <h3><span class="light">Мои</span> товары :: <span class="light">Добавление</span> товара</h3>
                </div>

                <form method="POST" action="/profile/products/add" name="product_add_form" id="product_add_form" enctype="multipart/form-data">

                <input type="hidden" name="step" value="2">
                <?php if ($this->_tpl_vars['item']['id']): ?>
                    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
                <?php endif; ?>


                <!-- Tabs -->
                <ul id="myTab2" class="nav nav-tabs nav-tabs-style-2">
                    <li class="active">
                        <a href="#tab2-1" data-toggle="tab">Основное</a>
                    </li>
                    <li>
                        <a href="#tab2-2" data-toggle="tab">Картинки</a>
                    </li>
                    <li>
                        <a href="#tab2-3" data-toggle="tab">Файлы</a>
                    </li>
                    <li>
                        <a href="#tab2-4" data-toggle="tab">СЕО информация</a>
                    </li>
                    <li>
                        <a href="#tab2-5" data-toggle="tab">Дополнительно</a>
                    </li>
                    <li>
                        <a href="#tab2-6" data-toggle="tab">Рекомендуемые товары</a>
                    </li>

                </ul>
                <div class="tab-content">

                    <!--############# TAB1 #############-->
                    <div class="fade in tab-pane active" id="tab2-1">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "profile/products_general.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>

                    <!--############# TAB1 #############-->
                    <div class="fade tab-pane" id="tab2-2">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "profile/products_images.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>

                    <!--############# TAB1 #############-->
                    <div class="fade tab-pane" id="tab2-3">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "profile/products_files.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>

                    <!--############# TAB1 #############-->
                    <div class="fade tab-pane" id="tab2-4">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'profile/products_meta.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>

                    <!--############# TAB1 #############-->
                    <div class="fade tab-pane" id="tab2-5">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'profile/products_additional.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>

                    <!--############# TAB1 #############-->
                    <div class="fade tab-pane" id="tab2-6">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "profile/products_recommended_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                </div>

                <div style="text-align: right; padding-top: 10px;">
                    <button type="button" class="btn btn-primary push-down-10" onclick="document.location='/profile/products.html'">К списку товаров</button>
                    <button type="button" class="btn btn-primary push-down-10" onclick="checkForm(0);">Сохранить</button>
                </div>

                </form>

            </section>
        </div>
    </div>
</div>

<?php echo '
    <script type="text/javascript">

        function getCategories(categoryId){
            var sectionId = $("#section").val();
            $("#categories_container").html("<img src=\'/images/loading.gif\'>");
            $.post("/profile/index/ajax-get-categories", {section_id:sectionId, category_id:categoryId},
                    function(data) {
                        if(data!=\'\'){
                            $("#categories_container").html(data);
                        }
                    }
            );
        }

        function setLink(){
            var link = createLinkFromTitle($("#title").val());
            $("#link").val(link);
        }

        function createLinkFromTitle(title) {
            var link = title.replace(/([а-яё])|([\\s_-])|([^a-z\\d])/gi,
                    function (all, ch, space, words, i) {
                        if (space || words) {
                            return space ? \'-\' : \'\';
                        }
                        var code = ch.charCodeAt(0),
                                index = code == 1025 || code == 1105 ? 0 :
                                        code > 1071 ? code - 1071 : code - 1039,
                                t = [\'yo\', \'a\', \'b\', \'v\', \'g\', \'d\', \'e\', \'zh\',
                                    \'z\', \'i\', \'y\', \'k\', \'l\', \'m\', \'n\', \'o\', \'p\',
                                    \'r\', \'s\', \'t\', \'u\', \'f\', \'h\', \'c\', \'ch\', \'sh\',
                                    \'shch\', \'\', \'y\', \'\', \'e\', \'yu\', \'ya\'
                                ];
                        return t[index];
                    });

            return link.toLowerCase();
        }

        function resetImage(id){
            alert(id);
            $(".fileupload-new").css(\'display\', \'block\');
            $(".fileupload-preview").css(\'display\', \'none\');
            $("#pic"+id).attr(\'src\',\'/images/products/default-270x189.png\');
            $("#image"+id).val(\'\');
        }

        function calculatePercents(){
            setTimeout(function() {
                var percents = 100-parseInt((parseInt($("#price").val())*100)/parseInt($("#old_price").val()));

                if(percents!=NaN&&percents>0){
                    $("#discount").val(percents);
                } else {
                    $("#discount").val(0);
                }


            }, 2000);
        }

        function checkForm(type){
            var title = document.getElementById(\'title\').value;
            if ($("#section").val() == 0) {
                alert(\'Вы должны указать раздел.\');
            } else if ($("#title").val() == \'\') {
                alert(\'Вы должны указать заголовок.\');
            } else if ($("#price").val() == \'\') {
                alert(\'Вы должны указать цену.\');
            } else if ($("#position").val() == \'\') {
                alert(\'Вы должны указать позицию.\');
            } else if(type==0 && $("#image_title1").val() == \'\'&&$("#image_title2").val() == \'\'&&$("#image_title3").val() == \'\'&&$("#image_title4").val() == \'\'&&$("#image_title5").val() == \'\') {
                alert(\'Вы должны выбрать заголовок картинки.\');
            } else if(type==0 && $("#image1").val() == \'\'&&$("#image2").val() == \'\'&&$("#image3").val() == \'\'&&$("#image4").val() == \'\'&&$("#image5").val() == \'\') {
                alert(\'Вы должны выбрать картинку.\');
            } else {
                document.forms.product_form.submit();
            }
        }

        function delFile(fileId){
            //alert(fileId);
            $.post("/admin/products/del-file", {id:fileId},
                    function(data) {
                        if(data!=\'\'){
                            $("#fileCon"+fileId).html("<div style=\'border:1px solid #000; width: 80px; padding-top: 1px; padding-bottom: 1px; text-align: center; background: #fff;\'>удаление<br /><img style=\'height: 5px; width: 70px; margin-top: 3px;\' src=\'/images/loading.gif\' /></div>");
                            setTimeout(function() {
                                $("#fileCon"+fileId).fadeOut("slow");
                            }, 2000);
                        }
                    }
            );
        }

        function delImage(imageId){
            //alert(fileId);
            $.post("/admin/products/del-image", {id:imageId},
                    function(data) {
                        if(data!=\'\'){
                            $("#imageCon"+imageId).html("<div style=\'border:1px solid #000; width: 80px; padding-top: 1px; padding-bottom: 1px; text-align: center; background: #fff;\'>удаление<br /><img style=\'height: 5px; width: 70px; margin-top: 3px;\' src=\'/images/loading.gif\' /></div>");
                            setTimeout(function() {
                                $("#imageCon"+imageId).fadeOut("slow");
                            }, 2000);

                        }
                    }
            );
        }

        function setMainImageStatus(imageId, productId){
            //alert(fileId);
            $.post("/admin/products/set-main-image", {id:imageId, product_id:productId},
                    function(data) {
                        if(data!=\'\'){
                            $("#imageDataCon"+imageId).css("background","#c2fdae");
                            $("#imageDataCon"+imageId).css("border","1px solid green");
                            $("#setLink"+imageId).html(\'<b style="color: red;">главная</b>\');
                            $("#delLink"+imageId).html(\'&nbsp;\');


                            $("#imageDataCon"+data).css("background","#fff");
                            $("#imageDataCon"+data).css("border","1px solid #dedede");
                            $("#setLink"+data).html(\'<a href="javascript:void(0);" onclick="setMainImageStatus(\'+data+\',\'+productId+\');">сделать<br />главной</a>\');
                            $("#delLink"+data).html(\'<a href="javascript:void(0)" onclick="delImage(\'+data+\');" title="удалить"><img src="/images/passive.png" /></a>\');
                            //alert("#imageDataCon"+imageId+"----------"+"#imageDataCon"+data);
                        }
                    }
            );
        }

        $(document).ready(function() {
            '; ?>

            getCategories('<?php echo $this->_tpl_vars['item']['category_id']; ?>
');
            <?php echo '
        });
    </script>
'; ?>



