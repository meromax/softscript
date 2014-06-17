<?php /* Smarty version 2.6.18, created on 2014-02-04 19:22:58
         compiled from profile/products/products_add.tpl */ ?>
<link rel="stylesheet" href="/css/bootstrap-plugins/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
<script src="/css/bootstrap-plugins/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>

<script type="text/javascript" src="/css/bootstrap-plugins/plugins/ckeditor/ckeditor.js"></script>

<script src="/js/profile_products.js" type="text/javascript" ></script>

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
                    <li class="active" id="tab1">
                        <a href="#tab1-1" data-toggle="tab">Основное</a>
                    </li>
                    <li id="tab2">
                        <a href="#tab1-2" data-toggle="tab">Картинки</a>
                    </li>
                    <li id="tab3">
                        <a href="#tab1-3" data-toggle="tab">Файлы</a>
                    </li>
                    <li id="tab4">
                        <a href="#tab1-4" data-toggle="tab">СЕО информация</a>
                    </li>
                    <li id="tab5">
                        <a href="#tab1-5" data-toggle="tab">Дополнительно</a>
                    </li>
                    <li id="tab6">
                        <a href="#tab1-6" data-toggle="tab">Рекомендуемые товары</a>
                    </li>

                </ul>
                <div class="tab-content">

                    <!--############# TAB1 #############-->
                    <div class="fade in tab-pane active" id="tab1-1">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "profile/products/products_general.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>

                    <!--############# TAB1 #############-->
                    <div class="fade tab-pane" id="tab1-2">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "profile/products/products_images.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>

                    <!--############# TAB1 #############-->
                    <div class="fade tab-pane" id="tab1-3">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "profile/products/products_files.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>

                    <!--############# TAB1 #############-->
                    <div class="fade tab-pane" id="tab1-4">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'profile/products/products_meta.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>

                    <!--############# TAB1 #############-->
                    <div class="fade tab-pane" id="tab1-5">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'profile/products/products_additional.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>

                    <!--############# TAB1 #############-->
                    <div class="fade tab-pane" id="tab1-6">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "profile/products/products_recommended_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                </div>
                <div id="profileWarning" class="alert alert-danger in fade hidden" style="margin-top: 10px;">
                    &nbsp;
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

        $(document).ready(function() {
            '; ?>

                getCategories('<?php echo $this->_tpl_vars['item']['category_id']; ?>
');
            <?php echo '
        });

    </script>
'; ?>



