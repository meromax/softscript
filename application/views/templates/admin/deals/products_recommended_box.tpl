<div class="underlined push-down-20">
    <h3><span class="light">Рекомендуемые или похожие</span> товары</h3>
</div>

<div class="accordion-group accordion-style-2 active" style="margin-top: 0px;">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="javascript:void(0);">
            <span class="bg-for-icon"><i class="icon-list"></i></span>
            Список выбранных товаров&nbsp;&nbsp;<span id="rLoader">&nbsp;</span>
        </a>
    </div>
    <div id="collapseOne" class="accordion-body in collapse" style="height: auto;">
        <div class="accordion-inner" id="recommendedSelectedContainer">
            {include file='admin/products/products_recommended_selected.tpl'}
        </div>
    </div>
</div>

<div class="accordion-group accordion-style-2 active" style="margin-top: 0px;">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="javascript:void(0);">
            <span class="bg-for-icon"><i class="icon-search"></i></span>
            Начните вводить название товара и появится список, если такое название существует:<br />
            <div style="padding: 10px 0px 0px 0px;">
                <input type="text" class="span6 m-wrap" autocomplete="off" style="background: #fff;" name="product_search" id="product_search" onkeyup="searchRecommendedProducts();" />
            </div>
        </a>
    </div>
    <div id="collapseOne" class="accordion-body in collapse" style="height: auto;">
        <div class="accordion-inner" id="recommendedContainer">
            {include file='admin/products/products_recommended.tpl'}
        </div>
    </div>
</div>