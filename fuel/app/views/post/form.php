<html>
    <meta charset="UTF-8">
    <body>
        <? //送信した値の受け渡し先をaction属性で指定。この場合コントローラpostのアクションsaveへ渡る ?>
        <form action="/post/save" method="post">
            <input type="text" name="title" value="" />
            <textarea cols="30" rows="3" name="body" ></textarea>
            <input type="submit" name="submit" value="送信" />
        </form>
    </body>
</html>