<?php /* Smarty version 2.6.18, created on 2013-11-03 23:54:19
         compiled from reviews/complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'reviews/complete.tpl', 4, false),)), $this); ?>
<div class="staticPageBox">
    <div class="pageTitle">Отзывы</div>
    <div class="pageText">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['text'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

    </div>
</div>

<?php echo '
<script type="text/javascript">
    setTimeout(function () { document.location.href=\'/reviews/page/1\'; }, 5000);
</script>
'; ?>