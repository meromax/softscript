<?php /* Smarty version 2.6.18, created on 2014-02-07 20:01:09
         compiled from articles/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'articles/index.tpl', 16, false),array('modifier', 'stripslashes', 'articles/index.tpl', 16, false),)), $this); ?>
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
                        <a href="/articles/page/1">Статьи</a>
                    </li>
                    <?php if ($this->_tpl_vars['currSection']): ?>
                        <li><span class="icon-chevron-right"></span></li>
                        <li>
                            <a href="/articles/section/<?php echo $this->_tpl_vars['currSection']['link']; ?>
/page/1"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currSection']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                        </li>
                        <?php if ($this->_tpl_vars['currCategory']): ?>
                            <li><span class="icon-chevron-right"></span></li>
                            <li>
                                <a href="/articles/category/<?php echo $this->_tpl_vars['currCategory']['link']; ?>
/page/1"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currCategory']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="push-up blocks-spacer">
        <div class="row">

            <!-- Sidebar -->
            <aside class="span3 left-sidebar" id="tourStep1">
                <div class="sidebar-item sidebar-filters" id="sidebarFilters">

                    <!-- Sidebar Title -->
                    <div class="underlined">
                        <h3><span class="light">Разделы</span> статей</h3>
                    </div>

                    <!-- Categories -->
                    <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sec']):
?>
                    <div class="accordion-heading">
                        <a class="accordion-toggle" href="/articles/section/<?php echo $this->_tpl_vars['sec']['link']; ?>
/page/1" <?php if ($this->_tpl_vars['sec']['id'] !== $this->_tpl_vars['currSection']['id']): ?>style="font-weight: normal;"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sec']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                    </div>
                    <div id="filter<?php echo $this->_tpl_vars['sec']['id']; ?>
" class="accordion-body">
                        <div class="accordion-inner">
                            <?php $_from = $this->_tpl_vars['sec']['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
                                <a href="javascript:void(0);" class="selectable <?php if ($this->_tpl_vars['cat']['id'] == $this->_tpl_vars['currCategory']['id']): ?>selected<?php endif; ?>" onclick="document.location.href='/articles/category/<?php echo $this->_tpl_vars['cat']['link']; ?>
/page/1'"><i class="box"></i> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['cat']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                    </div>
                    <?php endforeach; endif; unset($_from); ?>

                </div>
            </aside>

            <!-- Main content -->
            <section class="span9">

                <div class="underlined push-down-15">
                    <div class="row">
                        <div class="span9">
                            <h3>
                                Статьи
                                <?php if ($this->_tpl_vars['currSection']): ?>
                                    &nbsp;<span class="light">::</span>&nbsp;
                                    <a href="/articles/section/<?php echo $this->_tpl_vars['currSection']['link']; ?>
/page/1"><span class="light"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currSection']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</span></a>
                                    <?php if ($this->_tpl_vars['currCategory']): ?>
                                        &nbsp;<span class="light">::</span>&nbsp;
                                        <a href="/articles/category/<?php echo $this->_tpl_vars['currCategory']['link']; ?>
/page/1"><span class="light"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currCategory']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</span></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </h3>
                        </div>
                    </div>
                </div>


                <!-- Articles -->
                <div class="row">

                    <?php $_from = $this->_tpl_vars['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aKey'] => $this->_tpl_vars['item']):
?>
                            <div class="span9">
                                <div class="product-title">
                                    <h5 class="isotope--title"><a href="/article/<?php echo $this->_tpl_vars['item']['link']; ?>
" style="text-transform: uppercase;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></h5>
                                </div>
                                <div class="product-description">
                                    <a href="/article/<?php echo $this->_tpl_vars['item']['link']; ?>
" style="color: #707070;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description_short'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>

                                    <div style="text-align: right; margin-bottom: 25px; margin-top: 20px;">
                                        <a href="/article/<?php echo $this->_tpl_vars['item']['link']; ?>
" class="btn btn-warning pull-right"><i class="icon-eye-open"></i> &nbsp; Подробнее</a>
                                    </div>

                                    <div style="clear: both;"></div>
                                    <?php if ($this->_tpl_vars['page_count'] > 1): ?>
                                        <hr />
                                    <?php elseif (( $this->_tpl_vars['articlesCount'] != $this->_tpl_vars['aKey']+1 )): ?>
                                        <hr />
                                    <?php else: ?>
                                        <br /><br />
                                    <?php endif; ?>
                                </div>
                            </div>
                    <?php endforeach; endif; unset($_from); ?>

                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "articles/paging.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                </div>
            </section>
        </div>
    </div>
</div>