<?php /* Smarty version 2.6.18, created on 2014-02-03 15:30:44
         compiled from admin/products/reviews/items_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/products/reviews/items_list.tpl', 42, false),array('modifier', 'strip_tags', 'admin/products/reviews/items_list.tpl', 43, false),)), $this); ?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Отзывы
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/products/index/page/1">Список товаров</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/sections/categories/section_id/<?php echo $this->_tpl_vars['section_id']; ?>
/spage/1/page/1">Категории товаров</a>
                </li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">


            <div class="span3">
                <div class="portlet box grey">


                    <div class="portlet-title">
                        <div class="caption"><i class="icon-info"></i>Текущий товар</div>
                    </div>
                    <div class="portlet-body">
                        <div class="scroller" data-height="300px">
                            <a href="/product/<?php echo $this->_tpl_vars['product']['link']; ?>
" target="_blank"><h4><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h4></a>
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['product']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                        </div>
                    </div>


                </div>
            </div>



            <div class="span9">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список отзывов</div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th>Заголовок</th>
                                <th class="span2" style="text-align: center;">Дата</th>
                                <th class="span2" style="text-align: center;">Опубликован</th>
                                <th class="span1" style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $_from = $this->_tpl_vars['productReviews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                <tr>
                                    <td class="span1" style="text-align: center; vertical-align: middle;"><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
                                    <td style="vertical-align: middle;">
                                        <b><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</b><br />
                                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                                        <?php if ($this->_tpl_vars['item']['comments']): ?>
                                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 10px; margin-top: 15px;">
                                            <thead>
                                            <tr>
                                                <th colspan="4" style="text-align: center;">Комментарии</th>
                                            </tr>
                                            <tr>
                                                <th style="font-size: 11px;">Заголовок</th>
                                                <th class="span2" style="text-align: center; font-size: 11px;">Дата</th>
                                                <th class="span1" style="text-align: center; font-size: 11px;">Опубликован</th>
                                                <th class="span2" style="text-align: center;">Действия</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $_from = $this->_tpl_vars['item']['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['prcomment']):
?>

                                                    <tr bgcolor="#EEEEEE">
                                                        <td style="font-size: 11px;">
                                                            <b><?php echo ((is_array($_tmp=$this->_tpl_vars['prcomment']['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</b><br />
                                                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prcomment']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                                                        </td>
                                                        <td style="text-align: center; vertical-align: middle; font-size: 11px;"><?php echo $this->_tpl_vars['item']['post_date']; ?>
</td>
                                                        <td style="text-align: center; vertical-align: middle;">
                                                            <?php if ($this->_tpl_vars['prcomment']['active'] == 1): ?>
                                                                <a href="javascript:void(0);" class="btn green" onclick="changeProductReviewCommentActive('<?php echo $this->_tpl_vars['prcomment']['id']; ?>
');" id="prc_status_link<?php echo $this->_tpl_vars['prcomment']['id']; ?>
" title="Опуликован"><i id="prc_status_icon<?php echo $this->_tpl_vars['prcomment']['id']; ?>
" class="icon-eye-open" style="font-size: 20px;"></i></a>
                                                            <?php else: ?>
                                                                <a href="javascript:void(0);" class="btn red" onclick="changeProductReviewCommentActive('<?php echo $this->_tpl_vars['prcomment']['id']; ?>
');" id="prc_status_link<?php echo $this->_tpl_vars['prcomment']['id']; ?>
" title="Не опуликован"><i id="prc_status_icon<?php echo $this->_tpl_vars['prcomment']['id']; ?>
" class="icon-eye-close" style="font-size: 20px;"></i></a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td style="text-align: center; vertical-align: middle;">
                                                            <a href="/admin/products/delete-review-comment/product_id/<?php echo $this->_tpl_vars['product']['id']; ?>
/comment_id/<?php echo $this->_tpl_vars['prcomment']['id']; ?>
" class="btn red" onclick="return confirm('Вы уверены, что хотите удалить комментарий?')"><i class="icon-remove"></i> <?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
                                                        </td>
                                                    </tr>

                                                <?php endforeach; endif; unset($_from); ?>
                                            </tbody>
                                        </table>
                                        <?php endif; ?>
                                    </td>

                                    <td class="hidden-480" style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                    </td>

                                    <td style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        <?php if ($this->_tpl_vars['item']['active'] == 1): ?>
                                            <a href="javascript:void(0);" class="btn green" onclick="changeProductReviewActive('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
" title="Опуликован"><i id="status_icon<?php echo $this->_tpl_vars['item']['id']; ?>
" class="icon-eye-open" style="font-size: 20px;"></i></a>
                                        <?php else: ?>
                                            <a href="javascript:void(0);" class="btn red" onclick="changeProductReviewActive('<?php echo $this->_tpl_vars['item']['id']; ?>
');" id="status_link<?php echo $this->_tpl_vars['item']['id']; ?>
" title="Не опуликован"><i id="status_icon<?php echo $this->_tpl_vars['item']['id']; ?>
" class="icon-eye-close" style="font-size: 20px;"></i></a>
                                        <?php endif; ?>
                                    </td>

                                    <td class="span3" style="text-align: center; vertical-align: middle;">
                                        <a href="/admin/products/delete-review/product_id/<?php echo $this->_tpl_vars['product']['id']; ?>
/review_id/<?php echo $this->_tpl_vars['item']['id']; ?>
" class="btn red" onclick="return confirm('Вы уверены, что хотите удалить отзыв?')"><i class="icon-remove"></i> Удалить</a>
                                    </td>
                                </tr>
                                <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="6" style="text-align: center;">Нет ни одного отзыва...</td>
                                </tr>
                            <?php endif; unset($_from); ?>
                            </tbody>
                        </table>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/products/reviews/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                    </div>


                </div>
            </div>

        </div>

    </div>

</div>



<?php echo '
<script type="text/javascript">
    function chnagePage(){
        document.location.href="/admin/sections/index/content_page_id/"+$("#content_page_id").val()+"/page/1";
    }

    function changeProductReviewActive(reviewId){
        $("#status_icon"+reviewId).html("<div style=\'position: absolute; margin-left: -14px; margin-top: 3px;\'><img src=\'/images/loading.gif\' style=\'width: 48px; height: 8px;\'></div>");
        $.post("/admin/products/change-review-active", {id:reviewId},
                function(data) {
                    $("#status_icon"+reviewId).html("");
                    if(data==1){
                        $("#status_link"+reviewId).attr(\'title\',\'Опуликован\');
                        $("#status_link"+reviewId).removeClass(\'btn red\');
                        $("#status_link"+reviewId).addClass(\'btn green\');
                        $("#status_icon"+reviewId).removeClass(\'icon-eye-close\');
                        $("#status_icon"+reviewId).addClass(\'icon-eye-open\');
                    } else {
                        $("#status_link"+reviewId).attr(\'title\',\'Не опуликован\');
                        $("#status_link"+reviewId).removeClass(\'btn green\');
                        $("#status_link"+reviewId).addClass(\'btn red\');
                        $("#status_icon"+reviewId).removeClass(\'icon-eye-open\');
                        $("#status_icon"+reviewId).addClass(\'icon-eye-close\');
                    }
                }
        );
    }

    function changeProductReviewCommentActive(commentId){
        $("#prc_status_icon"+commentId).html("<div style=\'position: absolute; margin-left: -14px; margin-top: 3px;\'><img src=\'/images/loading.gif\' style=\'width: 48px; height: 8px;\'></div>");
        $.post("/admin/products/change-comment-active", {id:commentId},
                function(data) {
                    $("#prc_status_icon"+commentId).html("");
                    if(data==1){
                        $("#prc_status_link"+commentId).attr(\'title\',\'Опуликован\');
                        $("#prc_status_link"+commentId).removeClass(\'btn red\');
                        $("#prc_status_link"+commentId).addClass(\'btn green\');
                        $("#prc_status_icon"+commentId).removeClass(\'icon-eye-close\');
                        $("#prc_status_icon"+commentId).addClass(\'icon-eye-open\');
                    } else {
                        $("#prc_status_link"+commentId).attr(\'title\',\'Не опуликован\');
                        $("#prc_status_link"+commentId).removeClass(\'btn green\');
                        $("#prc_status_link"+commentId).addClass(\'btn red\');
                        $("#prc_status_icon"+commentId).removeClass(\'icon-eye-open\');
                        $("#prc_status_icon"+commentId).addClass(\'icon-eye-close\');
                    }
                }
        );
    }
</script>
'; ?>
