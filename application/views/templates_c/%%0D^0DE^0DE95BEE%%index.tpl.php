<?php /* Smarty version 2.6.18, created on 2014-02-07 15:39:02
         compiled from feedback/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'feedback/index.tpl', 59, false),array('modifier', 'strip_tags', 'feedback/index.tpl', 59, false),)), $this); ?>
<!--  = Google Maps API =  -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="/js/webmarket/goMap/js/jquery.gomap-1.3.2.min.js"></script>


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
                            <input type="text" aria-required="true" tabindex="1" size="30" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['userData']['first_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" name="name" id="name" autocomplete="on">
                            <label for="author">Ваше имя<span class="red-clr bold">*</span></label>
                        </p>
                        <p class="push-down-20">
                            <input type="email" aria-required="true" tabindex="2" size="30" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['userData']['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" id="email" name="email" autocomplete="on">
                            <label for="email">Email<span class="red-clr bold">*</span></label>
                        </p>

                        <p class="push-down-20">
                            <textarea class="input-block-level" tabindex="4" rows="7" cols="70" id="message" name="message" placeholder="Напишите ваше сообщение здесь ..."></textarea>
                        </p>

                        <div id="message_container" class="alert alert-danger in fade hidden">
                            &nbsp;
                        </div>

                        <p>
                            <button class="btn btn-primary bold" type="button" tabindex="5" id="button">Отправить сообщение</button>
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


<?php echo '
    <script type="text/javascript">
        $(document).ready(function() {

            $("#button").click(function () {
                validateForm();
            });

        });
        function validateForm(){
            $("#message_container").addClass("hidden");
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
                $("#message_container").html(errors);
                $("#message_container").removeClass("hidden");
            } else {
                $("#feedback_form").submit();
            }

        }

    </script>
'; ?>



