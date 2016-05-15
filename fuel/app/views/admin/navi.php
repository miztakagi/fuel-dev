<nav class="uk-navbar uk-clearfix">
    <a class="navbar-logo" href="/admin">
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
            <li class="uk-nav-header">管理メニュー</li>
            <li><a href="/admin/index"><i class="uk-icon-home"></i> 管理TOP</a></li>
            <li><a href="/admin/userlist"><i class="uk-icon-user"></i> ユーザ管理</a></li>
            <li aria-expanded="false" class="uk-parent">
                <a href="#">作品管理</a>
                <ul class="uk-nav-sub">
                    <li class="navsub"><a href="/admin/itemlist">作品リスト</a></li>
                    <li class="navsub"><a href="#">Sub item</a>
                        <ul>
                            <li><a href="#">Sub item</a></li>
                            <li><a href="#">Sub item</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li aria-expanded="false" class="uk-parent">
                <a href="#">入出金管理</a>
                <ul class="uk-nav-sub">
                    <li class="navsub"><a href="/admin/manage">入金一覧</a></li>
                    <li class="navsub"><a href="#">Sub item</a></li>
                </ul>
            </li>
            
            <li><a href="admin/info"><i class="uk-icon-info"></i> お知らせ管理</a></li>
            <li class="uk-nav-divider"></li>
            <li><a href="/index"><i class="uk-icon-home"></i> ユーザTOP画面</a></li>
            <li><a href="/logout"><i class="uk-icon-sign-out"></i> ログアウト</a></li>
            <li class="uk-nav-divider"></li>
            <li aria-expanded="false" class="uk-parent">
                <a href="#"><i class="uk-icon-star"></i> 参照URL</a>
                <ul class="uk-nav-sub">
                    <li class="navsub"><a href="http://fuelphp.jp/docs/1.8/general/controllers/base.html" target="_blank">FuelPHP</a></li>
                    <li class="navsub"><a href="http://qiita.com/kazukichi/items/2a6e242091c5f485b976" target="_blank">FuelPHPの使い方</a></li>
                    <li class="navsub"><a href="http://getuikit.com/docs/core.html" target="_blank">UI Kit</a></li>
                    <li class="navsub"><a href="http://www.colorhexa.com/00d4d4" target="_blank">colorhexa.com</a></li>
                    <li class="navsub"><a href="https://nonovel.backlog.jp/projects/FUEL" target="_blank">Backlog</a></li>
                    <li class="navsub"><a href="https://twitter.com/nonovel_jp" target="_blank"><i class="uk-icon-twitter"></i> Twitter</a></li>
                    <li class="navsub"><a href="https://facebook.com/nonovel" target="_blank"><i class="uk-icon-facebook-official"></i> Facebook</a></li>
                    <li class="navsub"><a href="#"><i class="uk-icon-rss"></i> RSS</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
