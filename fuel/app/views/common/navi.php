<div class="uk-margin">
	<div class="navi">
		<nav class="uk-navbar uk-navbar-attached">
			<a href="#menus" class="uk-navbar-toggle uk-float-left" data-uk-offcanvas></a>
			<div id="menus" class="uk-offcanvas" aria-hidden="true">

				<div class="uk-offcanvas-bar uk-offcanvas-bar-show">

					<ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
						<li class="uk-nav-divider"></li>
						<li><?php echo Html::anchor('/',' トップへ', array('class'=>'uk-icon-home')); ?></li>

						<li class="uk-nav-divider"></li>
						<li><?php echo Html::anchor('member/index',' マイページ', array('class'=>'uk-icon-heart')); ?></li>

						<li class="uk-nav-divider"></li>
						<li><?php echo Html::anchor('blog',' インフォ', array('class'=>'uk-icon-info')); ?></li>

						<li class="uk-nav-divider"></li>
						<li class="uk-parent" aria-expanded="false">
							<a href="#" data-uk-toggle="{target:'#sub1'}" class="uk-icon-bookmark"> 読む・探す</a>
							<div id="sub1" class="uk-hidden">
								<ul class="uk-nav-sub">
									<li><?php echo Html::anchor('welcome',' ようこそ', array('class'=>'uk-icon-coffee')); ?></li>
									<li><a href="#" class="uk-icon-commenting"> 評価する</a></li>
									<li><a href="#" class="uk-icon-book"> 購読履歴</a></li>
								</ul>
							</div>
						</li>

						<li class="uk-nav-divider"></li>
						<li class="uk-parent" aria-expanded="false">
							<a href="#" data-uk-toggle="{target:'#sub2'}" class="uk-icon-pencil"> 創る・売る</a>
							<div id="sub2" class="uk-hidden">
								<ul class="uk-nav-sub">
							    <li><a href="#" class="uk-icon-leaf"> はじめに</a></li>
                  <li><a href="#" class="uk-icon-cloud-upload"> 作品登録</a></li>
                  <li><a href="#" class="uk-icon-bar-chart"> 評価情報</a></li>
                  <li><a href="#" class="uk-icon-paypal"> 入出金</a></li>
                  <li class="uk-nav-divider short"></li>
								</ul>
							</div>
						</li>

						<li class="uk-nav-divider"></li>
						<li><a href="#"><i class="uk-icon-star"></i> LINE</a></li>

						<li class="uk-nav-divider"></li>
						<li><a href="#"><i class="uk-icon-twitter"></i> Twitter</a></li>

						<li class="uk-nav-divider"></li>
						<li><a href="#"><i class="uk-icon-facebook-official"></i> facebook</a></li>

						<li class="uk-nav-divider"></li>
						<li><a href="#"><i class="uk-icon-rss"></i> RSS</a></li>

						<li class="uk-nav-divider"></li>
						<li><a href="#" class="uk-icon-send"> お問合せ</a></li>

						<li class="uk-nav-divider"></li>
						<li><a href="http://qiita.com/kazukichi/items/2a6e242091c5f485b976" target="_blank">Fuelの使い方</a></li>
						<li><a href="http://getuikit.com/docs/core.html" target="_blank">UIKit</a></li>
						<li><a href="http://fuelphp.jp/docs/1.8/general/controllers/base.html" target="_blank">FuelPHP Documents</a></li>
						<li class="uk-nav-divider"></li>
					</ul>

				</div>

			</div>

			<a class="uk-navbar-brand uk-flex-center" href="/"><?=Asset::img('logo/nonovel_logo_120.png', array('id'=>'logo', 'class'=>'logo', 'width'=>'40px', 'height'=>'40px'));?></a>
			<span class="copy"><?=$page_copy?></span>
			<div class="uk-navbar-content  uk-navbar-flip">
				<button class="uk-button" data-uk-offcanvas="{target:'#searchbox'}"><i class="uk-icon-search"></i></button>
				<button class="uk-button" data-uk-modal="{target:'#bell'}"><i class="uk-icon-bell-o"></i></button>
				<button class="uk-button" data-uk-modal="{target:'#login_form'}"><i class="uk-icon-user"></i> ログイン</button>
			</div>
		</nav>
		
		<div aria-hidden="true" id="searchbox" class="uk-offcanvas">
			<div class="uk-offcanvas-bar">
				<form class="uk-search" data-uk-search="{source:'my-results.json'}">
					<input class="uk-search-field" placeholder="search..." type="search">
				</form>
			</div>
		</div>

		<div id="login_form" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
			<div class="uk-modal-dialog">
		    <button type="button" class="uk-modal-close uk-close"></button>
		    <div class="uk-modal-header">
		        <h2>ログイン</h2>
		    </div>
		    <?php //echo $add_error; ?>
				<form name="form1" method="post" action="">
					<table width="100%" border="0" class="uk-table">
						<tr><th scope="row">ユーザー名</th>
							<td>
								<label for="username"></label>
								<input name="username" type="text" id="username">
							</td>
						</tr>
						<tr><th scope="row">メールアドレス</th>
							<td>
								<label for="email"></label>
								<input type="text" name="email" id="email">
							</td>
						</tr>
						<tr><th scope="row">ご住所</th>
							<td>
								<label for="email"></label>
								<input type="text" name="address" id="address">
							</td>
						</tr>
						<tr><th scope="row">パスワード</th>
							<td>
								<label for="password"></label>
								<input type="password" name="password" id="password">
							</td>
						</tr>
						<tr>
							<th colspan="2" scope="row">
								<input type="submit" name="ok" id="ok" class="uk-button" value="ログインする">
							</th>
						</tr>
					</table>
				</form>
				<div class="uk-modal-footer uk-clearfix">
		        <button type="button" class="uk-button uk-float-left">新規会員登録はこちら</button>
		        <button type="button" class="uk-button uk-float-right uk-modal-close">キャンセル</button>
		    </div>
			</div>
		</div>

	</div>
</div>
