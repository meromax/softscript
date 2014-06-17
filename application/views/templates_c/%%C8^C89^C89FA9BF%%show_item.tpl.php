<?php /* Smarty version 2.6.18, created on 2013-01-25 21:45:56
         compiled from forum/show_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'forum/show_item.tpl', 2, false),array('modifier', 'strip_tags', 'forum/show_item.tpl', 17, false),)), $this); ?>
<div class="topTextBlock">
    <div class="pageTitle"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</div>
    <div class="forum_text">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

    </div>
    <?php if ($this->_tpl_vars['answers']): ?>
        <div class="forum_comment_header">Комментарии:</div>
        <?php $_from = $this->_tpl_vars['answers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['faKey'] => $this->_tpl_vars['fitem']):
?>
            <div <?php if (( $this->_tpl_vars['faKey']+1 ) % 2 == 0): ?>class="forum_answer_con1"<?php else: ?>class="forum_answer_con2"<?php endif; ?>>
                <div class="head" style="font-family: tahoma;">
                    <?php echo $this->_tpl_vars['fitem']['username']; ?>

                </div>
                <div class="forum_answer_date" style="font-family: tahoma;">
                    <?php echo $this->_tpl_vars['fitem']['post_date']; ?>

                </div>
                <div class="forum_answer" style="font-family: tahoma;">
                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fitem']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                </div>
            </div>
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['UserLogedIn']): ?>
        <div class="forum_comment_header">Ваш коментарий:</div>
        <div class="forum_comment_box" style="padding-left: 10px; margin-bottom: 20px;">
        <form method="post" name="forumCommentForm" id="forumCommentForm">
            <textarea class="forum_comment_textarea" name="comment" id="comment"></textarea>
            <input type="hidden" name="forum_id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" />
            <div>
                <div class="commentMessage" id="commentMessage" style="font-size: 11px; padding-left: 10px; display: none; float: left; color: green;">
                    Комментарий отправлен и будет опубликован после проверки модератором!
                </div>
                <div class="review_sendButton" style="padding-right: 10px; float: right; padding-top: 0px;">
                    <a href="javascript:void(0);" onclick="addForumComment();"><img src="/images/send-button.png"></a>
                </div>
            </div>
        </form>
        </div>
    <?php endif; ?>
    <br /><br />
</div>