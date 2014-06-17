<?php /* Smarty version 2.6.18, created on 2013-02-19 08:26:26
         compiled from sections/params.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'sections/params.tpl', 9, false),array('modifier', 'strip_tags', 'sections/params.tpl', 9, false),)), $this); ?>
<div class="brandsList">
        <div class="header">Фильтр по опциям</div>
        <table border="0" align="center">
            <tr>
                <td>
                <?php if (isset ( $this->_tpl_vars['brandsList1'] )): ?>
                    <div class="block">
                        <?php $_from = $this->_tpl_vars['brandsList1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bl1']):
?>
                            <div class="brandItem"><a href="<?php echo $this->_tpl_vars['bl1']['link']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['bl1']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a> (<?php echo $this->_tpl_vars['bl1']['pCount']; ?>
)</div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                <?php endif; ?>
                </td>

                <td>

                <?php if (isset ( $this->_tpl_vars['brandsList2'] )): ?>
                    <div class="block">
                        <?php $_from = $this->_tpl_vars['brandsList2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bl2']):
?>
                            <div class="brandItem"><a href="<?php echo $this->_tpl_vars['bl2']['link']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['bl2']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a> (<?php echo $this->_tpl_vars['bl2']['pCount']; ?>
)</div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                <?php endif; ?>

                </td>

                <td>
                <?php if (isset ( $this->_tpl_vars['brandsList3'] )): ?>
                    <div class="block">
                        <?php $_from = $this->_tpl_vars['brandsList3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bl3']):
?>
                            <div class="brandItem"><a href="<?php echo $this->_tpl_vars['bl3']['link']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['bl3']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a> (<?php echo $this->_tpl_vars['bl3']['pCount']; ?>
)</div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                <?php endif; ?>
                </td>
            </tr>
        </table>
</div>