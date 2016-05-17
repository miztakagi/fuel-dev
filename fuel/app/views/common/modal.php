<!-- MODAL -->
<div id="modals">
  <? $username = (!empty(Session::get('username'))) ? Session::get('username') : ''; ?>
  <? $email    = (!empty(Cookie::get('email'))) ? Cookie::get('email') : ''; ?>

  <!-- MODAL MENU -->
  <div id="menus" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
      <div class="uk-modal-header">
          <h2><i class="uk-icon-bars"></i> サイトメニュー</h2>
      </div>
      <div>
        <button class="uk-button uk-button-large menu-btn" data-href="/index"><i class="uk-icon-home"></i> トップへ</button>
      </div>
      <div>
        <button class="uk-button uk-button-large menu-btn" data-href="/info/index"><i class="uk-icon-info"></i> お知らせ</button>
      </div>
      <div>
        <button class="uk-button uk-button-large menu-btn" data-href="/how/index"><i class="uk-icon-hashtag"></i> このサイトの使い方</button>
      </div>

    <? if (!Auth::check()) { ?>
      <div>
        <button class="uk-button uk-button-large menu-btn" data-uk-modal="{target:'#login'}"><i class="uk-icon-info"></i> ログイン</button>
      </div>
      <div>
        <button class="uk-button uk-button-large menu-btn" data-uk-modal="{target:'#regist_form'}"><i class="uk-icon-info"></i> 新規ユーザ登録</button>
      </div>
    <? } else { ?>
      <div>
        <button class="uk-button uk-button-large menu-btn" data-uk-modal="{target:'#mypage'}"><i class="uk-icon-heart"></i> マイページ</button>
      </div>
    <? } ?>

      <div class="uk-grid uk-grid-divider uk-grid-small">
        <div class="uk-width-1-4 line-padd">
          <a href=""><i class="uk-icon-star"></i><br>LINE</a>
        </div>
        <div class="uk-width-1-4 line-padd">
          <a href=""><i class="uk-icon-twitter"></i><br>Twitter</a>
        </div>
        <div class="uk-width-1-4 line-padd">
          <a href=""><i class="uk-icon-facebook-official"></i><br>facebook</a>
        </div>
        <div class="uk-width-1-4 line-padd">
          <a href=""><i class="uk-icon-rss"></i><br>RSS</a>
        </div>
      </div>

      <div>
        <button class="uk-button uk-button-large menu-btn" data-uk-modal="{target:'#request'}"><i class="uk-icon-send"> お問合せ</i></button>
      </div>

    <? if (Session::get('admin')) { ?>
      <div>
        <button class="uk-button uk-button-large menu-btn admin" data-href="/admin/index"><i class="uk-icon-user-secret"></i> 管理画面へ</button>
      </div>
    <? } ?>

      <ul>
        <li><a href="http://qiita.com/kazukichi/items/2a6e242091c5f485b976" target="_blank">Fuelの使い方</a></li>
        <li><a href="http://getuikit.com/docs/core.html" target="_blank">UIKit</a></li>
        <li><a href="http://fuelphp.jp/docs/1.8/general/controllers/base.html" target="_blank">FuelPHP Documents</a></li>
      </ul>
    </div>
  </div>
  <!-- MODAL SEARCH -->
  <div id="searchbox" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
      <div class="uk-modal-header">
          <h2><i class="uk-icon-search"></i> 検索</h2>
      </div>
      <?=Form::open(array('id'=>'searchform', 'name'=>'searchform', 'action'=>'search', 'method'=>'post', 'class'=>'uk-form uk-width-medium-1-1'))?>
        <?=Form::csrf()?>
          <div class="uk-form-controls">
            <input placeholder="フリーワード" name="searchwords" type="search" class="uk-width-1-1 uk-form-large">
          </div>
          <div class="uk-form-controls">
            <select name="category1" class="uk-form-large">
              <option value="">すべてのカテゴリ</option>
              <option value="1">小説</option>
              <option value="2">エッセイ</option>
              <option value="3">哲学・思想</option>
              <option value="4">技術・実用・ビジネス</option>
              <option value="5">イラスト・写真</option>
            </select>
          </div>
          <div class="uk-form-controls">
            <select name="category2" class="uk-form-large">
              <option value="">すべての読者向け</option>
              <option value="1">一般向け</option>
              <option value="2">子供向け</option>
              <option value="3">R指定あり</option>
              <option value="4">成人向け</option>
            </select>
          </div>
          <div class="uk-text-center">
            <button type="submit" class="uk-button uk-button-large">検索する</button>
          </div>
      <?=Form::close()?>
    </div>
  </div>

<? if ($login==0) { ?>
  <? $zip1     = (!empty($input['zip1'])) ? $input['zip1'] : ''; ?>
  <? $zip2     = (!empty($input['zip2'])) ? $input['zip2'] : ''; ?>

  <? if ($modal=='login') { ?>
    <script>
      $(function(){ modalOpen("#login_form"); });
    </script>
  <? } else if ($modal=='regist'){ ?>
    <script>
      $(function(){ modalOpen("#regist_form"); });
    </script>
  <? } else if ($modal=='registagain'){ ?>
    <script>
      $(function(){ modalOpen("#registagain_form"); });
    </script>
  <? } else if ($modal=='registcode'){ ?>
    <script>
      $(function(){ modalOpen("#registcode_form"); });
    </script>
  <? } else if ($modal=='resetmail'){ ?>
    <script>
      $(function(){ modalOpen("#resetmail_form"); });
    </script>
  <? } else if ($modal=='resetcode'){ ?>
    <script>
      $(function(){ modalOpen("#resetcode_form"); });
    </script>
  <? } else if ($modal=='resetpassform'){ ?>
    <script>
      $(function(){ modalOpen("#resetpass_form"); });
    </script>
  <? } ?>

  <!-- MODAL LOGIN FORM -->
  <div id="login_form" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
      <div class="uk-modal-header">
          <h2><i class="uk-icon-sign-in"></i> ログイン</h2>
      </div>

      <? if(!empty($message) && $modal=="login"){ ?>
        <div class="uk-alert uk-text-left">
          <ul>
            <li><?=$message?></li>
          </ul>
        </div>
      <? } ?>

      <? if(count($errors) > 0 && $modal=="login"){ ?>
        <div class="uk-alert uk-alert-danger uk-text-left err">
          <ul>
          <? foreach ($errors as $error){ ?>
            <? if (preg_match("/ユーザ登録が完了していません/", $error)) {?>
              <script>$("#regist_new").removeClass("disp_on").addClass("disp_off");$("#regist_again").removeClass("disp_off").addClass("disp_on");</script>
            <? } ?>
            <li><?=$error?></li>
          <? } ?>
          </ul>
        </div>
      <? } ?>

      <?=Form::open(array('id'=>'loginform', 'name'=>'loginform', 'action'=>'login', 'method'=>'post', 'class'=>'uk-form'))?>
        <?=Form::hidden('formname', 'loginform')?>
        <?=Form::hidden('remember', 1)?>
        <table width="100%" border="0" class="uk-table">
          <tr>
            <td class="uk-form-controls noborder">
              <?=Form::input('email', $email, array('type'=>'email', 'class'=>'uk-width-1-1 uk-form-large', 'placeholder'=>'メールアドレス'))?>
            </td>
          </tr>
          <tr>
            <td class="uk-form-controls noborder">
              <?=Form::password('password', '', array('class'=>'uk-width-1-1 uk-form-large', 'placeholder'=>'パスワード'))?>
            </td>
          </tr>
          <tr>
            <td class="noborder">
              <?=Form::label('メールアドレスを保持する', 'rememberme')?><?=Form::checkbox('rememberme', 1, true)?>
            </td>
          </tr>
          <tr>
            <td class="noborder">
              <?=Form::button('ok', 'ログインする', array('type'=>'submit', 'class'=>'uk-button uk-button-large'));?>
            </td>
          </tr>
          <tr>
            <td class="uk-ckearfix noborder uk-align-right">
                <?=Form::button('resetpass', 'パスワードを忘れた？', array('class'=>'uk-button uk-float-left mr10', 'type'=>'button', 'data-uk-modal'=>'{target:\'#resetmail_form\'}'));?>
                <?=Form::button('registnew', '新規ユーザ登録（無料）', array('class'=>'uk-button uk-float-left', 'type'=>'button', 'data-uk-modal'=>'{target:\'#regist_form\'}'));?>
            </td>
          </tr>
        </table>
      <?=Form::close()?>
    </div>
  </div>
  <!-- MODAL REGIST FORM -->
  <div id="regist_form" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
      <div class="uk-modal-header">
          <h2><i class="uk-icon-user"></i> ユーザ登録</h2>
      </div>

      <? if(count($errors) > 0 && $modal=="regist"){ ?>
        <div class="uk-alert uk-alert-danger uk-text-left err">
          <ul>
          <? foreach ($errors as $error){ ?>
            <li><?=$error?></li>
          <? } ?>
          </ul>
        </div>
      <? } ?>

      <?=Form::open(array('id'=>'registform', 'name'=>'registform', 'action'=>'regist', 'method'=>'post', 'class'=>'uk-form'))?>
        <?=Form::hidden('formname', 'registform')?>
        <table width="100%" border="0" class="uk-table">
          <tr>
            <td class="uk-form-controls noborder">
              <input name="username" type="text" id="username" class="uk-width-1-1 uk-form-large" placeholder='ユーザ名' value="<?=$username?>" />
            </td>
          </tr>
          <tr>
            <td class="uk-form-controls uk-text-left noborder">
              <?=Form::input('zip1', $zip1, array('type'=>'tel', 'class'=>'uk-width-1-1 uk-form-large zip-width', 'pattern'=>'\d*', 'maxlength'=>'3', 'placeholder'=>'〒'))?>
              <i class="uk-icon-minus"></i>
              <?=Form::input('zip2', $zip2, array('type'=>'tel', 'class'=>'uk-width-1-1 uk-form-large zip-width', 'pattern'=>'\d*', 'maxlength'=>'4', 'placeholder'=>'〒'))?>
            </td>
          </tr>
          <tr>
            <td class="uk-form-controls noborder">
              <?=Form::input('email', $email, array('type'=>'email', 'class'=>'uk-width-1-1 uk-form-large', 'placeholder'=>'メールアドレス'))?>
            </td>
          </tr>
          <tr>
            <td class="uk-form-controls noborder">
              <?=Form::input('password', '', array('type'=>'password', 'class'=>'uk-width-1-1 uk-form-large', 'placeholder'=>'パスワード'))?>
            </td>
          </tr>
          <tr>
            <td class="uk-form-controls noborder">
              <?=Form::input('password_confirmation', '', array('type'=>'password', 'class'=>'uk-width-1-1 uk-form-large', 'placeholder'=>'パスワード確認'))?>
            </td>
          </tr>
          <tr>
            <td class="uk-align-left noborder">
              <?=Form::button('ok', '登録する', array('class'=>'uk-button uk-button-large mr10 registsubmit', 'type'=>'submit'));?>
              <?=Form::button('cancel', 'キャンセル', array('class'=>'uk-button uk-button-large uk-modal-close', 'type'=>'button'));?>
            </td>
          </tr>
        </table>
      <?=Form::close()?>
    </div>
  </div>
  <!-- MODAL REGIST AGAIN FORM -->
  <div id="registagain_form" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
      <div class="uk-modal-header">
          <h2><i class="uk-icon-user"></i> ユーザ登録確認メールの送信</h2>
      </div>

      <? if(count($errors) > 0 && $modal=="registagain"){ ?>
        <div class="uk-alert uk-alert-danger uk-text-left err">
          <ul>
          <? foreach ($errors as $error){ ?>
            <li><?=$error?></li>
          <? } ?>
          </ul>
        </div>
      <? } ?>
      
      <?=Form::open(array('id'=>'registagainform', 'name'=>'registagainform', 'action'=>'registagain', 'method'=>'post', 'class'=>'uk-form'))?>
        <?=Form::hidden('formname', 'registagainform')?>
        <table width="100%" border="0" class="uk-table">
          <tr>
            <td class="uk-form-controls noborder">
              <?=Form::input('email', $email, array('type'=>'email', 'class'=>'uk-width-1-1 uk-form-large', 'placeholder'=>'メールアドレス'))?>
            </td>
          </tr>
          <tr>
            <td class="uk-form-controls noborder">
              <?=Form::password('password', '', array('class'=>'uk-width-1-1 uk-form-large', 'placeholder'=>'パスワード'))?>
            </td>
          </tr>
          <tr>
            <td class="uk-clearfix noborder">
              <?=Form::button('ok', 'ユーザ登録確認メール再送信', array('type'=>'submit', 'class'=>'uk-button uk-float-left uk-button-large registsubmit'));?>
              <?=Form::button('new', 'パスワードを忘れた？', array('class'=>'uk-button uk-float-right uk-button', 'type'=>'button', 'data-uk-modal'=>'{target:\'#resetmail_form\'}'));?>
            </td>
          </tr>
        </table>
      <?=Form::close()?>
    </div>
  </div>
  <!-- MODAL REGISTCODE FORM -->
  <div id="registcode_form" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <div class="uk-modal-header">
          <h2><i class="uk-icon-user-plus"></i> ユーザ登録確認</h2>
      </div>

      <? if(count($errors) > 0 && $modal=="registcode"){ ?>
        <div class="uk-alert uk-alert-danger uk-text-left err">
          <ul>
          <? foreach ($errors as $error){ ?>
            <li><?=$error?></li>
          <? } ?>
          </ul>
        </div>
      <? } ?>

      <div class="">
        ユーザ登録確認メールを送信しました。<br>
        「ののべる - ユーザ登録メール」に記載されている確認用コードを入力するとユーザ登録が完了します。
        <p class="alert">この画面は閉じないでメールをお待ち下さい。</p>
      </div>
      <?=Form::open(array('id'=>'registcodeform', 'name'=>'registcodeform', 'action'=>'registcheck', 'method'=>'post', 'class'=>'uk-form'))?>
        <?=Form::hidden('formname', 'registcodeform')?>
        <table width="100%" border="0" class="uk-table">
          <tr>
            <td class="uk-form-controls noborder">
              <?=Form::input('mailcode', '', array('class'=>'uk-width-1-1 uk-form-large', 'placeholder'=>'確認コード'))?>
            </td>
          </tr>
          <tr>
            <td class="uk-align-left noborder">
              <?=Form::button('ok', 'ユーザ登録完了＆ログイン', array('type'=>'submit', 'class'=>'uk-button uk-button-large'));?>
            </td>
          </tr>
        </table>
      <?=Form::close()?>
    </div>
  </div>

<? } else { ?>

  <!-- MODAL MYPAGE -->
  <div id="mypage" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
      <div class="uk-modal-header">
          <h2><i class="uk-icon-user"></i> マイページ</h2>
      </div>
      <div>
        <div aria-expanded="false" aria-haspopup="true" class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
            <button class="uk-button uk-button-large menu-btn"><i class="uk-icon-bookmark"></i> 読む・探す <i class="uk-icon-caret-down"></i></button>
            <div style="top: 30px; left: 0px;" class="uk-dropdown uk-dropdown-bottom dropdown-inner">
                <ul class="uk-nav uk-nav-dropdown uk-dropdown-close">
                    <li><a href="mypage" class="uk-icon-coffee"> ようこそ</a></li>
                    <li><a href="#" class="uk-icon-commenting"> 評価する</a></li>
                    <li><a href="#" class="uk-icon-book"> 購読履歴</a></li>
                </ul>
            </div>
        </div>
      </div>
      <div>
        <div aria-expanded="false" aria-haspopup="true" class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
            <button class="uk-button uk-button-large menu-btn"><i class="uk-icon-pencil"></i> 創る・売る <i class="uk-icon-caret-down"></i></button>
            <div style="top: 30px; left: 0px;" class="uk-dropdown uk-dropdown-bottom dropdown-inner">
                <ul class="uk-nav uk-nav-dropdown uk-dropdown-close">
                    <li><a href="/mypage" class="uk-icon-leaf"> はじめに</a></li>
                    <li><a href="/mypage/itemregist" class="uk-icon-cloud-upload"> 作品登録</a></li>
                    <li><a href="#" class="uk-icon-bar-chart"> 作品管理</a></li>
                    <li><a href="#" class="uk-icon-paypal"> 入出金管理</a></li>
                </ul>
            </div>
        </div>
      </div>
      <div>
        <div aria-expanded="false" aria-haspopup="true" class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
            <button class="uk-button uk-button-large menu-btn"><i class="uk-icon-cog"></i> ユーザ設定 <i class="uk-icon-caret-down"></i></button>
            <div style="top: 30px; left: 0px;" class="uk-dropdown uk-dropdown-bottom dropdown-inner">
                <ul class="uk-nav uk-nav-dropdown uk-dropdown-close">
                    <li><a href="#" class="uk-icon-leaf"> ユーザ情報の変更</a></li>
                    <li><a href="#" class="uk-icon-cloud-upload"> パスワードの変更</a></li>
                    <li><a href="#" class="uk-icon-user-times"> ユーザ登録の抹消</a></li>
                </ul>
            </div>
        </div>
      </div>
    </div>
  </div>

<? } ?>

  <!-- MODAL RESETPASSWORD MAIL FORM -->
  <div id="resetmail_form" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
      <div class="uk-modal-header">
          <h2><i class="uk-icon-lock"></i> パスワード再設定</h2>
      </div>

      <? if(count($errors) > 0 && $modal=="resetmail"){ ?>
        <div class="uk-alert uk-alert-danger uk-text-left err">
          <ul>
          <? foreach ($errors as $error){ ?>
            <li><?=$error?></li>
          <? } ?>
          </ul>
        </div>
      <? } ?>

      <?=Form::open(array('id'=>'resetmailform', 'name'=>'resetmailform', 'action'=>'resetmail', 'method'=>'post', 'class'=>'uk-form'))?>
        <?=Form::hidden('formname', 'resetmailform')?>
        <table width="100%" border="0" class="uk-table">
          <tr>
            <td class="uk-form-controls noborder">
              <?=Form::input('email', $email, array('type'=>'email', 'class'=>'uk-width-1-1 uk-form-large', 'placeholder'=>'メールアドレス'))?>
            </td>
          </tr>
          <tr>
            <td class="uk-align-left noborder">
              <?=Form::button('ok', '再設定メールを送信する', array('type'=>'submit', 'class'=>'uk-button uk-button-large registsubmit mr10'));?>
              <?=Form::button('cancel', 'キャンセル', array('type'=>'button', 'class'=>'uk-button uk-button-large uk-modal-close'));?>
            </td>
          </tr>
        </table>
      <?=Form::close()?>
    </div>
  </div>
  <!-- MODAL RESET CODE FORM -->
  <div id="resetcode_form" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <div class="uk-modal-header">
          <h2><i class="uk-icon-lock"></i> パスワード変更確認</h2>
      </div>

      <? if(count($errors) > 0 && $modal=="resetcode"){ ?>
        <div class="uk-alert uk-alert-danger uk-text-left err">
          <ul>
          <? foreach ($errors as $error){ ?>
            <li><?=$error?></li>
          <? } ?>
          </ul>
        </div>
      <? } ?>

      <div class="">
        パスワード再設定確認メールを送信しました。<br>
        「ののべる - パスワード再設定メール」に記載されている確認用コードを入力すると新しいパスワードを設定することができます。
        <p class="alert">この画面は閉じないでメールをお待ち下さい。</p>
      </div>
      <?=Form::open(array('id'=>'resetcodeform', 'name'=>'resetcodeform', 'action'=>'resetcode', 'method'=>'post', 'class'=>'uk-form'))?>
        <?=Form::hidden('formname', 'resetcodeform')?>
        <table width="100%" border="0" class="uk-table">
          <tr>
            <td class="uk-form-controls noborder">
              <?=Form::input('resetmailcode', '', array('class'=>'uk-width-1-1 uk-form-large', 'placeholder'=>'確認コード'))?>
            </td>
          </tr>
          <tr>
            <td class="uk-align-left noborder">
              <?=Form::button('ok', 'パスワードを再設定する', array('type'=>'submit', 'class'=>'uk-button uk-button-large'));?>
            </td>
          </tr>
        </table>
      <?=Form::close()?>
    </div>
  </div>
  <!-- MODAL RESET PASSWORD FORM -->
  <div id="resetpass_form" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
      <div class="uk-modal-header">
          <h2><i class="uk-icon-lock"></i> パスワード再設定</h2>
      </div>

      <? if(!empty($message) && $modal=="resetpassform"){ ?>
        <div class="uk-alert uk-text-left">
          <ul>
            <li><?=$message?></li>
          </ul>
        </div>
      <? } ?>

      <? if(count($errors) > 0 && $modal=="resetpassform"){ ?>
        <div class="uk-alert uk-alert-danger uk-text-left err">
          <ul>
          <? foreach ($errors as $error){ ?>
            <li><?=$error?></li>
          <? } ?>
          </ul>
        </div>
      <? } ?>

      <?=Form::open(array('id'=>'resetpassform', 'name'=>'resetpassform', 'action'=>'resetpass', 'method'=>'post', 'class'=>'uk-form'))?>
        <?=Form::hidden('formname', 'resetpassform')?>
        <table width="100%" border="0" class="uk-table">
          <tr>
            <td class="uk-form-controls noborder">
              <?=Form::input('email', $email, array('type'=>'email', 'class'=>'uk-width-1-1 uk-form-large', 'placeholder'=>'メールアドレス'))?>
            </td>
          </tr>
          <tr>
            <td class="uk-form-controls noborder">
              <?=Form::input('password', '', array('type'=>'password', 'class'=>'uk-width-1-1 uk-form-large', 'placeholder'=>'新しいパスワード'))?>
            </td>
          </tr>
          <tr>
            <td class="uk-form-controls noborder">
              <?=Form::input('password_confirmation', '', array('type'=>'password', 'class'=>'uk-width-1-1 uk-form-large', 'placeholder'=>'新しいパスワード確認'))?>
            </td>
          </tr>
          <tr>
            <td class="uk-align-left noborder">
              <?=Form::button('ok', '新しいパスワードを登録する', array('type'=>'submit', 'class'=>'uk-button uk-button-large mr10'));?>
              <?=Form::button('cancel', 'キャンセル', array('type'=>'button', 'class'=>'uk-button uk-button-large uk-modal-close'));?>
            </td>
          </tr>
        </table>
      <?=Form::close()?>
    </div>
  </div>

  <!-- MODAL INFO -->
  <div id="infobox" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
      <div class="uk-modal-header">
          <h2><i class="uk-icon-info-circle"></i> 読んでみる？</h2>
      </div>
        <p class="info-text uk-text-left">
        ラノベ？それとも純文学？<br>いえいえ、これぞまさに「野ノベル」です！<br>もはやジャンル無用のインディーズ作家たちのユニークな作品がいっぱいです！<br>新しい「面白さ」を発見して下さい。検索は<button class="uk-button" data-uk-modal="{target:'#searchbox'}">コチラ</button>から
        </p>
    </div>
  </div>
</div>
<!-- END MODAL -->
