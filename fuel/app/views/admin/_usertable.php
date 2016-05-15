<!-- MAIN CONTENT -->
<div class="uk-panel uk-panel-box" id="main-panel">
	<div class="row">
		<h3><?php echo Session::get_flash('success','ユーザー一覧', array('class'=>'uk-panel-title'));?></h3>
	</div>
	<div class="row">
		<div class="span8"></div>
	</div>

	<div class="uk-overflow-container">
    <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
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
							<td class="sp_none"><?=$row->group?></td>
							<td><?=$row->email?></td>
							<td class="sp_none"><?=$row->last_login?></td>
							<td class="sp_none"><?=$row->created_at?></td>
							<td class="sp_none"><?=$row->updated_at?></td>
						</tr>
						<?php endforeach;?>
        </tbody>
    </table>
    <?php echo Pagination::create_links();?>
	</div>

</div>
<!-- END MAIN CONTENT -->