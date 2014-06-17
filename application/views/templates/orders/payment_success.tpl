<!-- Shopping Cart -->
<div class="darker-stripe">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li><span class="icon-chevron-right"></span></li>
                    <li>
                        <a href="/shopping-cart.html">Процесс покупки</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="push-up top-equal blocks-spacer-last">
        <div class="row">

            <!-- Main Title -->
            <div class="span12">
                <div class="title-area">
                    <h1 class="inline"><span class="light">Процесс покупки</span></h1>
                </div>
            </div>

            <div class="span12">
                <div class="center-align">
                    <h1><span class="light">{$item.title|stripslashes|strip_tags}</span></h1>
                </div>
            </div>

            <div class="row" style="min-height: 400px;">
                <div class="span10 offset1">

                    <!-- Steps -->
                    <div class="checkout-steps">
                        <div class="clearfix">
                            {$item.text|stripslashes}
                        </div>
                    </div> <!-- /steps -->

                    <p class="right-align">
                        <a href="/" class="btn btn-primary higher bold">НА ГЛАВНУЮ</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

