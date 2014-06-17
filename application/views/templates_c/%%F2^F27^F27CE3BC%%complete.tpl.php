<?php /* Smarty version 2.6.18, created on 2014-01-15 15:09:00
         compiled from feedback/complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'feedback/complete.tpl', 41, false),)), $this); ?>
<!--  ==========  -->
<!--  = Breadcrumbs =  -->
<!--  ==========  -->
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
                        <a href="/feedback.html">Контакты</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="push-up top-equal blocks-spacer-last">
        <div class="row">


            <div class="span12">
                <div class="title-area">
                    <h1 class="inline"><span class="light">Контакты</span></h1>
                </div>
            </div>

            <section class="span12 single single-page" style="min-height: 400px;">

                <section class="contact-form-container">

                    <div class="underlined">
                        <h3 class="light"><b>Сообщение</b> <span class="light">отправлено</span></h3>
                    </div>
                    <br />
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['feedbackComplete']['text'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                </section>

            </section>

        </div>
    </div>
</div>