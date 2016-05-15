<nav class="uk-navbar uk-clearfix">
    <a class="navbar-logo" href="/index">
        <?=Asset::img('logo/logo_190_40.png', array('id'=>'logo', 'class'=>'logo'));?>
    </a>
    <div class="staff-data">
        <span class="navi-text mr10">スタッフ名: <?=$username?></span><br>
        <span class="navi-text"><?=date("Y-m-d H:i:s");?></span>
    </div>
	<div class="uk-navbar-flip">
		<a href="" class="navi-text uk-navbar-toggle" data-uk-offcanvas="{target:'#sidemenu'}"></a>
	</div>
</nav>
<div aria-hidden="true" id="sidemenu" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-show uk-offcanvas-bar-flip">
        <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav="">
            <li><a href="/admin/index">管理メニュー</a></li>
            <li><a href="/admin/userlist">ユーザ管理</a></li>
            <li class="uk-active"><a href="#">Active</a></li>
            <li aria-expanded="false" class="uk-parent">
                <a href="#">Parent</a>
                <div class="uk-hidden" style="overflow: hidden; position: relative; height: 0px;">
                    <ul class="uk-nav-sub">
                        <li><a href="#">Sub item</a></li>
                        <li><a href="#">Sub item</a>
                            <ul>
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            <li aria-expanded="false" class="uk-parent">
                <a href="#">Parent</a>
                <div class="uk-hidden" style="overflow: hidden; position: relative; height: 0px;"><ul class="uk-nav-sub">
                    <li><a href="#">Sub item</a></li>
                    <li><a href="#">Sub item</a></li>
                </ul></div>
            </li>
            <li><a href="/index"><i class="uk-icon-home"></i> ユーザTOP画面</a></li>
            <li><a href="/logout"><i class="uk-icon-sign-out"></i> ログアウト</a></li>
            <li class="uk-nav-header">Header</li>
            <li aria-expanded="false" class="uk-parent"><a href="#"><i class="uk-icon-star"></i> Parent</a></li>
            <li><a href="#"><i class="uk-icon-twitter"></i> Item</a></li>
            <li class="uk-nav-divider"></li>
            <li><a href="#"><i class="uk-icon-rss"></i> Item</a></li>
        </ul>
    </div>
</div>
