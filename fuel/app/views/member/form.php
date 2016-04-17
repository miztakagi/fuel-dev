<?php
    //送信先は自身のコントローラなので、引数はいらない
    echo Form::open();
?> 
<fieldset>
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
</fieldset>
<?php echo Form::close(); ?>