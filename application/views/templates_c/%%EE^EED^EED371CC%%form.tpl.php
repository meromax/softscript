<?php /* Smarty version 2.6.18, created on 2014-01-14 18:59:39
         compiled from feedback/form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'feedback/form.tpl', 81, false),)), $this); ?>
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

            <!--  ==========  -->
            <!--  = Main Title =  -->
            <!--  ==========  -->

            <div class="span12">
                <div class="title-area">
                    <h1 class="inline"><span class="light">Контакты</span></h1>
                </div>
            </div>

            <!--  ==========  -->
            <!--  = Main content =  -->
            <!--  ==========  -->
            <section class="span8 single single-page">


                <!--  ==========  -->
                <!--  = Contact Form =  -->
                <!--  ==========  -->
                <section class="contact-form-container">

                    <div class="underlined">
                        <h3 class="light"><b>Отправить</b> <span class="light">сообщение</span></h3>
                    </div>

                    <br />

                    <form action="/feedback/index/do" method="post" name="feedback_form" id="feedback_form" class="form form-inline form-contact">
                        <p class="push-down-20">
                            <input type="text" aria-required="true" tabindex="1" size="30" value="" id="author" name="author" required>
                            <label for="author">Ваше имя<span class="red-clr bold">*</span></label>
                        </p>
                        <p class="push-down-20">
                            <input type="email" aria-required="true" tabindex="2" size="30" value="" id="email" name="email" required>
                            <label for="email">Email<span class="red-clr bold">*</span></label>
                        </p>

                        <p class="push-down-20">
                            <textarea class="input-block-level" tabindex="4" rows="7" cols="70" id="comment" name="comment" placeholder="Напишите ваше сообщение здесь ..." required></textarea>
                        </p>
                        <p>
                            <button class="btn btn-primary bold" type="submit" tabindex="5" id="submit">Отправить сообщение</button>
                        </p>
                    </form>
                </section>

                <hr />

                <!--  ==========  -->
                <!--  = Company Info with Google Maps =  -->
                <!--  ==========  -->
                <article class="company-info">
                    <div class="row">
                        <div class="span3">
                            <h3 class="push-down-30"><span class="light">Информация</span> о компании</h3>
                            <?php echo ((is_array($_tmp=$this->_tpl_vars['feedbackText'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                        </div>
                        <div class="span5">
                            <div class="add-googlemap" data-height="205" data-gps="53.912422,27.597658" data-addr="Платонова 43" data-title="Беларусь, г.Минск, ул. Платонова, 43" data-zoom="14" data-type="roadmap"></div>
                        </div>
                    </div>

                </article>

            </section> <!-- /main content -->

            <!--  ==========  -->
            <!--  = Sidebar =  -->
            <!--  ==========  -->
            <aside class="span4">

                <!--  ==========  -->
                <!--  = Opening Times Widget =  -->
                <!--  ==========  -->
                <div class="sidebar-item opening-time" id="opening_time-4">
                    <div class="underlined">
                        <h3><span class="light">Мы</span> Работаем</h3>
                    </div>
                    <div class="time-table">
                        <dl class="week-day <?php if ($this->_tpl_vars['day_num'] == 1): ?>today<?php endif; ?>">
                            <dt>
                                Понедельник
                            </dt>
                            <dd>
                                8:00 - 16:00
                            </dd>
                        </dl>
                        <dl class="week-day light-bg <?php if ($this->_tpl_vars['day_num'] == 2): ?>today<?php endif; ?>">
                            <dt>
                                Вторник
                            </dt>
                            <dd>
                                8:00 - 16:00
                            </dd>
                        </dl>
                        <dl class="week-day <?php if ($this->_tpl_vars['day_num'] == 3): ?>today<?php endif; ?>">
                            <dt>
                                Среда
                            </dt>
                            <dd>
                                8:00 - 16:00
                            </dd>
                        </dl>
                        <dl class="week-day light-bg <?php if ($this->_tpl_vars['day_num'] == 4): ?>today<?php endif; ?>">
                            <dt>
                                Четверг
                            </dt>
                            <dd>
                                10:00 - 15:00
                            </dd>
                        </dl>
                        <dl class="week-day <?php if ($this->_tpl_vars['day_num'] == 5): ?>today<?php endif; ?>">
                            <dt>
                                Пятница
                            </dt>
                            <dd>
                                8:00 - 16:00
                            </dd>
                        </dl>
                        <dl class="week-day light-bg <?php if ($this->_tpl_vars['day_num'] == 6): ?>today<?php endif; ?>">
                            <dt>
                                Суббота
                            </dt>
                            <dd>
                                ВЫХОДНОЙ
                            </dd>
                        </dl>
                        <dl class="week-day closed <?php if ($this->_tpl_vars['day_num'] == 0): ?>today<?php endif; ?>">
                            <dt>
                                Воскресенье
                            </dt>
                            <dd>
                                ВЫХОДНОЙ
                            </dd>
                        </dl>
                    </div>
                </div>

            </aside> <!-- /sidebar -->

        </div>
    </div>
</div> <!-- /container -->




<form action="/feedback/index/do" method="post" name="feedback_form" id="feedback_form">
    <div class="topTextBlock">
        <div class="pageTitle" style="margin-bottom: 20px;">
            <div style="float:left;">Задать вопрос?</div>
        </div>
        <div class="form">
            <div class="fheader">
                Укажите ваш email:(*):
            </div>
            <div class="finpBox">
                <input class="finp" name="email" id="email" type="text" autocomplete="on" />
            </div>

            <div class="fheader">
                Ваше имя:(*):
            </div>
            <div class="finpBox">
                <input class="finp" name="name" id="name" type="text" autocomplete="on" />
            </div>

            <div class="fheader">
                Cообщение(*):
            </div>
            <div class="finpBox">
                <textarea class="finp" id="message" name="message" style="height: 150px; width: 400px; border: 1px solid #b2b2b2;"></textarea>
            </div>


            <div id="profile_errors_box" style="border:1px dotted #ffffff; background:#ff9999; display:none; text-align:center; width:310px; padding:5px 5px 5px 5px; height:30px; color:#ffffff; position:absolute;">&nbsp;</div>
            <div id="profile_success_box" style="border:2px dotted #009900; background:#ffffff; display:none;  text-align:center; width:310px; padding:5px 5px 5px 5px; height:30px; color:#000000; position:absolute;">
                <div style="float:left; margin: 2px 0px 0px 5px;"><img src="/images/saved.jpg" width="28" /></div>
                <div style="float:left; margin: 7px 5px 5px 10px;"><?php echo $this->_tpl_vars['frontendLangParams']['PROFILE__SUCCESSFULLY_SAVED']; ?>
</div>
            </div>

            <div class="regButtonLink" style="margin-left: 148px;">
                <table>
                    <tr>
                        <td style="width: 140px;">
                            <div class="link" style="width: 140px;"><a class="sbm_link" id="button" href="javascript:void(0);">Отправить сообщение</a></div>
                        </td>
                        <td>
                            <div class="arrow" style="float: right;"></div>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="message_container" style="margin-top:17px; color:#000000; background:#4789c8; width:407px; display:none; border:1px solid #4789c8;">
                <div style="height:20px;  width:100%; height:30px; background:#4789c8;  position:relative; ">
                    <table width="100%" height="100%">
                        <tr>
                            <td style="font-weight:bold; text-align:center; color:#ffffff; padding:3px 3px 3px 3px; font-size:12px;"><div id="titleBox">Сообщение</div></td>
                        </tr>
                    </table>
                </div>
                <div align="left"  style="text-decoration:none; padding:3px 3px 3px 3px; background:#ffffff; color: #000;  position:relative; " id="warning">
                </div>
            </div>
        </div>
    </div>
</form>
<?php echo '
<script type="text/javascript">
    $(document).ready(function() {

        $("#button").click(function () {
            validateForm();
        });

    });
    function validateForm(){
        $("#message_container").hide();
        var errors = \'\';

        if($("#email").val()==\'\'){
            errors += "- Поле \'E-mail\' должно быть заполнено<br />";
        }

        if($("#name").val()==\'\'){
            errors += "- Поле \'Имя\' должно быть заполнено<br />";
        }

        if($("#message").val()==\'\'){
            errors += "- Поле \'Сообщение\' должно быть заполнено<br />";
        }

        if(errors!==\'\'){
            $("#warning").html(errors);
            $("#message_container").fadeIn("slow");
        } else {
            $("#feedback_form").submit();
        }

    }

</script>
'; ?>



