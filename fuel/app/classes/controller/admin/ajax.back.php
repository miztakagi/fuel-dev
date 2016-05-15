<?php
class Controller_Admin_Ajax extends Controller_Rest {

	public function post_userlist() {
		$page      = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp        = isset($_POST['rp']) ? $_POST['rp'] : 50;
		$sortname  = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query     = isset($_POST['query']) ? $_POST['query'] : false;
		$qtype     = isset($_POST['qtype']) ? $_POST['qtype'] : false;

		/* -- To use the SQL, remove this block */
		//$usingSQL = true;
		function runSQL($rp, $page) {
			$offset = ($page-1)*$rp;
			$result = \Model_Admin::pagedata($rp,$offset);
			return $result['users'];
		}

		$rows = runSQL($rp, $page);
		//$total = DB::count_records('users');
		$total = Model_Users::count();

		if(!isset($usingSQL)){
			//include dirname(__FILE__).'/countryArray.inc.php';
			if($qtype && $query){
				$query = strtolower(trim($query));
				foreach($rows AS $key => $row){
					if(strpos(strtolower($row[$qtype]),$query) === false){
						unset($rows[$key]);
					}
				}
			}
			//Make PHP handle the sorting
			$sortArray = array();
			foreach($rows AS $key => $row){
				$sortArray[$key] = $row[$sortname];
			}
			$sortMethod = SORT_ASC;
			if($sortorder == 'desc'){
				$sortMethod = SORT_DESC;
			}
			array_multisort($sortArray, $sortMethod, $rows);
			//$total = count($rows);
			$rows = array_slice($rows,($page-1)*$rp,$rp);
		}

		header("Content-type: application/json");
		$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());

		foreach($rows AS $row){
			$entry = array(
				'id'             => $row['id'],
				'cell'           => array(
					'id'              => $row['id'],
					'username'        =>$row['username'],
					'password'        =>$row['password'],
					'email'           =>$row['email'],
					'zip1'            =>$row['zip1'],
					'zip2'            =>$row['zip2'],
					'pref'            =>$row['pref'],
					'address'         =>$row['address'],
					'profile'         =>$row['profile'],
					'group'           =>$row['group'],
					'last_login'      =>$row['last_login'],
					'login_hash'      =>$row['login_hash'],
					'counter'         =>$row['counter'],
					'confirm_token'   =>$row['confirm_token'],
					'confirmed_at'    =>$row['confirmed_at'],
					'confirm_sent_at' =>$row['confirm_sent_at'],
					'created_at'      =>$row['created_at'],
					'updated_at'      =>$row['updated_at'],
					'memo'            =>$row['memo'],
					'status'          =>$row['status'],
					'active'          =>$row['active']
				),
			);
			$jsonData['rows'][] = $entry;
		}
		echo json_encode($jsonData);
	}


	public function post_userdelete() {
		$error = array();
		if(!empty(Input::post('Delete'))){
			$id = Input::post('Delete');
			$entry = Model_Users::find($id);
			$entry->set(array(
				'updated_at' => Common::nowtime(),
				'active'=>-1
			));
			$entry->save();
			$error[] = '削除が完了しました。';
		}else{
			$error[] = '削除IDが不明です。';
		}
		//response($error, 200);
		echo json_encode($error);
	}

	public function post_userupdate() {
		$data = Input::post();
		$error = array();
		$id = '';
		if(empty($data)){
			$error['error'] = '入力データがありません。';
		}elseif($data['Edit'] != true){
			$error['error'] = '編集モードではありません。';
		}else{
			$props = array();
			Common::_log($data, 'DATA');
			$id = $data['OrgID'];
			foreach($data as $k=>$v){
				switch ($k) {
					case "OrgID":
						if(empty($v)){
							$error['error'] = 'IDが不明です';
						}else{
							$id = $v;
						}
						break;
				}
				if(empty($error)){
					$error['error'] = $id.': 更新しました。';
				}
			}
		}
		//response($error, 200);
		echo json_encode($error);
	}

	public function post_usercreate() {
		$data = Input::post();
		$error = array();
		if(empty($data)){
			$error[] = '入力データがありません。';
		}elseif($data['Add'] != true){
			$error[] = '追加モードではありません。';
		}else{
			$props = array();
			foreach($data as $k=>$v){
				switch ($k) {
					case "Username":
						if(empty($v)){
							$error[] = 'ユーザ名が入力されていません';
						}else{
							$props['username'] = $v;
						}
						break;
					case "Password":
						if(empty($v)){
							$error[] = 'パスワードが入力されていません';
						}else{
							$p = $v."//".$data['Email'];
							$password = Auth::instance()->hash_password($p);
							$props['password'] = $password;
						}
						break;
					case "Email":
						if(empty($v)){
							$error[] = 'メールドレスが入力されていません';
						}else{
							$props['email'] = $v;
						}
						break;
					case "Zip1":
						if(empty($v)){
							$error[] = '〒(1)が入力されていません';
						}else{
							$props['zip1'] = $v;
						}
						break;
					case "Zip2":
						if(empty($v)){
							$error[] = '〒(2)が入力されていません';
						}else{
							$props['zip2'] = $v;
						}
						break;
					case "Group":
						if(empty($v)){
							$error[] = 'グループが入力されていません';
						}else{
							$props['group'] = $v;
						}
						break;
					case "Profile":
						if(empty($v)){
							$v = NULL;
						}
						$props['profile'] = $v;
						break;
					case "Memo":
						if(empty($v)){
							$v = NULL;
						}
						$props['memo'] = $v;
						break;
					case "Status":
						if(empty($v)){
							$error[] = 'ステータスが入力されていません';
						}else{
							$props['status'] = $v;
						}
						break;
					case "Active":
						if(empty($v)){
							$error[] = 'アクティブが入力されていません';
						}else{
							$props['active'] = $v;
						}
						break;
					default:
						break;
				}
			}
		}
		if(empty($error)){
			$zipdata = array(
				'zip' => $data['Zip1']."-".$data['Zip2']
			);
			require_once APPPATH.'classes/controller/common/jpaddress.php';
			$address = Jpaddress::address($zipdata, 5); // 郵便番号から都道府県コードと住所を取得
			if (empty($address)) {
				$error[] = "郵便番号が正しくありません。";
			}else{
				$props['pref']            = $address['kencd'];
				$props['address']         = $address['jusho'];
				$props['last_login']      = 0;
				$props['login_hash']      = 0;
				$props['counter']         = 0;
				$props['confirm_token']   = '';
				$props['confirmed_at']    = NULL;
				$props['confirm_sent_at'] = Common::nowtime();
				$props['created_at']      = Common::nowtime();
				$props['updated_at']      = Common::nowtime();
				$new = Model_Users::forge($props);
				$new->save();
				$error[] = '登録しました';
			}
		}
		//response($error, 200);
		echo json_encode($error);
	}
}
