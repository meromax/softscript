<?php /* Smarty version 2.6.18, created on 2013-04-20 07:20:44
         compiled from login/loginBox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'login/loginBox.tpl', 33, false),array('modifier', 'strip_tags', 'login/loginBox.tpl', 33, false),)), $this); ?>
<?php if (! $this->_tpl_vars['UserLogedIn']): ?>
<form action="/login" method="POST" name="loginBoxForm" id="loginBoxForm">
<div class="loginBox">
    <div class="inpEmailBox">
        <input class="inpEmail"  autocomplete="off" type="text" name="email" id="email">
    </div>
    <div class="inpPassBox">
        <input class="inpEmail"  autocomplete="off" type="password" name="password" id="password">
    </div>
    <div class="loginBoxBut">
        <div class="rememberMeBox1"><input type="checkbox" name="rememberme" id="rememberme"></div>
        <div class="rememberMeBox2">Запомнить меня</div>
        <div class="logButton"><a href="javascript:void(0);" id="loginBoxButton"><img src="/images/login.png" /></a></div>
    </div>

    <div class="regCommentBox">
        Если вы ещё незарегистрированы
        пройдите <a href="/joinnow.html">регистрацию</a>
    </div>
</div>
</form>
<?php else: ?>
<div class="loginedBox">

    <div style="width: 100%; height: 40px;">
        <div class="link" style="width: 76px; padding-top: 13px; padding-left: 138px;">
            <a href="/logout.html">Выход</a>
            <div style="float: right; margin-top: -4px;"><img src="/images/logout-back.png" /></div>
        </div>
    </div>

    <div class="welcome">
        Добро пожаловать<br /><a href="/profile.html"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['userInfo']['first_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
    </div>

    <div class="cartHeader">
        <a href="/shopping-cart.html">корзина покупок</a>
    </div>
</div>
<?php endif; ?>