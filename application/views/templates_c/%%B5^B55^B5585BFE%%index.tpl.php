<?php /* Smarty version 2.6.18, created on 2013-12-17 03:02:22
         compiled from documentation/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'documentation/index.tpl', 2, false),array('modifier', 'strip_tags', 'documentation/index.tpl', 2, false),)), $this); ?>
<div class="staticPageBox">
    <div class="pageTitle"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['content']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</div>
    <div class="pageText">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['content']['text'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

    </div>

    <div class="documents">
        <?php $_from = $this->_tpl_vars['documents']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dkey'] => $this->_tpl_vars['item']):
?>
            <a href="/admin/files/getfile/id/<?php echo $this->_tpl_vars['item']['id']; ?>
" title="Нажмите, чтобы скачать...">
            <div class="item">
                <table>
                    <tr>
                        <td valign="middle">
                            <img src="/images/icons/<?php echo $this->_tpl_vars['item']['file_ext']; ?>
.png" align="left" />
                        </td>
                        <td valign="middle">
                            <?php echo $this->_tpl_vars['item']['title']; ?>

                        </td>
                    </tr>
                </table>
            </div>
            </a>
                    <?php endforeach; endif; unset($_from); ?>
    </div>
</div>