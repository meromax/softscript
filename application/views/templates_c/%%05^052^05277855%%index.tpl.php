<?php /* Smarty version 2.6.18, created on 2013-12-10 21:40:57
         compiled from reviews/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'reviews/index.tpl', 8, false),array('modifier', 'strip_tags', 'reviews/index.tpl', 8, false),array('modifier', 'date_format', 'reviews/index.tpl', 36, false),)), $this); ?>
<div class="staticPageBox">
    <div class="pageTitle">Отзывы</div>
    <div class="pageText">

        <div class="reviewForm">
            <form action="/reviews/index/send" method="post" id="reviews_form">
                <div class="inpBox">
                    <input type="text" name="name" id="name" placeholder="Ваше имя" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['userInfo']['first_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" />
                </div>
                <div class="inpBox">
                    <input type="text" name="email" id="email" placeholder="E-mail" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['userInfo']['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" />
                </div>
                <div class="inpBox2">
                    <textarea name="message" id="message" placeholder="Текст отзыва"></textarea>
                </div>
                <?php if (! $this->_tpl_vars['UserLogedIn']): ?>
                    <a href="/loginpage.html" style="text-decoration: none;">
                        <div class="redButton" style="margin-left: 406px; float: left;">Оставить отзыв</div>
                    </a>
                    <?php else: ?>
                    <a href="javascript:void(0);" id="reviews_send" style="text-decoration: none;">
                        <div class="redButton" style="margin-left: 406px; float: left;">Оставить отзыв</div>
                    </a>
                <?php endif; ?>
                <div id="reviewWarning">&nbsp;</div>
            </form>
        </div>

        <div style="clear: both;"></div>

        <div class="pageText" style="padding-top: 47px;">
            <div class="reviewListBox">
            <?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                <div class="item">
                    <div class="name"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['first_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</div>
                    <div class="date"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</div>
                    <div class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['text'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</div>

                </div>
            <?php endforeach; endif; unset($_from); ?>

            <?php if ($this->_tpl_vars['page_count'] > 1): ?>
                <div class="item">
                    <div class="paginator">
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
                                <div class="pointActive"><?php echo $this->_tpl_vars['page_num']; ?>
</div>
                                <?php else: ?>
                                <a href="/reviews/page/<?php echo $this->_sections['item']['index']; ?>
"><div class="point"><?php echo $this->_sections['item']['index']; ?>
</div></a>
                            <?php endif; ?>
                            <?php if ($this->_sections['item']['index'] != $this->_tpl_vars['page_count']): ?>
                            <?php endif; ?>
                        <?php endfor; endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>

        <div style="clear: both;"></div>

    </div>
</div>