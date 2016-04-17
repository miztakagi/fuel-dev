
    <h1><?php echo $title; ?></h1>
    <?php
         //認証が通れば、ログアウト(aタグ)を表示する。
        if(Auth::check()):
    ?>
    <?php echo Html::anchor('member/logout','ログアウト'); ?>
    <?php endif; ?>

    <?php
        //管理者フラグが立っていれば、管理者ページへのボタンを表示する 
        if($is_admin): 
    ?>
    <a href="<?php echo Url::create('member/admin'); ?>">管理者ページへ</a>
    <?php endif; ?>
    <?php echo $content; //コンテンツ差し替え用 ?> 
