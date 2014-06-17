<?php /* Smarty version 2.6.18, created on 2014-01-16 16:01:03
         compiled from sections/product_reviews.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'sections/product_reviews.tpl', 36, false),array('modifier', 'strip_tags', 'sections/product_reviews.tpl', 36, false),)), $this); ?>
                            <?php if ($this->_tpl_vars['UserLogedIn']): ?>
<div class="review_comment_box" id="review" style="padding-bottom: 40px; height: 100px;">
    <form method="post" name="reviewForm" id="reviewForm">
    <textarea class="review_comment_textarea" name="review" id="reviewid"></textarea>
    <input type="hidden" name="product_id" value="<?php echo $this->_tpl_vars['product']['id']; ?>
" />
    <div style="background: #fff;">
        <div class="reviewMessage" id="reviewMessage" style="font-size: 11px;">
            Отзыв отправлен и будет опубликован после проверки модератором!
        </div>
        <div class="review_sendButton">
            <a href="javascript:void(0);" onclick="addReview();">
                <div class="buttonRed">Отправить</div>
            </a>
        </div>
    </div>
    </form>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['productsReviews']): ?>

<?php $_from = $this->_tpl_vars['productsReviews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ritem']):
?>
<div class="reviewBox">
    <div class="name"><?php echo $this->_tpl_vars['ritem']['username']; ?>
</div>
    <div class="comment">
        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['ritem']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

    </div>
    <?php $_from = $this->_tpl_vars['ritem']['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rcitem']):
?>
        <div class="forum_answer_con3">
            <div class="head" style="font-family: tahoma;">
                <?php echo $this->_tpl_vars['rcitem']['username']; ?>

            </div>
            <div class="forum_answer">
                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['rcitem']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

            </div>
        </div>
    <?php endforeach; endif; unset($_from); ?>

    <?php if ($this->_tpl_vars['UserLogedIn']): ?>
    <div class="addComment" style="padding-left:30px;">
        <a href="javascript:void(0);" onclick="showReviewCommentBox(<?php echo $this->_tpl_vars['ritem']['id']; ?>
);">Оставить коментарий</a>
    </div>
    <div class="review_comment_box" id="review_comment<?php echo $this->_tpl_vars['ritem']['id']; ?>
" style="margin-left: 30px; margin-right: 0px; display:none;">
        <form method="post" name="reviewCoomentForm<?php echo $this->_tpl_vars['ritem']['id']; ?>
" id="reviewCoomentForm<?php echo $this->_tpl_vars['ritem']['id']; ?>
">
        <textarea class="review_comment_textarea" style="width: 572px;" name="review_comment" id="reviewComment<?php echo $this->_tpl_vars['ritem']['id']; ?>
"></textarea>
        <input type="hidden" name="review_id" value="<?php echo $this->_tpl_vars['ritem']['id']; ?>
" />
        <div style="background: #fff;">
            <div class="reviewMessage" id="reCommentMessage<?php echo $this->_tpl_vars['ritem']['id']; ?>
" style="font-size: 11px;">
                Отзыв отправлен и будет опубликован после проверки модератором!
            </div>
            <div class="review_sendButton" style="padding-right: 16px;">
                <a href="javascript:void(0);" onclick="addReviewComment(<?php echo $this->_tpl_vars['ritem']['id']; ?>
);">
                    <div class="buttonRed">Отправить</div>
                </a>
            </div>
        </div>
        </form>
    </div>
    <?php endif; ?>
</div>

<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
    пока нет ни одного отзыва...
<?php endif; ?>