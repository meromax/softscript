<?php /* Smarty version 2.6.18, created on 2014-02-05 20:27:55
         compiled from admin/deals/tab_general.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/deals/tab_general.tpl', 5, false),array('modifier', 'strip_tags', 'admin/deals/tab_general.tpl', 5, false),)), $this); ?>

<p class="push-down-10">
    <label for="author">Название<span class="red-clr bold">*</span>:</label>
    <input type="text" id="title" name="title" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" class="span6 m-wrap" placeholder="Введите название акции здесь..." onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();">
</p>

<p class="push-down-10">
    <label for="author">Ссылка:</label>
    <input type="text" id="link" name="link" value="<?php echo $this->_tpl_vars['item']['link']; ?>
" class="span6 m-wrap" placeholder="Здесь появиться ссылка в транслите после ввода названия акции..." readonly="readonly">
</p>

<p class="push-down-10">
    <label for="author">Выберите раздел<span class="red-clr bold">*</span>:</label>
    <select id="section" name="section" class="span2 m-wrap" onchange="getCategories('<?php echo $this->_tpl_vars['item']['category_id']; ?>
');">
        <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sec']):
?>
            <option value="<?php echo $this->_tpl_vars['sec']['id']; ?>
" <?php if ($this->_tpl_vars['sec']['id'] == $this->_tpl_vars['item']['section_id']): ?>selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sec']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
    </select>
    <input type="hidden" name="category" value="0" />
</p>

<p class="push-down-10">
    <label for="author">Укажите категорию:</label>
    <span id="categories_container">
        <!-- here will categories list -->
    </span>
</p>

<p class="push-down-10">
    <label for="author">Выберите город:</label>
    <select id="city" name="city" class="span2 m-wrap">
        <option value="0" <?php if (0 == $this->_tpl_vars['item']['city_id']): ?>selected="selected"<?php endif; ?>>-- все города --</option>
        <?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
            <option value="<?php echo $this->_tpl_vars['city']['id']; ?>
" <?php if ($this->_tpl_vars['city']['id'] == $this->_tpl_vars['item']['city_id']): ?>selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['city']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
    </select>
</p>

<p class="push-down-10">
    <label for="author">Тип сделки:</label>
    <select name="type" id="type" class="span2 m-wrap">
        <option value="0" <?php if ($this->_tpl_vars['item']['type'] == 0): ?>selected="selected"<?php endif; ?>>Бесплатная</option>
        <option value="1" <?php if ($this->_tpl_vars['item']['type'] == 1): ?>selected="selected"<?php endif; ?>>Чистая продажа</option>
        <option value="2" <?php if ($this->_tpl_vars['item']['type'] == 2): ?>selected="selected"<?php endif; ?>>Договор комиссии</option>
    </select>
</p>

<p class="push-down-10">
    <label for="author">Статус акции:</label>
    <select name="status" id="status" class="span2 m-wrap">
        <option value="0" <?php if ($this->_tpl_vars['item']['type'] == 0): ?>selected="selected"<?php endif; ?>>Отклонена модератором</option>
        <option value="1" <?php if ($this->_tpl_vars['item']['type'] == 1): ?>selected="selected"<?php endif; ?>>На модерацию</option>
        <option value="2" <?php if ($this->_tpl_vars['item']['type'] == 2): ?>selected="selected"<?php endif; ?>>Черновик</option>
        <option value="3" <?php if ($this->_tpl_vars['item']['type'] == 3): ?>selected="selected"<?php endif; ?>>Активная</option>
    </select>
</p>

<p class="push-down-10">
    <label for="author">Главная акция:</label>
    <select id="main" name="main" class="span2 m-wrap">
        <option value="1" <?php if ($this->_tpl_vars['item']['main'] == 1): ?>selected="selected"<?php endif; ?>>ДА</option>
        <option value="0" <?php if ($this->_tpl_vars['item']['main'] == 0): ?>selected="selected"<?php endif; ?>>НЕТ</option>
    </select>
</p>