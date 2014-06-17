<?php /* Smarty version 2.6.18, created on 2014-02-17 12:03:30
         compiled from admin/login.tpl */ ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Metronic | Login Options - Login Form 2</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="/css/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/css/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="/css/assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    <link rel="shortcut icon" href="/images/favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo" style="margin-top: 200px;">
    </div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form action="/admin" method="post" name="login_form">
        <h3 class="form-title" style="font-size: 20px;">Войти в панель управления</h3>
        <?php if ($this->_tpl_vars['WarnMessages']): ?>
        <div class="alert alert-error" style="top: -2px; right: -29px;">
            <button class="close" data-dismiss="alert"></button>
            <?php unset($this->_sections['warning']);
$this->_sections['warning']['name'] = 'warning';
$this->_sections['warning']['loop'] = is_array($_loop=$this->_tpl_vars['WarnMessages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['warning']['show'] = true;
$this->_sections['warning']['max'] = $this->_sections['warning']['loop'];
$this->_sections['warning']['step'] = 1;
$this->_sections['warning']['start'] = $this->_sections['warning']['step'] > 0 ? 0 : $this->_sections['warning']['loop']-1;
if ($this->_sections['warning']['show']) {
    $this->_sections['warning']['total'] = $this->_sections['warning']['loop'];
    if ($this->_sections['warning']['total'] == 0)
        $this->_sections['warning']['show'] = false;
} else
    $this->_sections['warning']['total'] = 0;
if ($this->_sections['warning']['show']):

            for ($this->_sections['warning']['index'] = $this->_sections['warning']['start'], $this->_sections['warning']['iteration'] = 1;
                 $this->_sections['warning']['iteration'] <= $this->_sections['warning']['total'];
                 $this->_sections['warning']['index'] += $this->_sections['warning']['step'], $this->_sections['warning']['iteration']++):
$this->_sections['warning']['rownum'] = $this->_sections['warning']['iteration'];
$this->_sections['warning']['index_prev'] = $this->_sections['warning']['index'] - $this->_sections['warning']['step'];
$this->_sections['warning']['index_next'] = $this->_sections['warning']['index'] + $this->_sections['warning']['step'];
$this->_sections['warning']['first']      = ($this->_sections['warning']['iteration'] == 1);
$this->_sections['warning']['last']       = ($this->_sections['warning']['iteration'] == $this->_sections['warning']['total']);
?><span><?php echo $this->_tpl_vars['WarnMessages'][$this->_sections['warning']['index']]; ?>
</span><?php endfor; endif; ?>
        </div>
        <?php endif; ?>
        <div class="control-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <div class="controls">
                <div class="input-icon left">
                    <i class="icon-user"></i>
                    <input class="m-wrap placeholder-no-fix" autocomplete="off" type="text" placeholder="E-mail" name="username" id="username" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="controls">
                <div class="input-icon left">
                    <i class="icon-lock"></i>
                    <input class="m-wrap placeholder-no-fix" autocomplete="off" type="password" placeholder="Пароль" name="pw" id="pw"/>
                </div>
            </div>
        </div>
        <div class="form-actions" style="padding: 0px 30px 1px 30px; text-align: center;">
                                                    <button type="submit" class="btn blue" name="login" id="login">
                Войти <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
                                                                                            <div class="create-account" style="text-align: center;">
                                                                    <p>
                2014 &copy; SoftScript - Панель управления.
            </p>
        </div>
    </form>

</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
    <!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="/css/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="/css/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/css/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="/css/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="/css/assets/plugins/excanvas.min.js"></script>
<script src="/css/assets/plugins/respond.min.js"></script>
<![endif]-->
<script src="/css/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/css/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/css/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="/css/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/css/assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="/css/assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/css/assets/scripts/app.js" type="text/javascript"></script>
<script src="/css/assets/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    <?php echo '
    jQuery(document).ready(function() {
        App.init();
        Login.init();
    });
    '; ?>

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>

