<?php

class Model_Post extends \Orm\Model
{
	protected static $_table_name = 'posts';

	protected static $_primary_key = 'id';

	protected static $_properties = array(
		'id',
		'title',
		'body',
		'created_at',
		'updated_at',
	);

	public funciton action_get() {
		try {
		    DB::start_transaction();
		    	$query = DB::select('title','content')
					->from('articles')
					->execute()
					->get('title');
		    DB::commit_transaction();

		// クエリの結果を返す
		} catch (Exception $e) {
		    // 未決のトランザクションクエリをロールバックする
		    DB::rollback_transaction();
		    throw $e;
		}
	}


	public funciton action_get() {
		$query = DB::count_records('users');
	}


	public funciton action_put() {
		$query = DB::insert(
			'table_name',
			array('id', 'name')
		);
	}

}
