<?php
class MyValidation
{
	public static function _validation_unique_email($email){ //頭に必ず「_validation_」をつける
		// Validationクラスを呼び出し、set_massageメソッドでメッセージを設定する。
		Validation::active()->set_message('unique_email','既に登録されています');

		$result = DB::select('LOWER ("email")')
			->where('email', '=', strtolower($email)) //emailを条件にDB検索
			->from('users')	//usersテーブル内を検索
			->execute();
		return !($result->count() > 0); //取得件数が0より多ければfalseを返す
	}

}
