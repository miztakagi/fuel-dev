<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>ユーザー登録</title>
</head>
<body>
	<?php echo $add_error; ?>
	<form name="form1" method="post" action="">
		<table width="100%" border="1">
			<tr>
				<th colspan="2" scope="row">ユーザー登録</th>
			</tr>
			<tr><th scope="row">ユーザー名</th>
				<td>
					<label for="username"></label>
					<input name="username" type="text" id="username">
				</td>
			</tr>
			<tr><th scope="row">メールアドレス</th>
				<td>
					<label for="email"></label>
					<input type="text" name="email" id="email">
				</td>
			</tr>
			<tr><th scope="row">ご住所</th>
				<td>
					<label for="email"></label>
					<input type="text" name="address" id="address">
				</td>
			</tr>
			<tr><th scope="row">パスワード</th>
				<td>
					<label for="password"></label>
					<input type="password" name="password" id="password">
				</td>
			</tr>
			<tr>
				<th colspan="2" scope="row">
					<input type="submit" name="button" id="button" value="登録">
				</th>
			</tr>
		</table>
	</form>
</body>
</html>