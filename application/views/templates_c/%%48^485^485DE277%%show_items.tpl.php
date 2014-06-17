<?php /* Smarty version 2.6.18, created on 2013-03-04 12:33:41
         compiled from forum/show_items.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'forum/show_items.tpl', 7, false),array('modifier', 'date_format', 'forum/show_items.tpl', 10, false),)), $this); ?>
<div class="topTextBlock">
    <div class="pageTitle">Форум</div>
    <div class="pageText">
        <?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="forum">
                <div class="head">
                    <a class="head_link" href="/forum/topic/<?php echo $this->_tpl_vars['item']['id']; ?>
.html"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                </div>
                <div class="date">
                    <?php if (((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")) == '01'): ?>
                        <?php $this->assign('monthName', "января"); ?>
                    <?php elseif (((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")) == '02'): ?>
                        <?php $this->assign('monthName', "февраля"); ?>
                    <?php elseif (((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")) == '03'): ?>
                        <?php $this->assign('monthName', "марта"); ?>
                    <?php elseif (((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")) == '04'): ?>
                        <?php $this->assign('monthName', "апреля"); ?>
                    <?php elseif (((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")) == '05'): ?>
                        <?php $this->assign('monthName', "мая"); ?>
                    <?php elseif (((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")) == '06'): ?>
                        <?php $this->assign('monthName', "июня"); ?>
                    <?php elseif (((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")) == '07'): ?>
                        <?php $this->assign('monthName', "июля"); ?>
                    <?php elseif (((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")) == '08'): ?>
                        <?php $this->assign('monthName', "августа"); ?>
                    <?php elseif (((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")) == '09'): ?>
                        <?php $this->assign('monthName', "сентября"); ?>
                    <?php elseif (((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")) == '10'): ?>
                        <?php $this->assign('monthName', "октября"); ?>
                    <?php elseif (((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")) == '11'): ?>
                        <?php $this->assign('monthName', "ноября"); ?>
                    <?php elseif (((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")) == '12'): ?>
                        <?php $this->assign('monthName', "декабря"); ?>
                    <?php endif; ?>
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d")); ?>
 <?php echo $this->_tpl_vars['monthName']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>

                </div>
                <div>
                    <a class="text" href="/forum/topic/<?php echo $this->_tpl_vars['item']['id']; ?>
.html"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description_short'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                </div>
            </div>
        <?php endforeach; endif; unset($_from); ?>
        <div class="clear"></div>
        <div>
            <?php if ($this->_tpl_vars['page_count'] > 1): ?>
                <div style="font-size: 14px; float: left; padding-top: 0px; padding-right: 4px;">Страницы: </div>
                <?php unset($this->_sections['item']);
$this->_sections['item']['name'] = 'item';
$this->_sections['item']['start'] = (int)1;
$this->_sections['item']['loop'] = is_array($_loop=$this->_tpl_vars['page_count']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['item']['show'] = true;
$this->_sections['item']['max'] = $this->_sections['item']['loop'];
$this->_sections['item']['step'] = 1;
if ($this->_sections['item']['start'] < 0)
    $this->_sections['item']['start'] = max($this->_sections['item']['step'] > 0 ? 0 : -1, $this->_sections['item']['loop'] + $this->_sections['item']['start']);
else
    $this->_sections['item']['start'] = min($this->_sections['item']['start'], $this->_sections['item']['step'] > 0 ? $this->_sections['item']['loop'] : $this->_sections['item']['loop']-1);
if ($this->_sections['item']['show']) {
    $this->_sections['item']['total'] = min(ceil(($this->_sections['item']['step'] > 0 ? $this->_sections['item']['loop'] - $this->_sections['item']['start'] : $this->_sections['item']['start']+1)/abs($this->_sections['item']['step'])), $this->_sections['item']['max']);
    if ($this->_sections['item']['total'] == 0)
        $this->_sections['item']['show'] = false;
} else
    $this->_sections['item']['total'] = 0;
if ($this->_sections['item']['show']):

            for ($this->_sections['item']['index'] = $this->_sections['item']['start'], $this->_sections['item']['iteration'] = 1;
                 $this->_sections['item']['iteration'] <= $this->_sections['item']['total'];
                 $this->_sections['item']['index'] += $this->_sections['item']['step'], $this->_sections['item']['iteration']++):
$this->_sections['item']['rownum'] = $this->_sections['item']['iteration'];
$this->_sections['item']['index_prev'] = $this->_sections['item']['index'] - $this->_sections['item']['step'];
$this->_sections['item']['index_next'] = $this->_sections['item']['index'] + $this->_sections['item']['step'];
$this->_sections['item']['first']      = ($this->_sections['item']['iteration'] == 1);
$this->_sections['item']['last']       = ($this->_sections['item']['iteration'] == $this->_sections['item']['total']);
?>
                    <?php if ($this->_tpl_vars['page_num'] == $this->_sections['item']['index']): ?>
                        <div style="width: 18px; height: 18px; padding-top: 2px; font-size: 13px; float: left; background: #0D6A9B; margin-right: 3px; color: #fff; border: 1px solid #d3d3d3; text-align: center;"><?php echo $this->_tpl_vars['page_num']; ?>
</div>
                        <?php else: ?>
                        <div style="width: 18px; height: 18px; padding-top: 2px; font-size: 13px; float: left; background: #fff; margin-right: 3px; color: #0D6A9B; border: 1px solid #d3d3d3; text-align: center;">
                            <a href="/forum/page/<?php echo $this->_sections['item']['index']; ?>
" style="font-size: 13px;"><?php echo $this->_sections['item']['index']; ?>
</a>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->_sections['item']['index'] != $this->_tpl_vars['page_count']): ?>
                    <?php endif; ?>
                <?php endfor; endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>