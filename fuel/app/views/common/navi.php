<div class="uk-margin">
	<div class="navi">
		<nav class="uk-navbar uk-navbar-attached">
			<a href="#menus" class="uk-navbar-toggle uk-float-left" data-uk-offcanvas></a>
			<div id="menus" class="uk-offcanvas" aria-hidden="true">

				<div class="uk-offcanvas-bar uk-offcanvas-bar-show">

					<ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
						<li class="uk-nav-divider"></li>
						<li><?php echo Html::anchor('/','トップへ'); ?></li>

						<li class="uk-nav-divider"></li>
						<li><?php echo Html::anchor('blog','BLOG'); ?></li>

						<li class="uk-nav-divider"></li>
						<li class="uk-parent" aria-expanded="false">
							<a href="#" data-uk-toggle="{target:'#sub1'}">読む・探す</a>
							<div id="sub1" class="uk-hidden">
								<ul class="uk-nav-sub">
									<li><?php echo Html::anchor('welcome','ようこそ'); ?></li>
									<li><a href="#">Sub item</a></li>
									<li><a href="#">Sub item</a></li>
								</ul>
							</div>
						</li>

						<li class="uk-nav-divider"></li>
						<li class="uk-parent" aria-expanded="false">
							<a href="#" data-uk-toggle="{target:'#sub2'}">創る・売る</a>
							<div id="sub2" class="uk-hidden">
								<ul class="uk-nav-sub">
							    <li><a href="#">はじめに</a></li>
                  <li><a href="#">作品登録</a></li>
                  <li><a href="#">評価情報</a></li>
                  <li><a href="#">入出金</a></li>
                  <li class="uk-nav-divider short"></li>
                  <li><a href="#">お問合せ</a></li>
								</ul>
							</div>
						</li>

						<li class="uk-nav-divider"></li>
						<li><a href="#"><i class="uk-icon-star"></i>LINE</a></li>

						<li class="uk-nav-divider"></li>
						<li><a href="#"><i class="uk-icon-twitter"></i>Twitter</a></li>

						<li class="uk-nav-divider"></li>
						<li><a href="#"><i class="uk-icon-fb"></i>facebook</a></li>

						<li class="uk-nav-divider"></li>
						<li><a href="#"><i class="uk-icon-rss"></i>RSS</a></li>

						<li class="uk-nav-divider"></li>
						<li><a href="http://qiita.com/kazukichi/items/2a6e242091c5f485b976" target="_blank">Fuelの使い方</a></li>
						<li><a href="http://getuikit.com/docs/core.html" target="_blank">UIKit</a></li>
						<li><a href="http://fuelphp.jp/docs/1.8/general/controllers/base.html" target="_blank">FuelPHP Documents</a></li>
						<li class="uk-nav-divider"></li>
					</ul>

				</div>

			</div>

			<a class="uk-navbar-brand uk-flex-center" href="/"><?=Asset::img('logo/nonovel_logo_120.png', array('id'=>'logo', 'class'=>'logo', 'width'=>'40px', 'height'=>'40px'));?></a>
			<div class="uk-navbar-content  uk-navbar-flip">
				<button class="uk-button" data-uk-offcanvas="{target:'#searchbox'}"><i class="uk-icon-search"></i></button>
				<a class="uk-button" href="<?php echo Uri::create('login/index'); ?>">ログイン</a>
			</div>
		</nav>
		
		<div aria-hidden="true" id="searchbox" class="uk-offcanvas">
			<div class="uk-offcanvas-bar">
				<form class="uk-search" data-uk-search="{source:'my-results.json'}">
					<input class="uk-search-field" placeholder="search..." type="search">
				</form>
			</div>
		</div>

	</div>
</div>
