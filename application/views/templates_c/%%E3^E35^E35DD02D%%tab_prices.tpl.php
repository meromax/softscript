<?php /* Smarty version 2.6.18, created on 2014-02-05 20:27:55
         compiled from admin/deals/tab_prices.tpl */ ?>
<p class="push-down-10">
    <label for="author">Начальная цена<span class="red-clr bold">*</span>:</label>
    <input type="text" id="price" name="price" value="<?php echo $this->_tpl_vars['item']['price']; ?>
" maxlength="7" class="span2 m-wrap" placeholder="Введите цену товара..." onkeyup="calculatePercents();">
</p>

<p class="push-down-10">
    <label for="author">Размер скидки<span class="red-clr bold">*</span>:</label>
    <input type="text" id="old_price" name="old_price" value="<?php echo $this->_tpl_vars['item']['old_price']; ?>
" class="span2 m-wrap" maxlength="7" placeholder="Введите старую цену товара..." onkeyup="calculatePercents();">
</p>

<p class="push-down-10">
    <label for="author">Цена купона:</label>
    <input type="text" id="discount" name="discount" value="<?php echo $this->_tpl_vars['item']['discount']; ?>
" readonly="readonly" maxlength="3" class="span2 m-wrap" style="text-align: center;" onclick="calculatePercents();">
</p>