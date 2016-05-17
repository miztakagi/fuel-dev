<!-- MYPAGE MENU -->
<nav class="uk-navbar" id="navi-mypage">
    <div class="uk-float-left">
        <ul class="uk-navbar-nav navi-title">
            <li><i class="uk-icon-user"></i> <?=$username?> マイページ<?=$page_name?></li>
        </ul>
    </div>
    <div class="uk-float-right">
        <ul class="uk-navbar-nav">
            <li class="uk-parent" data-uk-dropdown="">
                <a href=""><i class="uk-icon-bars"></i></a>
                <div class="uk-dropdown uk-dropdown-navbar">
                    <ul class="uk-nav uk-nav-navbar">
                        <li class="dropdown-title">マイページMENU</li>
                        <li class="uk-nav-divider"></li>
                        <li class="uk-nav-header"><i class="uk-icon-bookmark"></i> 読む・探す</li>
                        <li><a href="mypage" class="uk-icon-coffee"> ようこそ</a></li>
                        <li><a href="#" class="uk-icon-commenting"> 評価する</a></li>
                        <li><a href="#" class="uk-icon-book"> 購読履歴</a></li>
                        <li class="uk-nav-divider"></li>
                        <li class="uk-nav-header"><i class="uk-icon-pencil"></i> 創る・売る</li>
                        <li><a href="/mypage" class="uk-icon-leaf"> はじめに</a></li>
                        <li><a href="/mypage/itemregist" class="uk-icon-cloud-upload"> 作品登録</a></li>
                        <li><a href="#" class="uk-icon-bar-chart"> 作品管理</a></li>
                        <li><a href="#" class="uk-icon-paypal"> 入出金管理</a></li>
                        <li class="uk-nav-divider"></li>
                        <li class="uk-nav-header"><i class="uk-icon-cog"></i> ユーザ設定</li>
                        <li><a href="#" class="uk-icon-leaf"> ユーザ情報の変更</a></li>
                        <li><li><a href="#" class="uk-icon-lock" data-uk-modal="{target:'#resetmail_form'}"> パスワードの変更</a></li>
                        <li><a href="#" class="uk-icon-user-times"> ユーザ登録の抹消</a></li>
                        <li class="uk-nav-divider"></li>
                        <li class="home"><a href="/index" class="uk-icon-home">トップページに戻る</a></li>
                    </ul>
                </div>

            </li>
        </ul>
    </div>
</nav>
<!-- END MYPAGE MENU -->