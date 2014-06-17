<?php /* Smarty version 2.6.18, created on 2014-01-23 12:32:38
         compiled from profile/products_recommended_box.tpl */ ?>
<tr>
    <td class="header" width="100px" style="padding:5px 5px 5px 5px;">
        Рекомендуемые<br />товары:
    </td>
    <td style="padding-left:5px; padding-top: 5px; padding-bottom: 5px;">
        <table width="100%">
            <tr>
                <td align="left" style="border: 0px; padding-left: 5px;">
                    <table width="616">
                        <tr>
                            <td align="left" width="590" style="font-weight: bold; height: 30px; border: 1px solid #dedede; background: #fff; text-align: center; padding: 5px 5px 5px 5px;">
                                Список выбранных:<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="left" style="border: 0px; padding-left: 5px; height: 10px; vertical-align: top;" id="recommendedSelectedContainer">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'profile/products_recommended_selected.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </td>
            </tr>
            <tr>
                <td align="left" style="border: 0px; padding-left: 5px;">
                    <table width="590">
                        <tr>
                            <td align="left" width="590" style="font-weight: bold; height: 30px; border: 1px solid #dedede; background: #fff; text-align: center; padding: 5px 5px 5px 5px;">
                                Начните вводить название товара и появится список, если такое название существует:<br />
                                <input type="text" style="width: 600px; margin-top: 5px;" name="product_search" id="product_search" onchange="searchRecommendedProducts();" onkeyup="searchRecommendedProducts();" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="left" style="border: 0px; padding-left: 5px; height: 340px; vertical-align: top;" id="recommendedContainer">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'profile/products_recommended.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </td>
            </tr>
        </table>
    </td>
</tr>