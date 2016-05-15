<?=Html::doctype('html5');?>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<?=Html::meta("X-UA-Compatible", "IE=edge", "http-equiv");?>
		<?=Html::meta('viewport', "width=device-width, initial-scale=1");?>
		<?=Html::meta('robots', "no-cache");?>
		<?=Html::meta('keywords', _KEYWORD);?>
		<?=Html::meta('description', _DESC);?>
		<title><?=$page_title?> | ののべる管理システム</title>
		<link rel="shortcut icon" href="<?=Asset::find_file('favicon.ico', 'img','icons/');?>" type="image/x-icon">
		<link rel="icon" href="<?=Asset::find_file('favicon.ico', 'img','icons/');?>" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="57x57" href="<?=Asset::find_file('apple-icon-57x57.png', 'img','icons/');?>">
		<link rel="apple-touch-icon" sizes="60x60" href="<?=Asset::find_file('apple-icon-60x60.png', 'img','icons/');?>">
		<link rel="apple-touch-icon" sizes="72x72" href="<?=Asset::find_file('apple-icon-72x72.png', 'img','icons/');?>">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=Asset::find_file('apple-icon-76x76.png', 'img','icons/');?>">
		<link rel="apple-touch-icon" sizes="114x114" href="<?=Asset::find_file('apple-icon-114x114.png', 'img','icons/');?>">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=Asset::find_file('apple-icon-120x120.png', 'img','icons/');?>">
		<link rel="apple-touch-icon" sizes="144x144" href="<?=Asset::find_file('apple-icon-144x144.png', 'img','icons/');?>">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=Asset::find_file('apple-icon-152x152.png', 'img','icons/');?>">
		<link rel="apple-touch-icon" sizes="180x180" href="<?=Asset::find_file('apple-icon-180x180.png', 'img','icons/');?>">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?=Asset::find_file('android-icon-192x192.png', 'img','icons/');?>">
		<link rel="icon" type="image/png" sizes="32x32" href="<?=Asset::find_file('favicon-32x32.png', 'img','icons/');?>">
		<link rel="icon" type="image/png" sizes="96x96" href="<?=Asset::find_file('favicon-96x96.png', 'img','icons/');?>">
		<link rel="icon" type="image/png" sizes="16x16" href="<?=Asset::find_file('favicon-16x16.png', 'img','icons/');?>">
		<link rel="manifest" href="<?=Asset::find_file('manifest.json', 'img','icons/');?>">
		<meta name="msapplication-TileColor" content="#08cccc">
		<meta name="msapplication-TileImage" content="<?=Asset::find_file('ms-icon-144x144.png', 'img','icons/');?>">
		<meta name="theme-color" content="#08cccc">
		<!-- Fonts -->
		<?=Asset::css('//fonts.googleapis.com/css?family=Roboto:400,300');?>
		<!-- CSS -->
		<?=Asset::css('uikit.almost-flat.min.css');?>
		<?=Asset::css('style_admin.css');?>
		<!-- JAVASCRIPT -->
		<?=Asset::js('jquery-1.12.3.min.js');?>
		<?=Asset::js('uikit.min.js');?>
		<?=Asset::js('components/grid.min.js');?>
		<?=Asset::js('script.js');?>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- HEAD NAVI -->
		<?php echo $navi; ?>
		<!-- END HEAD NAVI -->
		<!-- CONTAINER -->
		<div class="container">
				<!-- エラー表示 -->
        <? if (!empty($err_message)) { ?>
            <div class="uk-alert uk-alert-danger uk-text-left" id="err_message">
              <ul>
                <li><?=$err_message?></li>
              </ul>
            </div>
        <? } ?>
			<!-- CONTENT -->
			<div id="main-grid">
				<?php echo $content; ?>
			</div>
			<!-- END CONTENT -->
		</div><!-- END CONTAINER -->

	  <!-- FOOTER -->
	  <div id="footer-border" style="display:block;">
	    <a class="icon-center uk-icon-arrow-down"></a>
	  </div>
	  <section class="uk-footer" id="foot" style="display:none;">
	    <button type="button" class="uk-close uk-close-alt" id="footer-close"></button>
	    <div class="uk-container uk-container-center uk-text-center">
	      <ul class="uk-subnav uk-subnav-line uk-flex-center">
	        <li><a href="https://laravel.com/docs/5.2/blade" target="_blank">laravel 5.2</a></li>
	        <li><a href="http://getuikit.com/docs/core.html" target="_blank">UIKit</a></li>
	        <li><a href="http://php.net/manual/ja/ref.array.php" target="_blank">PHP</a></li>
	        <li><a href="http://www.colorhexa.com/00d4d4" target="_blank">COLOR</a></li>
	      </ul>
	      <ul class="uk-subnav uk-subnav-line uk-flex-center">
	        <li><a class="icon" href="http://getuikit.com/docs/icon.html" target="_blank"><i class="fa fa-adjust"></i>ICON</a></li>
	        <li><a class="icon" href="https://nonovel.backlog.jp/projects/FUEL" target="_blank"><i class="fa fa-beer"></i> BACKLOG</a></li>
	      </ul>
	      <div class="uk-panel">
	        <p>&copy; 2016 - <?=date("Y")?> nonovel.jp all right reserverd. / poduced by creative mews inc.</p>
	      </div>
	    </div>
	  </section>
	  <!-- END FOOTER -->

	</body>
</html>
