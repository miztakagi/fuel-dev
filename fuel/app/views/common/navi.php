<!-- NAVI -->
<div class="navi" id="navi-header">
  <div id="navi-block" style="display:block;">
    <nav id="navi-height" class="uk-navbar uk-navbar-attached uk-clearfix">
      <div class="uk-float-left">
        <a class="navbar-logo" href="/">
        	<?=Asset::img('logo/logo_190_40.png', array('id'=>'logo', 'class'=>'logo'));?>
        </a>
        <div class="header-comment">
          <span class="user-name">ようこそ、<?=$username?> さん</span><br>
          <span class="copy"><?=$page_copy?></span>
        </div>
      </div>
      <div class="uk-navbar-content uk-navbar-flip">
        <div class="menu-icon">
          <span>検索</span><br>
          <button class="uk-button header-btn" data-uk-modal="{target:'#searchbox'}"><i class="uk-icon-search"></i></button>
        </div>
        <div class="menu-icon">
          <span>お知らせ</span><br>
          <button class="uk-button header-btn" data-uk-modal="{target:'#bell'}"><i class="uk-icon-bell-o"></i></button>
        </div>
      <? if($login){ // ログイン時 ?>
        <div class="menu-icon">
          <span>マイページ</span><br>
          <button class="uk-button header-btn" data-uk-modal="{target:'#mypage'}"><i class="uk-icon-user"></i></button>
        </div>
      <? } ?>
        <div class="menu-icon">
          <span>メニュー</span><br>
          <button class="uk-button header-btn" data-uk-modal="{target:'#menus'}"><i class="uk-icon-bars"></i></button>
        </div>
      <? if($login){ // ログイン時 ?>
        <div class="menu-icon">
          <span>ログアウト</span><br>
          <a href="/logout"><button class="uk-button header-btn"><i class="uk-icon-sign-out"></i></button></a>
        </div>
      <? }else{ // 未ログイン時 ?>
        <div class="menu-icon">
          <span>ログイン</span><br>
          <button class="uk-button header-btn" data-uk-modal="{target:'#login_form'}"><i class="uk-icon-sign-in"></i></button>
        </div>
      <? } ?>
      </div>
    </nav>
  </div>
  <div id="header-border" style="display:none;">
    <a class="icon-center uk-icon-arrow-up"></a>
  </div>
</div>
<!-- END NAVI -->