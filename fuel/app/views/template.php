<?=Html::doctype('html5')?>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?=Html::meta('robots', 'no-cache')?>
		<?=Html::meta('keywords', 'key1,key2,key3')?>
		<?=Html::meta('description', '!!description')?>
		<title><?php echo $page_title; ?></title>
		<link rel="shortcut icon" href="<?=$iconified?>/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="<?=$iconified?>/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="<?=$iconified?>/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?=$iconified?>/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="<?=$iconified?>/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="<?=$iconified?>/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="<?=$iconified?>/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="<?=$iconified?>/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="<?=$iconified?>/apple-touch-icon-152x152.png" />
		<link rel="apple-touch-icon" sizes="180x180" href="<?=$iconified?>/apple-touch-icon-180x180.png" />
		<!-- CSS -->
		<?=Asset::css('uikit.css')?>
		<?=Asset::css('style.css')?>
	<style>
		body { margin: 5px 10px; }
	</style>
</head>
<body>
	<!-- HEADER NAVI -->
	<?php echo $navi; ?>
	<!-- END HEADER NAVI -->

	<!-- CONTAINER -->
	<div class="container">
		<h1><?php echo $page_title; ?></h1>
		<div class="welcome_user">
			Welcome <?php echo $username; ?>
			<hr>
			<?php
				$items = array(
					'colors' => array('blue', 'red', 'green'),
					'sky',
					'tools' => array('screwdriver','hammer')
				);
				$attr = array('class' => 'order');
				echo Html::ul($items, $attr);

				echo html_tag('a', array(
						'href' => 'http://somedomain.com/',
						'class' => 'my_class',
						'target' => '_blank'),
					'Link title'
				);
			?>
			<hr>
		</div>
			<!-- LOGIN STATUS -->
			<div class="col-md-12">
	<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success">
					<strong>Success</strong>
					<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
					</p>
				</div>
	<?php endif; ?>
	<?php if (Session::get_flash('error')): ?>
				<div class="alert alert-danger">
					<strong>Error</strong>
					<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
					</p>
				</div>
	<?php endif; ?>
			</div><!-- END LOGIN STATUS -->

			<!-- CONTENT -->
			<div class="col-md-12">
				<?php echo $content; ?>
			</div><!-- END CONTENT -->
		</div>
	</div><!-- END CONTAINER -->
	<!-- FOOTER -->
	<footer class="footer">
    &copy; Copyright <?php echo date('Y');?> <?php echo $site_title; ?>
	</footer>
	<!-- JAVASCRIPT -->
	<script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
	<?php echo Asset::js('uikit.min.js'); ?>
	<?php echo Asset::js('script1.js'); ?>
</body>
</html>
