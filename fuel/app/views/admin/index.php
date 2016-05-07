<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo isset($title) ? $title : 'Winroad徒然草'; ?></title>
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<?php echo Asset::css('bootstrap.min.css');?>
		<?php echo Asset::css('bootstrap-responsive.min.css');?>
		<?php echo Asset::css('style.css');?>
		<?php echo Asset::js('jquery-1.12.3.min.js');?>
		<?php echo Asset::js('bootstrap.min.js');?>
	</head>
<body>
	<div class="container">

		<div class="row">
			<h3><?php echo Session::get_flash('success','ユーザー一覧');?></h3>
		</div>
		<div class="row">
			<div class="span8"></div>
		</div>
		<div class="row">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>ユーザ名</th>
						<th class="sp_none">グループ</th>
						<th>Eメール</th>
						<th class="sp_none">最終ログイン</th>
						<th class="sp_none">作成日</th>
						<th class="sp_none">更新日</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $row): ?>
					<tr>
						<td><?=$row->id?></td>
						<td><?php echo Html::anchor('adimin/edit/'.$row->id,$row->username);?></td>
						<th class="sp_none"><?=$row->group?></th>
						<th><?=$row->email?></th>
						<th class="sp_none"><?=$row->last_login?></th>
						<td class="sp_none"><?=$row->created_at?></td>
						<td class="sp_none"><?=$row->updated_at?></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
			<?php echo Pagination::create_links();?>
		</div>

		<div id="footer" style="background-color:yellow; text-align: center;">
			<p>nonovel.jp</p>
			<p>表示速度{exec_time}s　使用メモリ{mem_usage}mb</p>
		</div><!--/footer-->
	</div><!--/container-->
</body>
</html>