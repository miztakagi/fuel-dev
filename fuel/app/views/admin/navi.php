<nav class="uk-navbar">
	<a class="navbar-logo" href="admin/index">
		<?=Asset::img('logo/logo_190_40.png', array('id'=>'logo', 'class'=>'logo'));?>
	</a>
	<span class="navi-text mr10">スタッフ名: <?=$username?></span>
    <span class="navi-text"><?=date("Y-m-d H:i:s");?></span>
	<div class="uk-navbar-flip">
		<a href="" class="navi-text uk-navbar-toggle" data-uk-offcanvas="{target:'#sidemenu'}"></a>
	</div>
</nav>
<div aria-hidden="true" id="sidemenu" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-show uk-offcanvas-bar-flip">
        <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav="">
            <li><a href="#">Item</a></li>
            <li class="uk-active"><a href="#">Active</a></li>
            <li aria-expanded="false" class="uk-parent">
                <a href="#">Parent</a>
                <div class="uk-hidden" style="overflow: hidden; position: relative; height: 0px;"><ul class="uk-nav-sub">
                    <li><a href="#">Sub item</a></li>
                    <li><a href="#">Sub item</a>
                        <ul>
                            <li><a href="#">Sub item</a></li>
                            <li><a href="#">Sub item</a></li>
                        </ul>
                    </li>
                </ul></div>
            </li>
            <li aria-expanded="false" class="uk-parent">
                <a href="#">Parent</a>
                <div class="uk-hidden" style="overflow: hidden; position: relative; height: 0px;"><ul class="uk-nav-sub">
                    <li><a href="#">Sub item</a></li>
                    <li><a href="#">Sub item</a></li>
                </ul></div>
            </li>
            <li><a href="#">Item</a></li>
            <li class="uk-nav-header">Header</li>
            <li aria-expanded="false" class="uk-parent"><a href="#"><i class="uk-icon-star"></i> Parent</a></li>
            <li><a href="#"><i class="uk-icon-twitter"></i> Item</a></li>
            <li class="uk-nav-divider"></li>
            <li><a href="#"><i class="uk-icon-rss"></i> Item</a></li>
        </ul>
    </div>
</div>
