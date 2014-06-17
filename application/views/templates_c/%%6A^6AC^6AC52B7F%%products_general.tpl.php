<?php /* Smarty version 2.6.18, created on 2014-02-07 17:11:12
         compiled from admin/products/products_general.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/products/products_general.tpl', 7, false),array('modifier', 'strip_tags', 'admin/products/products_general.tpl', 7, false),)), $this); ?>

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
    <label for="author">Главный продукт</label>
    <select id="main" name="main" class="span2 m-wrap">
        <option value="1" <?php if ($this->_tpl_vars['item']['main'] == 1): ?>selected="selected"<?php endif; ?>>ДА</option>
        <option value="0" <?php if ($this->_tpl_vars['item']['main'] == 0): ?>selected="selected"<?php endif; ?>>НЕТ</option>
    </select>
</p>

<p class="push-down-10">
    <label for="author">Наименование товара<span class="red-clr bold">*</span>:</label>
    <input type="text" id="title" name="title" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" class="span6 m-wrap" placeholder="Введите название вашего товара здесь..." onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();">
</p>

<p class="push-down-10">
    <label for="author">Ссылка<span class="red-clr bold">*</span>:</label>
    <input type="text" id="link" name="link" value="<?php echo $this->_tpl_vars['item']['link']; ?>
" class="span6 m-wrap" placeholder="Здесь появиться ссылка в транслите после ввода названия товара..." readonly="readonly">
</p>

<p class="push-down-10">
    <label for="author">Короткое описание<span class="red-clr bold">*</span>:</label>
    <textarea tabindex="4" id="description_short" name="description_short" rows="15" class="span6 m-wrap ckeditor" placeholder="Введите короткое описание здесь..."><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description_short'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
</p>

<p class="push-down-10">
    <label for="author">Полное описание<span class="red-clr bold">*</span>:</label>
    <textarea tabindex="4" id="description" name="description" rows="15" class="span6 m-wrap ckeditor" placeholder="Введите полное описание здесь..."><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
</p>

<p class="push-down-10">
    <label for="author">Цена<span class="red-clr bold">*</span>:</label>
    <input type="text" id="price" name="price" value="<?php echo $this->_tpl_vars['item']['price']; ?>
" maxlength="7" class="span2 m-wrap" placeholder="Введите цену товара..." onkeyup="calculatePercents();">
</p>

<p class="push-down-10">
    <label for="author">Старая цена<span class="red-clr bold">*</span>:</label>
    <input type="text" id="old_price" name="old_price" value="<?php echo $this->_tpl_vars['item']['old_price']; ?>
" class="span2 m-wrap" maxlength="7" placeholder="Введите старую цену товара..." onkeyup="calculatePercents();">
</p>

<p class="push-down-10">
    <label for="author">Скидка в процентах:</label>
    <input type="text" id="discount" name="discount" value="<?php echo $this->_tpl_vars['item']['discount']; ?>
" readonly="readonly" maxlength="3" class="span2 m-wrap" style="text-align: center;" onclick="calculatePercents();">
</p>

<p class="push-down-10">
    <label for="author">Позиция<span class="red-clr bold">*</span>:</label>
    <input type="text" id="position" name="position" value="<?php echo $this->_tpl_vars['item']['position']; ?>
 "maxlength="3" class="span2 m-wrap" style="text-align: center;" value="0">
</p>