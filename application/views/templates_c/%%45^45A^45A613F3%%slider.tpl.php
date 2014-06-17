<?php /* Smarty version 2.6.18, created on 2013-06-30 02:13:06
         compiled from news/slider.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'news/slider.tpl', 15, false),array('modifier', 'stripslashes', 'news/slider.tpl', 18, false),array('modifier', 'strip_tags', 'news/slider.tpl', 18, false),)), $this); ?>
<link rel="stylesheet" type="text/css" href="/css/scrollable-horizontal.css" />
<link rel="stylesheet" type="text/css" href="/css/scrollable-buttons.css" />
<div class="news" style="height:173px;">
    <div class="title">
        <strong>НОВОСТИ</strong>
        <a class="next browse right"></a>
        <a class="prev browse left"></a>
        <div class="clear"></div>
    </div>
    <div class="newscontent" style="position:absolute;">
        <div class="scrollable" id="scrollable">
            <div class="items">
                <?php $_from = $this->_tpl_vars['rightNews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new']):
?>
                <div>
                    <div class="newsdate"><?php echo ((is_array($_tmp=$this->_tpl_vars['new']['new_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</div>
                    <div class="newstitle">
                        <a href="/new<?php echo $this->_tpl_vars['new']['new_id']; ?>
.html">
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['new']['new_title_up'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                        </a>
                    </div>
                    <div class="newstext">
                        <a href="/new<?php echo $this->_tpl_vars['new']['new_id']; ?>
.html">
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['new']['new_description_short'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                        </a>
                    </div>
                </div>
                <?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
    </div>
</div>
<div class="title2">
    <a href="/news.html">ВСЕ НОВОСТИ</a>
</div>
<?php echo '
<script>
    $(function() {
        // initialize scrollable
        $(".scrollable").scrollable({circular: true}).navigator().autoscroll({
            interval: 4000
        });
    });
</script>
'; ?>
