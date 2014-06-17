<?php /* Smarty version 2.6.18, created on 2014-01-21 16:03:11
         compiled from news/latest_news.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'news/latest_news.tpl', 34, false),array('modifier', 'stripslashes', 'news/latest_news.tpl', 35, false),array('modifier', 'strip_tags', 'news/latest_news.tpl', 35, false),)), $this); ?>
<div class="darker-stripe blocks-spacer more-space latest-news with-shadows">
    <div class="container">

        <!--  ==========  -->
        <!--  = Title =  -->
        <!--  ==========  -->
        <div class="row">
            <div class="span12">
                <div class="main-titles center-align">
                    <h2 class="title">
                        <span class="clickable icon-chevron-left" id="tweetsLeft"></span> &nbsp;&nbsp;&nbsp;
                        <span class="light">Последние</span> Новости &nbsp;&nbsp;&nbsp;
                        <span class="clickable icon-chevron-right" id="tweetsRight"></span>
                    </h2>
                </div>
            </div>
        </div> <!-- /title -->

        <!--  ==========  -->
        <!--  = News content =  -->
        <!--  ==========  -->
        <div class="row">
            <div class="span12">
                <div class="carouFredSel" data-nav="tweets" data-autoplay="false">

                    <?php $_from = $this->_tpl_vars['latestNews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nKey'] => $this->_tpl_vars['new']):
?>

                        <!-- Slide -->
                        <div class="slide">
                            <div class="row">
                                <div class="span1">&nbsp;</div>
                                <div class="span10">
                                    <div class="news-item" style="min-height: 120px; max-height: 120px;">
                                        <div class="published"><?php echo ((is_array($_tmp=$this->_tpl_vars['new']['new_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y")); ?>
</div>
                                        <h6><a href="javascript:void(0);"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['new']['new_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></h6>
                                        <p>
                                            <?php echo ((is_array($_tmp=$this->_tpl_vars['new']['new_description_short'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                        </p>
                                    </div>
                                </div>
                                <div class="span1">&nbsp;</div>
                            </div>
                        </div>
                        <!-- /Slide -->

                    <?php endforeach; endif; unset($_from); ?>

                </div>
            </div>
        </div> <!-- /news content -->
    </div>
</div>


                                