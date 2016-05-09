<html>
    <meta charset="UTF-8">
    <body>
        <? //送信した値の受け渡し先をaction属性で指定。この場合コントローラpostのアクションsaveへ渡る ?>
        <?=Form::open(array('id'=>'login', 'name'=>'login', 'action'=>'/post/save', 'method'=>'post', 'class'=>'uk-form'))?>
            <?=Form::fieldset_open(array('id'=>'login_field', 'legend'=>'ログインフォーム'))?>
                <?=Form::csrf()?>
                <div>
                    <?php echo Form::label('ユーザ名','username'); ?>
                    <?php echo Form::Input('username'); ?>
                </div>
                <div>
                    <?php echo Form::label('メールアドレス','email'); ?>
                    <?php echo Form::Input('email'); ?>
                </div>
                <div>
                    <?php echo Form::label('パスワード','password'); ?>
                    <?php echo Form::password('password'); ?>
                </div>
                <div>
                    <?php echo Form::submit('submit','ログイン'); ?>
                </div>
            <?=Form::fieldset_close()?>
        <?=Form::close()?>
    </body>
</html>