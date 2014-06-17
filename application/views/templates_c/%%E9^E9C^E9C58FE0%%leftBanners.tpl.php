<?php /* Smarty version 2.6.18, created on 2014-01-20 16:33:36
         compiled from leftBanners.tpl */ ?>
<div class="blok">
    <?php if ($this->_tpl_vars['leftBanner1']['link'] != ""): ?>
        <a href="/"><img src="/images/banners/<?php echo $this->_tpl_vars['leftBanner1']['image']; ?>
_big.jpg" width="240" height="343" /></a>
    <?php else: ?>
        <img src="/images/banners/<?php echo $this->_tpl_vars['leftBanner1']['image']; ?>
_big.jpg" width="240" height="343" />
    <?php endif; ?>
    <div class="label nov">&nbsp;</div>
</div>
<div class="blok">
<?php if ($this->_tpl_vars['leftBanner2']['link'] != ""): ?>
    <a href="/"><img src="/images/banners/<?php echo $this->_tpl_vars['leftBanner2']['image']; ?>
_big.jpg" width="240" height="343" /></a>
    <?php else: ?>
    <img src="/images/banners/<?php echo $this->_tpl_vars['leftBanner2']['image']; ?>
_big.jpg" width="240" height="343" />
<?php endif; ?>
    <div class="label action">&nbsp;</div>
</div>