<?php
class Controller_MyValidation
{
	public static function _validation_unique($val, $options){ //頭に必ず「_validation_」をつける
		// Validationクラスを呼び出し、set_massageメソッドでメッセージを設定する。
		Validation::active()->set_message('unique_email','既に登録されています');

		list($table, $field) = explode('.', $options);
		$result = DB::select($field)
			->where($field, '=', strtolower($val)) //emailを条件にDB検索
			->from($table)	//usersテーブル内を検索
			->execute();
		return !($result->count() > 0); //取得件数が0より多ければfalseを返す
	}

}
