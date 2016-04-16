<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ののべる</title>
	<?=Asset::css('uikit.css', 'style.scc')?>
</head>
<body>

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
					<a class="uk-button uk-button-danger" href="welcome.php">welcome</a>
					<?=Html::anchor(Router::get('welcome/index'), 'Welcome')?>
				</div>
			</div>

		</nav>

	</div>


<div class="uk-margin">

                                <nav class="uk-navbar">
<ul class="uk-navbar-nav">...</ul>
    <div class="uk-navbar-content">...</div>
    <div class="uk-navbar-content uk-navbar-center">...</div>
                                    <a href="#" class="uk-navbar-toggle"></a>

                                    <div class="uk-navbar-flip">

                                        <a href="" class="uk-navbar-toggle uk-navbar-toggle-alt"></a>

                                    </div>

                                </nav>

                            </div>

<div class="uk-grid uk-container-center uk-width-medium-3-4">
                                    <div class="uk-width-1-3"><div class="uk-panel uk-panel-box"><code>.uk-width-1-3</code></div></div>
                                    <div class="uk-width-1-3"><div class="uk-panel uk-panel-box"><code>.uk-width-1-3</code></div></div>
                                    <div class="uk-width-1-3"><div class="uk-panel uk-panel-box"><code>.uk-width-1-3</code></div></div>
                                </div>
<div class="uk-flex uk-flex-middle uk-flex-space-between">
                               <div class="uk-width-1-4 uk-panel uk-panel-box" style="height: 50px;">Box</div>
                               <div class="uk-width-1-4 uk-panel uk-panel-box" style="height: 70px;">Box</div>
                               <div class="uk-width-1-4 uk-panel uk-panel-box" style="height: 100px;">Box</div>
                           </div>
<div class="uk-width-medium-1-2 uk-container-center uk-flex uk-flex-middle uk-flex-space-between uk-clearfix">
	<header>
		<div class="container">
			<div id="logo">ののべる</div>
		</div>
	</header>
	<div class="container">
		<div class="uk-grid uk-grid-small">
        <div class="uk-width-1-3"><div class="uk-panel uk-panel-box uk-panel-box-primary">Lorem ipsum</div></div>
        <div class="uk-width-1-3"><div class="uk-panel uk-panel-box uk-panel-box-primary">Lorem ipsum</div></div>
        <div class="uk-width-1-3"><div class="uk-panel uk-panel-box uk-panel-box-primary">Lorem ipsum</div></div>
    </div>
		<hr/>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo Fuel::VERSION; ?></small>
			</p>
		</footer>
	</div>
</div>
	<script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>
	<?php echo Asset::js('uikit.min.js'); ?>
</body>
</html>
