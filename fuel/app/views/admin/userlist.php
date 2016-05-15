<?=Asset::css('flexigrid.css');?>
<?=Asset::js('flexigrid.js');?>
<?=Asset::js('script_admin.js');?>

<script type="text/javascript">
<!--
$(document).ready(function() {
    var nowtime = '<?=date("Y-m-d H:i:s")?>';
    $("#user_list").flexigrid({
        type: 'POST',
        url: '/admin/ajax/userlist.json',
        dataType: 'json',
        colModel :
        [
            {display:'ID', name:'id',width:50, sortable:true, align:'right'},
            {display:'ユーザ名', name:'username',width:100, sortable:true, align:'left'},
            {display:'パスワード', name:'password',width:100, sortable:true, align:'left', hide:true},
            {display:'メールアドレス', name:'email',width:100, sortable:true, align:'left'},
            {display:'〒1', name:'zip1',width:50, sortable:true, align:'left', hide:true},
            {display:'〒2', name:'zip2',width:50, sortable:true, align:'left', hide:true},
            {display:'都道府県コード', name:'pref',width:20, sortable:true, align:'right', hide:true},
            {display:'住所', name:'address',width:120, sortable:true, align:'left'},
            {display:'ユーザ情報', name:'profile',width:100, sortable:true, align:'left', hide:true},
            {display:'グループ', name:'group',width:50, sortable:true, align:'right'},
            {display:'最終ログイン日時', name:'last_login',width:100, sortable:true, align:'left'},
            {display:'ログインHASH値', name:'login_hash',width:100, sortable:true, align:'left', hide:true},
            {display:'アクセス数', name:'counter',width:50, sortable:true, align:'right'},
            {display:'ユーザ登録用token', name:'confirm_token',width:100, sortable:true, align:'left', hide:true},
            {display:'ユーザ登録確認日', name:'confirmed_at',width:100, sortable:true, align:'left', hide:true},
            {display:'ユーザ登録メール発信日', name:'confirm_sent_at',width:100, sortable:true, align:'left', hide:true},
            {display:'登録日時', name:'created_at',width:100, sortable:true, align:'left', hide:true},
            {display:'更新日時', name:'updated_at',width:100, sortable:true, align:'left'},
            {display:'メモ', name:'memo',width:100, sortable:true, align:'left'},
            {display:'ステータス', name:'status',width:50, sortable:true, align:'right', hide:true},
            {display:'アクティブ', name:'active',width:50, sortable:true, align:'right'}
        ],
        buttons : [
            {
                name : '編集',
                bclass : 'edit',
                onpress : tadd
            },
            {
                name : '削除',
                bclass : 'delete',
                onpress : tadd
            },
            {   name : '追加',
                bclass : 'add',
                onpress : tadd
            }, 
            {
                separator : true
            } 
        ],
        searchitems :
        [
            {display:'すべて', name:'all'},
            {display:'ID', name:'id'},
            {display:'ユーザ名', name:'username'},
            {display:'メールアドレス', name:'email'},
            {display:'住所', name:'address'},
            {display:'グループ', name:'group'},
            {display:'アクティブ', name:'active'}
        ],
        title: '<i class="uk-icon-user"></i> ユーザリスト',
        sortname: "updated_at",
        sortorder: "desc",
        usepager: true,
        useRp: true,
        rpOptions: [10, 20, 50, 100, 500],
        rp: 20,
        showTableToggleBtn: true,
        width: 'auto',
        height: 'auto'
    });

    function tadd(com, grid) {
        if (com == '削除' && editidCheck()) {
            var conf = confirm(editidCheck() + ' を削除してもよろしいですか？');
            if(conf){
                $.each($('.trSelected', grid),function(key, value){
                    $.post(
                        '/admin/ajax/userdelete.json',
                        { Delete: trims(value.firstChild.innerText)},
                        function(data){
                            outMessage(data);
                            $("#user_list").flexReload();
                        });
                });    
            }
        }else if (com == '編集' && editidCheck()) {
            var conf = confirm(editidCheck() + ' を編集します。');
            if(conf){
                $.each($('.trSelected', grid),function(key, value){
                    // collect the data
                    var OrgID     = value.children[0].innerText; // in case we're changing the key
                    //var ID        = prompt("ID: 変更不可",value.children[0].innerText);
                    var Username  = prompt(OrgID+"ユーザ名",value.children[1].innerText);
                    //var Password  = prompt("パスワード",value.children[2].innerText);
                    var Email     = prompt(OrgID+"メールアドレス",value.children[3].innerText);
                    var Zip1      = prompt(OrgID+"郵便番号(1)",value.children[4].innerText);
                    var Zip2      = prompt(OrgID+"郵便番号(2)",value.children[5].innerText);
                    var Pref      = prompt(OrgID+"都道府県コード\n〒から自動取得するには空白にして下さい",value.children[6].innerText);
                    var Address   = prompt(OrgID+"住所\n〒から自動取得するには空白にして下さい",value.children[7].innerText);
                    var Profile   = prompt(OrgID+"ユーザ情報",value.children[8].innerText);
                    var Group     = prompt(OrgID+"グループ\n-1:Banned 0:ゲスト 1:一般読者ユーザ 10:投稿ユーザ 50:スタッフ",value.children[9].innerText);
                    //var LastLogin = prompt("最終ログイン日時",value.children[10].innerText);
                    //var LoginHash = prompt("ログインHASH値",value.children[11].innerText);
                    //var Count     = prompt("アクセスカウント",value.children[12].innerText);
                    //var Token     = prompt("ロユーザ登録用token",value.children[13].innerText);
                    //var ConfirmAt = prompt("ユーザ登録確認日: NULL",value.children[14].innerText);
                    //var CmailAt   = prompt("ユーザ登録メール発信日",value.children[15].innerText);
                    //var CreateAt  = prompt("登録日時",value.children[16].innerText);
                    //var UpdateAt  = prompt("更新日時",nowtime);
                    var Memo      = prompt(OrgID+"メモ",value.children[18].innerText);
                    var Status    = prompt(OrgID+"ステータス\n1:通常 2〜:その他 900:ブラックリスト",value.children[19].innerText);
                    var Active    = prompt(OrgID+"アクティブ\n1:アクティブ 0:ユーザ登録未確認 -1:非アクティブ",value.children[20].innerText);
                    // call the ajax to save the data to the session
                    $.post(
                        '/admin/ajax/userSetup.json',
                        {   Edit: true
                            , OrgID: trims(OrgID)
                            , Username: trims(Username)
                            , Email: trims(Email)
                            , Zip1: trims(Zip1)
                            , Zip2: trims(Zip2)
                            , Pref: trims(Pref)
                            , Address: trims(Address)
                            , Profile: trims(Profile)
                            , Group: trims(Group)
                            , Memo: trims(Memo)
                            , Status: trims(Status)
                            , Active: trims(Active)
                        },
                        function(data){
                            outMessage(data);
                            $("#user_list").flexReload();
                        }
                    );
                });
            }
        } else if (com == '追加') {
            // collect the data
            //var ID        = value.children[0].innerText; // in case we're changing the key
            var Username  = prompt("ユーザ名");
            var Password  = prompt("パスワード");
            var Email     = prompt("メールアドレス");
            var Zip1      = prompt("郵便番号(1)");
            var Zip2      = prompt("郵便番号(2)");
            //var Pref      = prompt("都道府県コード");
            //Address   = prompt("住所");
            var Profile   = prompt("ユーザ情報");
            var Group     = prompt("グループ: -1:Banned 0:ゲスト 1:一般読者ユーザ 10:投稿ユーザ 50:スタッフ",1);
            //var LastLogin = prompt("最終ログイン日時",0);
            //var LoginHash = prompt("ログインHASH値",0);
            //var Count     = prompt("アクセスカウント",0);
            //var Token     = prompt("ロユーザ登録用token","000000");
            //var ConfirmAt = prompt("ユーザ登録確認日: NULL",'');
            //var CmailAt   = prompt("ユーザ登録メール発信日",nowtime);
            //var CreateAt  = prompt("登録日時",nowtime);
            //var UpdateAt  = prompt("更新日時",nowtime);
            var Memo      = prompt("メモ", "<?=$username?>登録");
            var Status    = prompt("ステータス: 1:通常 2〜:その他 900:ブラックリスト",1);
            var Active    = prompt("アクティブ: 1:アクティブ 0:ユーザ登録未確認 -1:非アクティブ",1);
            // call the ajax to save the data to the session
            $.post(
                '/admin/ajax/userSetup.json',
                { Add: true
                    , Username: trims(Username)
                    , Password: trims(Password)
                    , Email: trims(Email)
                    , Zip1: trims(Zip1)
                    , Zip2: trims(Zip2)
                    , Profile: trims(Profile)
                    , Group: trims(Group)
                    , Memo: trims(Memo)
                    , Status: trims(Status)
                    , Active: trims(Active)
                }, function(data){
                    outMessage(data);
                    $("#user_list").flexReload();
                }
            );
        }

        function editidCheck(){
            var list='';
            $('.trSelected').each(function(){
                list += $(this).data('id');
                list += ' ';
            });
            list = $.trim(list);
            if(list.length<1){
                alert('対象IDが不明です');
                return false;
            }else{
                return list;
            }
        }

        function outMessage(res){
            if(res != ''){
                var mess = JSON.parse(res);
                var message = "";
                for (var i in mess) {
                    if(i=='success'){
                        $("#admin_message").removeClass("uk-alert-danger");
                    }else if(i=='error'){
                        $("#admin_message").addClass("uk-alert-danger");
                    }
                    var mm = new String(mess[i]);
                    var $m = mm.split(",");
                    for(j=0;j<$m.length;j++){
                        message += "<li>"+$m[j]+"</li>";
                    }
                }
                $("#inner_message").append(message);
                $("#admin_message").show().delay(5000).slideUp(200,function(){
                    $("#inner_message").html('');
                });
            }
        }

        function trims(str) {
            return $.trim(str).replace(/\r?\n/g,"");
        }

    }

});
-->
</script>

<div class="uk-alert uk-alert-danger uk-text-left disp_off" id="admin_message">
  <ul id="inner_message">
  </ul>
</div>

<table id="user_list" style="display: none"></table>

