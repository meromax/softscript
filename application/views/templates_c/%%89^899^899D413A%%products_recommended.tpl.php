<?php /* Smarty version 2.6.18, created on 2014-02-04 19:22:58
         compiled from profile/products/products_recommended.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'profile/products/products_recommended.tpl', 22, false),array('modifier', 'strip_tags', 'profile/products/products_recommended.tpl', 22, false),)), $this); ?>
<div>

<?php if ($this->_tpl_vars['productsRecommended']): ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="text-align: center;">Картинка</th>
            <th>Наименование товара</th>
            <th style="text-align: center;">Действия</th>
        </tr>
        </thead>
        <tbody>

            <?php $_from = $this->_tpl_vars['productsRecommended']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pr']):
?>

                <tr id="prCon<?php echo $this->_tpl_vars['pr']['id']; ?>
">
                    <td style="text-align: center; vertical-align: middle; width: 88px;">
                        <img src="/images/products/<?php echo $this->_tpl_vars['pr']['image']; ?>
_small.jpg" width="88" height="62">
                    </td>
                    <td style="text-align: center; vertical-align: middle">
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pr']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                    </td>

                    <td style="text-align: center; padding-top: 23px; vertical-align: middle;">
                        <button type="button" class="btn btn-success push-down-10" onclick="addPR('<?php echo $this->_tpl_vars['pr']['id']; ?>
');">Добавить</button>
                    </td>
                </tr>

            <?php endforeach; endif; unset($_from); ?>

        </tbody>
    </table>
<?php else: ?>
    <div style="text-align: center;" id="sLoader">
        Пока ничего не найдено...
    </div>
<?php endif; ?>
</div>

