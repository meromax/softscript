<?php /* Smarty version 2.6.18, created on 2013-05-26 02:36:23
         compiled from sections/brands.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'sections/brands.tpl', 10, false),array('modifier', 'strip_tags', 'sections/brands.tpl', 10, false),)), $this); ?>
<?php if (isset ( $this->_tpl_vars['brandsList1'] )): ?>
<div class="brandsList">
        <div class="header">Фильтр по брендам</div>
        <table border="0" align="center">
            <tr>
                <td>
                <?php if (isset ( $this->_tpl_vars['brandsList1'] )): ?>
                    <div class="block">
                        <?php $_from = $this->_tpl_vars['brandsList1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bl1']):
?>
                            <div class="brandItem"><a href="/catalog/sec/<?php echo $this->_tpl_vars['secLink']; ?>
/brand/<?php echo $this->_tpl_vars['bl1']['link']; ?>
/page/1" <?php if ($this->_tpl_vars['bl1']['link'] == $this->_tpl_vars['brandLink']): ?>class="active"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['bl1']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
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
                            <div class="brandItem"><a href="/catalog/sec/<?php echo $this->_tpl_vars['secLink']; ?>
/brand/<?php echo $this->_tpl_vars['bl2']['link']; ?>
/page/1" <?php if ($this->_tpl_vars['bl2']['link'] == $this->_tpl_vars['brandLink']): ?>class="active"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['bl2']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
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
                            <div class="brandItem"><a href="/catalog/sec/<?php echo $this->_tpl_vars['secLink']; ?>
/brand/<?php echo $this->_tpl_vars['bl3']['link']; ?>
/page/1" <?php if ($this->_tpl_vars['bl3']['link'] == $this->_tpl_vars['brandLink']): ?>class="active"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['bl3']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a> (<?php echo $this->_tpl_vars['bl3']['pCount']; ?>
)</div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                <?php endif; ?>
                </td>
            </tr>
        </table>
</div>
<?php endif; ?>