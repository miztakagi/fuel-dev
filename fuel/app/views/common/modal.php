<!-- MODAL -->
<div id="modals">

  <? $username = (!empty($input['username'])) ? $input['username'] : ''; ?>
  <? $email    = (!empty($input['email'])) ? $input['email'] : ''; ?>
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
  <? } ?>

  <!-- MODAL MENU -->
  <div id="menus" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
      <div class="uk-modal-header">
          <h2><i class="uk-icon-bars"></i> サイトメニュー</h2>
      </div>
      <div>
        <button class="uk-button uk-button-large menu-btn"><a href="{{ url('/') }}"><i class="uk-icon-home"></i> トップへ</a></button>
      </div>
      <div>
        <button class="uk-button uk-button-large menu-btn"><a href="{{ url('member/index') }}"><i class="uk-icon-heart"></i> マイページ</a></button>
      </div>
      <div>
        <button class="uk-button uk-button-large menu-btn"><a href="{{ url('info') }}"><i class="uk-icon-info"></i> インフォ</a></button>
      </div>

      <div>
        <div aria-expanded="false" aria-haspopup="true" class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
            <button class="uk-button uk-button-large menu-btn"><i class="uk-icon-bookmark"></i> 読む・探す <i class="uk-icon-caret-down"></i></button>
            <div style="top: 30px; left: 0px;" class="uk-dropdown uk-dropdown-bottom dropdown-inner">
                <ul class="uk-nav uk-nav-dropdown uk-dropdown-close">
                    <li><a href="{{ url('welcome') }}" class="uk-icon-coffee"> ようこそ</a></li>
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
                    <li><a href="#" class="uk-icon-leaf"> はじめに</a></li>
                    <li><a href="#" class="uk-icon-cloud-upload"> 作品登録</a></li>
                    <li><a href="#" class="uk-icon-bar-chart"> 作品管理</a></li>
                    <li><a href="#" class="uk-icon-paypal"> 入出金管理</a></li>
                </ul>
            </div>
        </div>
      </div>

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
        <button class="uk-button uk-button-large menu-btn"><a href="#" class="uk-icon-send"> お問合せ</a></button>
      </div>

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
            <input placeholder="フリーワード" name="searchwords" type="text" class="uk-width-1-1 uk-form-large">
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
  <!-- MODAL LOGIN FORM -->
  <div id="login_form" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
      <div class="uk-modal-header">
          <h2><i class="uk-icon-sign-in"></i> ログイン</h2>
      </div>

      <? if(count($errors) > 0 && $modal=="login"){ ?>
        <div class="uk-alert uk-alert-danger uk-text-left err">
          <ul>
          <? foreach ($errors as $error){ ?>
            <li><?=$error?></li>
          <? } ?>
          </ul>
        </div>
      <? } ?>

      <?=Form::open(array('id'=>'loginform', 'name'=>'loginform', 'action'=>'login', 'method'=>'post', 'class'=>'uk-form'))?>
        <?=Form::hidden('formname', 'loginform')?>
        <table width="100%" border="0" class="uk-table">
          <tr><th scope="row" class="label-width noborder">メールアドレス</th>
            <td class="uk-form-controls noborder">
              <?=Form::input('email', $email, array('class'=>'uk-width-1-1 uk-form-large'))?>
            </td>
          </tr>
          <tr><th scope="row" class="label-width noborder">パスワード</th>
            <td class="uk-form-controls noborder">
              <?=Form::password('password', '', array('class'=>'uk-width-1-1 uk-form-large'))?>
            </td>
          </tr>
          <tr><th scope="row" class="label-width noborder">&nbsp;</th>
            <td class="uk-text-left noborder adjust">
              <?=Form::checkbox('remember', 1, true)?>
              <?=Form::label('ログインを継続する', 'remember')?>
            </td>
          </tr>
          <tr><th scope="row" class="label-width noborder">&nbsp;</th>
            <td class="uk-align-left noborder">
              <?=Form::button('ok', 'ログインする', array('type'=>'submit', 'class'=>'uk-button uk-button-large'));?>
              <span class=""><a  data-uk-modal="{target:'#resetpass_mail'}">パスワードを忘れた場合はこちら</a></span>
            </td>
          </tr>
          <tr>
            <td colspan="2" class="uk-ckearfix noborder">
              <?=Form::button('new', '新規ユーザ登録（無料）', array('class'=>'uk-button uk-float-right', 'type'=>'button', 'data-uk-modal'=>'{target:\'#regist_form\'}'));?>
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
          <tr><th scope="row" class="label-width noborder">ユーザ名</th>
            <td class="uk-form-controls noborder">
              <input name="username" type="text" id="username" class="uk-width-1-1 uk-form-large" value="<?=$username?>" />
            </td>
          </tr>
          <tr><th scope="row" class="label-width noborder">郵便番号</th>
            <td class="uk-form-controls uk-text-left noborder">
              <input type="text" name="zip1" id="zip1" class="uk-width-1-5 uk-form-large zip-width" maxlength="3" value="<?=$zip1?>"> <i class="uk-icon-minus"></i> <input type="text" name="zip2" id="zip2" class="uk-width-1-5 uk-form-large zip-width" maxlength="4" value="<?=$zip2?>">
            </td>
          </tr>
          <tr><th scope="row" class="label-width noborder">メールアドレス</th>
            <td class="uk-form-controls noborder">
              <input type="text" name="email" id="email" class="uk-width-1-1 uk-form-large" value="<?=$email?>" />
            </td>
          </tr>
          <tr><th scope="row" class="label-width noborder">パスワード</th>
            <td class="uk-form-controls noborder">
              <input type="password" name="password" id="password" class="uk-width-1-1 uk-form-large">
            </td>
          </tr>
          <tr><th scope="row" class="label-width noborder">パスワード確認</th>
            <td class="uk-form-controls noborder">
              <input type="password" name="password_confirmation" id="password_confirmation" class="uk-width-1-1 uk-form-large">
            </td>
          </tr>
          <tr><th scope="row" class="label-width noborder">&nbsp;</th>
            <td class="uk-align-left noborder">
              <button type="submit" name="ok" id="ok" class="uk-button uk-button-large registsubmit">登録する</button> &nbsp;
              <button type="button" class="uk-button uk-button-large uk-modal-close">キャンセル</button>
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
          <tr><th scope="row" class="label-width noborder">メールアドレス</th>
            <td class="uk-form-controls noborder">
              <?=Form::input('email', $email, array('class'=>'uk-width-1-1 uk-form-large'))?>
            </td>
          </tr>
          <tr><th scope="row" class="label-width noborder">パスワード</th>
            <td class="uk-form-controls noborder">
              <?=Form::password('password', '', array('class'=>'uk-width-1-1 uk-form-large'))?>
            </td>
          </tr>
          <tr><th scope="row" class="label-width noborder">&nbsp;</th>
            <td class="uk-align-left noborder">
              <?=Form::button('ok', 'ユーザ登録確認メール再送信', array('type'=>'submit', 'class'=>'uk-button uk-button-large registsubmit'));?>
              <span class=""><a  data-uk-modal="{target:'#resetpass_mail'}">パスワードを忘れた場合はこちら</a></span>
            </td>
          </tr>
        </table>
      <?=Form::close()?>
    </div>
  </div>
  <!-- MODAL REGISTCODE FORM -->
  <div id="registcode_form" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
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
      </div>
      <?=Form::open(array('id'=>'registcodeform', 'name'=>'registcodeform', 'action'=>'registcheck', 'method'=>'post', 'class'=>'uk-form'))?>
        <?=Form::hidden('formname', 'registcodeform')?>
        <table width="100%" border="0" class="uk-table">
          <tr><th scope="row" class="label-width noborder">確認コード</th>
            <td class="uk-form-controls noborder">
              <?=Form::input('mailcode', '', array('class'=>'uk-width-1-1 uk-form-large'))?>
            </td>
          </tr>
          <tr><th scope="row" class="label-width noborder">&nbsp;</th>
            <td class="uk-align-left noborder">
              <?=Form::button('ok', 'ユーザ登録完了＆ログイン', array('type'=>'submit', 'class'=>'uk-button uk-button-large'));?>
            </td>
          </tr>
        </table>
      <?=Form::close()?>
    </div>
  </div>
  <!-- MODAL RESETPASSWORD MAIL FORM -->
  <div id="resetpass_mail" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
      <button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
      <div class="uk-modal-header">
          <h2><i class="uk-icon-lock"></i> パスワード再設定</h2>
      </div>
      <?php //echo $add_error; ?>
      <?=Form::open(array('id'=>'resetform', 'name'=>'resetform', 'action'=>'newpassword', 'method'=>'post', 'class'=>'uk-form'))?>
        <?=Form::csrf()?>
        <?=Form::hidden('formname', 'resetpass_mail')?>

        <table width="100%" border="0" class="uk-table">
          <tr><th scope="row" class="label-width noborder">メールアドレス</th>
            <td class="uk-form-controls noborder">
              <?=Form::input('email', '', array('type'=>'text', 'class'=>'uk-width-1-1 uk-form-large'))?>
            </td>
          </tr>
          <tr><th scope="row" class="label-width noborder">&nbsp;</th>
            <td class="uk-align-left noborder adjust">
              <button type="submit" name="ok" id="ok" class="uk-button uk-button-large adjust" onClick="$('#send').removeClass('disp_off').addClass('disp_on');return true;">再設定メールを送信する</button> &nbsp;
              <button type="button" class="uk-button uk-button-large uk-modal-close">キャンセル</button>
            </td>
          </tr>
          <tr class="disp_off" id="send">
            <td class="uk-align-center" colspan="2">
              <p>登録されたメールアドレスに、新しいパスワードに変更するためのリンクURLが記載されたメールが送信されましたので、ご確認下さい。</p>
              <button type="button" class="uk-button uk-modal-close">閉じる</button>
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
