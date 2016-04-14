<div class="uk-margin">

	<nav class="uk-navbar">

		<a class="uk-navbar-brand" href="#">Brand</a>

		<ul class="uk-navbar-nav">
			<li class="uk-parent uk-active" data-uk-dropdown="" aria-haspopup="true" aria-expanded="false">
				<a href=""><i class="uk-icon-home"></i> Level1</a>

				<div class="uk-dropdown uk-dropdown-navbar uk-dropdown-bottom" style="top: 40px; left: 0px;">
					<ul class="uk-nav uk-nav-navbar">
						<li><a href="#">Item</a></li>
						<li><a href="#">Another item</a></li>
						<li class="uk-nav-header">Header</li>
						<li><a href="#">Item</a></li>
						<li><a href="#">Another item</a></li>
						<li class="uk-nav-divider"></li>
						<li><a href="#">Separated item</a></li>
					</ul>
				</div>

			</li>
		</ul>

		<div class="uk-navbar-content">Some <a href="#">link</a>.</div>

		<div class="uk-navbar-content uk-hidden-small">
			<form class="uk-form uk-margin-remove uk-display-inline-block">
				<input type="text" placeholder="Search">
				<button class="uk-button uk-button-primary">Submit</button>
			</form>
		</div>

		<div class="uk-navbar-content uk-navbar-flip  uk-hidden-small">
			<div class="uk-button-group">
				<a class="uk-button" href="http://qiita.com/kazukichi/items/2a6e242091c5f485b976" target="_blank">ざっくりFuelPHPの使い方</a>
				<button class="uk-button uk-button-info"><?php echo Html::anchor('welcome','トップへ'); ?></button>
				<a class="uk-button" href="http://getuikit.com/docs/core.html" target="_blank">UIKit</a>
				<a class="uk-button" href="<?php echo Uri::create('login/index'); ?>">ログイン</a>
			</div>
		</div>

	</nav>

</div>
