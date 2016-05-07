<!DOCTYPE html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo isset($title) ? $title : 'Winroad徒然草'; ?></title>
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<?php echo Asset::css('bootstrap.min.css');?>
		<?php echo Asset::css('bootstrap-responsive.min.css');?>
		<?php echo Asset::css('admin.css');?>
		<?php echo Asset::js('jquery-1.12.3.min.js');?>
		<?php echo Asset::js('bootstrap.min.js');?>
	</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span4 offset2">
				<h2 style="text-align:center">新規ユーザ登録</h2>
				<?php echo Form::open(array('name'=>'create','method'=>'post','class'=>'form-horizontal')); ?>
				<?php echo '<div class="alert-error">'.Session::get_flash('error').'</div>'?>

				<div class="control-group">
					<label class="control-label" for="username">ユーザー名</label>
				 	<div class="controls">
				 		<?php echo Form::input('username',Input::post('username'));?>
				 	</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="email">Eメール</label>
					<div class="controls">
						<?php echo Form::input('email',Input::post('email'));?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="password">パスワード</label>
					<div class="controls">
						<?php echo Form::password('password');?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="group">所属グループ</label>
					<div class="controls">
						<?php echo Form::select('group',null,array('group'=>Model_Admin::config_groups()));?>
					</div>
				</div>
				<div class="form-actions">
					<?php echo Form::submit('submit','新規登録',array('class' => 'btn btn-primary span3'));?>
				</div>
				<?php echo Form::close();?>
			</div><!--/span4 offset2-->
		</div><!--/row-->

		<div id="footer" style="background-color:yellow; text-align: center;">
			<p>nonovel.jp</p>
			<p>表示速度{exec_time}s　使用メモリ{mem_usage}mb</p>
		</div><!--/footer-->
	</div><!--/container-->
</body>
</html>