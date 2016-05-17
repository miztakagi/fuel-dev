<!-- MAIN CONTENT -->
<div class="uk-grid">
    <div class="uk-width-1-1 uk-flex uk-grid-small uk-flex-center" id="admin_menu">
            <div><button class="uk-button" type="button" data-href="/admin/userlist">ユーザ管理</button></div>
            <div><button class="uk-button" type="button" data-href="/admin/itemdivst">作品管理</button></div>
            <div><button class="uk-button" type="button" data-href="/admin/manage">入出金管理</button></div>
            <div><button class="uk-button" type="button" data-href="/admin/info">お知らせ管理</button></div>
            <div><button class="uk-button" type="button" data-href="/admin/access">アクセス管理</button></div>
    </div>
    <div class="uk-width-1-1 uk-flex uk-grid-small uk-flex-center" id="admin_menu">
            <div><button class="uk-button" type="button" data-href="/index">ユーザTOP</button></div>
            <div><button class="uk-button" type="button" data-href="/logout">ログアウト</button></div>
    </div>
</div>

<div class="uk-grid">
    <div class="uk-width-2-3 uk-grid-small uk-flex uk-align-center">
        <div class="uk-width-1-2"><?=Asset::img('admin/lovelive01.gif', array('alt'=>'lovelive01','style'=>'margin:0 1%;border-radius:4px;'));?></div>
        <div class="uk-width-1-2"><?=Asset::img('admin/lovelive02.gif', array('alt'=>'lovelive02','style'=>'margin:0 1%;border-radius:4px;'));?></div>
    </div>
</div>

<div class="uk-grid">
    <div class="uk-width-2-3 uk-align-center">
        <div class="uk-overflow-container">
            <table class="uk-table uk-table-hover uk-table-condensed" id="access_table">
                <thead>
                    <tr>
                        <th class="uk-text-center">期間</th>
                        <th>アクセス数</th>
                        <th>ユーザ数</th>
                        <th>作品数</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="uk-text-center">今日</th>
                        <td>100</td>
                        <td>200</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <th class="uk-text-center">週間</th>
                        <td>100</td>
                        <td>200</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <th class="uk-text-center">月間</th>
                        <td>100</td>
                        <td>200</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <th class="uk-text-center">総数</th>
                        <td>100</td>
                        <td>200</td>
                        <td>50</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="uk-grid">
    <div class="uk-width-2-3 uk-grid-small uk-flex uk-align-center">
        <div class="uk-width-1-2"><?=Asset::img('admin/ufo01.gif', array('alt'=>'lovelive01','style'=>'margin:0 1%;border-radius:4px;'));?></div>
        <div class="uk-width-1-2"><?=Asset::img('admin/ufo02.gif', array('alt'=>'lovelive02','style'=>'margin:0 1%;border-radius:4px;'));?></div>
    </div>
</div>
<!-- END MAIN CONTENT -->