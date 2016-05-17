<!-- CONTENT-->
<?
    Common::_log(Cookie::get(), 'COOKIE');
?>
<div id="content">
    <!-- メッセージ表示 -->
    <? if (!empty($message)) { ?>
        <div class="uk-alert uk-text-left" id="message">
          <ul>
            <li><?=$message?></li>
          </ul>
        </div>
    <? } ?>
    <!-- エラー表示 -->
    <? if (!empty($err_message)) { ?>
        <div class="uk-alert uk-alert-danger uk-text-left" id="err_message">
          <ul>
            <li><?=$err_message?></li>
          </ul>
        </div>
    <? } ?>

    <!-- TAB -->
    <?=Form::open(array('action'=>'member/item/upload', 'method'=>'post', 'id'=>'itemregist-form', 'class'=>'uk-form uk-form-horizontal'))?>
    <div><?=Form::fieldset_open(array('class'=>'', 'id'=>'item-upload', 'data-uk-margin'=>null))?>
        <div class="uk-grid uk-panel" id="item-upload-tab" data-uk-grid-margin="">
            <div class="uk-width-medium-1-1 uk-row-first">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-4" id="item-tab-tab">
                        <ul class="uk-tab uk-tab-left uk-text-left" data-uk-tab="{connect:'#tab-input'}">
                            <li aria-expanded="false" class="uk-active"><a href="#" onclick="save_cookie('itemregist-form');">1. 登録条件</a></li>
                            <li aria-expanded="false" class=""><a href="#" onclick="save_cookie('itemregist-form');">2. 作品情報</a></li>
                            <li aria-expanded="false" class=""><a href="#" onclick="save_cookie('itemregist-form');">3. 作者情報</a></li>
                            <li aria-expanded="false" class=""><a href="#" onclick="save_cookie('itemregist-form');">4. 概要＆データ</a></li>
                            <li aria-expanded="false" class=""><a href="#" onclick="save_cookie('itemregist-form');">5. 登録実行</a></li>
                        </ul>
                    </div>
                    <div class="uk-width-medium-3-4" id="item-tab-innner">
                        <ul id="tab-input" class="uk-switcher uk-text-left">
                            <li class="" aria-hidden="true">
                                <h3 class="h3title">作品の登録に際して、下記の条項にご同意下さい。</h3>
                                <ul class="agree">
                                    <li>あなたご自身の著作物であること。</li>
                                    <li>出版契約あるいは専属契約されていないか、契約先から頒布販売の了承を得ている著作物であること。</li>
                                    <li>日本国内の法規に抵触していないこと。公序良俗に反していないこと。</li>
                                    <li>当サイトの販売代行システムに準じて販売を委託すること。<br>（詳細については<a href="">コチラ）</a></li>
                                    <li>著作内容に関しては著作者本人が責任を持つこと。<br>（当サイトでは著作物の内容についてはいっさい関知致しません）</li>
                                </ul>
                                <div class="uk-panel uk-panel-box uk-width-medium-1-1 panel-important">
                                    <? $aflag = (Cookie::get('agreement')==1)?true:false; ?>
                                    <?=Form::checkbox('agreement', Cookie::get('agreement'), $aflag,
                                        array(
                                            'class'=>'uk-form-controls check-box'
                                        ))
                                    ?>
                                    <?=Form::label('上記の条件に合意します。', 'agreement')?>
                                </div>
                            </li>
                            <li aria-hidden="true" class="">
                                <div class="uk-clearfix">
                                    <span class="req">*</span>
                                    <?=Form::input('title', Cookie::get('title'), array('class'=>'', 'placeholder'=>'作品タイトル'))?>
                                    <span class="memo">100文字以内</span>
                                </div>
                                <div class="uk-clearfix">
                                    <span class="req">&nbsp;&nbsp;</span>
                                    <?=Form::input('subtitle', Cookie::get('subtitle'), array('class'=>'', 'placeholder'=>'サブタイトル'))?>
                                    <span class="memo">ある場合のみ</span>
                                </div>
                                <div class="uk-form-select uk-clearfix" data-uk-form-select>
                                    <span class="req">*</span>
                                    <?=Form::select('original', Cookie::get('original'), array(
                                        '1'=>'オリジナル作品',
                                        '0'=>'二次創作作品',
                                        ), array(
                                            'id'=>'original_selector',
                                            'onchange'=>'selectElse("original");',
                                            'maxlength'=>'100'
                                        )
                                    )?>
                                    <?=Form::input('original_input', Cookie::get('original_input'),
                                        array(
                                            'class'=>'disp_off short',
                                            'placeholder'=>'原作品名',
                                            'id'=>'original_input',
                                            'disabled'=>'disabled',
                                        )
                                    )?><span class="memo disp_off" id="original_memo">100文字以内</span>
                                </div>
                                <div class="uk-form-select uk-clearfix" data-uk-form-select>
                                    <span class="req">*</span>
                                    <?=Form::select('volume', Cookie::get('volume'), array(
                                        '1'=>'長編',
                                        '2'=>'中編',
                                        '3'=>'短編',
                                        '0'=>'その他',
                                        ), array(
                                            'id'=>'volume_selector',
                                            'onchange'=>'selectElse("volume");',
                                            'maxlength'=>'20'
                                        )
                                    )?>
                                    <?=Form::input('volume_input', Cookie::get('volume_input'),
                                        array(
                                            'class'=>'disp_off mini',
                                            'placeholder'=>'詩集、写真集など',
                                            'id'=>'volume_input',
                                            'disabled'=>'disabled',
                                        )
                                    )?><span class="memo disp_off" id="volume_memo">20文字以内</span>
                                </div>
                            </li>
                            <li aria-hidden="false" class="uk-active">
                                <div class="uk-clearfix">
                                    <span class="req">*</span>
                                    <?=Form::input('authname', Cookie::get('authname'), array('class'=>'', 'placeholder'=>'著者名'))?>
                                    <span class="memo">ペンネーム可</span>
                                </div>
                                <div class="uk-clearfix">
                                    <span class="req">&nbsp;&nbsp;</span>
                                    <?=Form::input('baseonname', Cookie::get('baseonname'), array('class'=>'', 'placeholder'=>'原作者・共著者名'))?>
                                    <span class="memo">いる場合のみ</span>
                                </div>
                                <div class="uk-clearfix">
                                    <span class="req">&nbsp;&nbsp;</span>
                                    <?=Form::input('artname', Cookie::get('artname'), array('class'=>'', 'placeholder'=>'イラスト・写真'))?>
                                    <span class="memo">いる場合のみ</span>
                                </div>
                                <div class="uk-clearfix">
                                    <span class="req">&nbsp;&nbsp;</span>
                                    <?=Form::input('designname', Cookie::get('designname'), array('class'=>'', 'placeholder'=>'装丁デザイン'))?>
                                    <span class="memo">いる場合のみ</span>
                                </div>
                            </li>
                            <li aria-hidden="false" class="uk-active">
                                <div class="uk-clearfix">
                                    <span class="req">*</span>
                                    <?=Form::textarea('summary', Cookie::get('summary'),
                                        array(
                                        'placeholder'=>'あらすじ',
                                        'id'=>'summary-input',
                                        'rows'=>6,
                                        'class'=>'',
                                        'minlength'=>'20',
                                        'maxlength'=>'300',
                                        )
                                    )?>
                                    <span class="memo summary-input">20&#12316;300文字</span>
                                </div>
                                <div>
                                    <p class="p-block">
                                    ※本文データは、登録実行後にアップロードするURLがメールで通知されます。<br>
                                    ※本文データおよび関連ファイルをzip圧縮してご用意下さい。
                                    </p>
                                </div>
                            </li>
                            <li aria-hidden="false" class="uk-active">
                                <div class="uk-clearfix">
                                    <span class="req">*</span>
                                    <? $exmail = (empty(Cookie::get('exmail')))?Cookie::get('email'):Cookie::get('exmail'); ?>
                                    <?=Form::input('exmail', $exmail, array('class'=>'', 'placeholder'=>'連絡用メールアドレス'))?><br>
                                    <span class="memo">ユーザ登録されているメールアドレスとは別のメールアドレスもご利用になれます</span>
                                </div>
                                <div class="uk-clearfix">
                                    <p class="p-block">
                                        <button class="uk-button uk-button-large mr10" type="submit" name="ok">作品登録を実行</button>
                                        <button class="uk-button uk-button-large" type="button" name="cancel">キャンセル</button>
                                    </p>
                                    <p class="p-block">
                                    ※登録内容または作品データに不明な箇所がある場合は、上記メールアドレスにご連絡させていただきますので、よろしくお願い致します。
                                    </p>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <?=Form::fieldset_close();?>
    </div>
    <?=Form::close();?>
</div>
<script>
    // ロード時設定
    if($("#original_selector").val()==0){
        $("#original_input").removeClass("disp_off").prop("disabled", false);
    }
    if($("#volume_selector").val()==0){
        $("#volume_input").removeClass("disp_off").prop("disabled", false);
    }

    // select その他の場合の入力欄コントロール
    function selectElse(name){
        var id = $("#"+name+"_selector option:selected");
        var target = $("#"+name+"_input");
        var memo = $("#"+name+"_memo");
        var v = id.val();
        if(v==0){
            target.removeClass("disp_off").prop("disabled", false);
            memo.removeClass("disp_off");
        }else{
            target.prop("disabled", true).addClass("disp_off");
            memo.addClass("disp_off");
        }
    }
    // 入力値をローカルストレージに保存
    function save_local(formname){
        //localStorage.clear();
        var $form = $('#'+formname);
        var params = $form.serializeArray();
        for(var i=0;i<params.length;i++){
            //alert(i+" / "+params[i]['name']+" / "+params[i]['value']);
            if(params[i]['value'] != null || params[i]['value'] != ''){
                //localStorage.setItem(params[i]['name'], params[i]['value']);
                sessionStorage.setItem(params[i]['name'], params[i]['value']);
            }else{
                //localStorage.removeItem(params[i]['name']);
            }
        }
    }
    // 入力値をセッションストレージに保存
    function save_session(formname){
        //sessionStorage.clear();
        window.localStorage.clear();
        var $form = $('#'+formname);
        var params = $form.serializeArray();
        for(var i=0;i<params.length;i++){
            if(params[i]['value'] != null || params[i]['value'] != ''){
                window.sessionStorage.setItem(params[i]['name'], params[i]['value']);
            }else{
                window.sessionStorage.removeItem(params[i]['name']);
            }
        }
    }
    // 入力値をCOOKIEに保存
    function save_cookie(formname){
        var $form = $('#'+formname);
        var params = $form.serializeArray();
        for(var i=0;i<params.length;i++){
            if(params[i]['value'] != null || params[i]['value'] != ''){
                $.cookie(params[i]['name'], params[i]['value'], { expires:14});
            }else{
                $.removeCookie(params[i]['name']);
            }
        }
    }
</script>
<!-- END CONTENT-->