<?php
class Controller_Admin_Ajax extends Controller_Rest {

	public function post_userlist() {
		$page      = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp        = isset($_POST['rp']) ? $_POST['rp'] : 50;
		$sortname  = isset($_POST['sortname']) ? $_POST['sortname'] : 'updated_at';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query     = isset($_POST['query']) ? $_POST['query'] : false;
		$qtype     = isset($_POST['qtype']) ? $_POST['qtype'] : 'username';
//Common::_log($_POST,'POST');
		/* -- To use the SQL, remove this block */
		$usingSQL = true;
		function runSQL($rp, $page, $sortname, $sortorder, $query, $qtype) {
			$offset = ($page-1)*$rp;
			if(!empty($query)){
				$result = DB::select()->from('users')
					->where($qtype, 'like', '%'.$query.'%')
					->limit($rp)
					->offset($offset)
					->order_by($sortname,$sortorder)
					->execute();
			}else{
				$result = DB::select()->from('users')
					->limit($rp)
					->offset($offset)
					->order_by($sortname,$sortorder)
					->execute();
			}
			return $result;
		}
		//$offset = ($page-1)*$rp;
		//$rows = Model_Users::selector('*', $qtype, $query, $sortname, $sortorder, $rp, $offset);
		if($qtype=='all'){
			$qtype = '';
			$query = '';
		}
		$rows = runSQL($rp, $page, $sortname, $sortorder, $query, $qtype);
		//$total = DB::count_records('users');
		if(!empty($query)){
			$total = count($rows);
		}else{
			$total = Model_Users::count();
		}

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
		if(!empty(Input::post())){
			foreach(Input::post() as $k=>$v){
				if($key=="Delete"){
					$id = $v;
				}
				$entry = Model_Users::find($id);
				$entry->set(array(
					'updated_at' => Common::nowtime(),
					'active'=>-1
				));
				$entry->save();
				$error['success'] = $id.': 削除が完了しました。';
			}
		}else{
			$error['error'][] = '削除IDが不明です。';
		}
		//response($error, 200);
		echo json_encode($error);
	}


	public function post_userSetup() {
		$data  = Input::post();
		$error = array();
		$props = array();
		if(isset($data['Edit'])){
			$mode = 1;
			$id = $data['OrgID'];
		}elseif(isset($data['Add'])){
			$mode = 2;
		}else{
			$error['error'][] = '編集または追加モードではありません。';
		}
		if(empty($error['error'])){
			foreach($data as $k=>$v){
				list($error, $props) = $this->checkValue($k,$v,$error,$props);
			}
		}
		if(empty($error['error'])){
			$zipdata = array(
				'zip' => $data['Zip1']."-".$data['Zip2']
			);
			require_once APPPATH.'classes/controller/common/jpaddress.php';
			$address = Jpaddress::address($zipdata, 5); // 郵便番号から都道府県コードと住所を取得
			if (empty($address)) {
				$error['error'][] = "郵便番号が正しくありません。";
			}else{
				if(empty($props['pref'])){ $props['pref'] = $address['kencd'];}
				if(empty($props['address'])){ $props['address'] = $address['jusho']; }
				$props['updated_at'] = Common::nowtime();
				if($mode==1){
					$query = DB::update('users');
					$query->set($props);
					$query->where('id', '=', $id);
					$query->execute();
					$error['success'] = $id.': 更新しました';
				}elseif($mode==2){
					$p = $data['Password']."//".$data['Email'];
					$password = Auth::instance()->hash_password($p);
					$props['password'] = $password;
					$props['last_login'] = 0;
					$props['login_hash']      = 0;
					$props['counter']         = 0;
					$props['confirm_token']   = '';
					$props['confirmed_at']    = NULL;
					$props['confirm_sent_at'] = Common::nowtime();
					$props['created_at']      = Common::nowtime();
					$new = DB::insert('users');
					$new->set($props);
					$newid = $new->execute();
					$error['success'] = $newid[0].': 登録しました。';
					// try {
					//   $newid = $new->execute();
					//   $error['success'] = $newid.': 登録しました。';
					// } catch (Exception $e) {
					// 	$ex = $e->getMessage();
					//   if(preg_match("/1062 Duplicate entry/", $ex)){
					//   	$error['error'][] = 'メールアドレスは登録済みです';
					//   }else{
					//   	$error['success'] = '登録しました';
					//   }
					// }
				}
			}
		}
		echo json_encode($error);
	}

	function checkValue($k,$v,$error,$props){
		global $error;
		global $props;
		switch ($k) {
			case "OrgID";
				if(empty($v)){
					$error['error'][] = 'IDが不明です';
				}
				break;
			case "Username":
				if(empty($v)){
					$error['error'][] = 'ユーザ名が入力されていません';
				}elseif(mb_strlen($v)<3 || mb_strlen($v)>20) {
					$error['error'][] = 'ユーザ名は3&#12316;20文字以内で設定して下さい';
				}else{
					$props['username'] = $v;
				}
				break;
			case "Password":
				if(empty($v)){
					$error['error'][] = 'パスワードが入力されていません';
				}elseif(mb_strlen($v)<6 || mb_strlen($v)>20) {
					$error['error'][] = 'パスワードは6&#12316;20文字以内で設定して下さい';
				}else{
					$props['password'] = $v;
				}
				break;
			case "Email":
				if(empty($v)){
					$error['error'][] = 'メールドレスが入力されていません';
				}elseif(!preg_match('|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|', $v)){
					$error['error'][] = 'メールドレスの形式が正しくありません';
				}else{
					$props['email'] = $v;
				}
				break;
			case "Zip1":
				if(empty($v)){
					$error['error'][] = '〒(1)が入力されていません';
				}elseif(mb_strlen($v) != 3 || is_int($v)) {
					$error['error'][] = '〒(1)は3桁で入力して下さい';
				}else{
					$props['zip1'] = $v;
				}
				break;
			case "Zip2":
				if(empty($v)){
					$error['error'][] = '〒(2)が入力されていません';
				}elseif(mb_strlen($v) != 4 || is_int($v)) {
					$error['error'][] = '〒(2)は4桁で入力して下さい';
				}else{
					$props['zip2'] = $v;
				}
				break;
			case "Pref":
				if(empty($v)){
					$props['address'] = NULL;
				}elseif(mb_strlen($v) > 2 || is_int($v)) {
					$error['error'][] = '都道府県コードは2桁で入力して下さい';
				}else{
					$props['pref'] = $v;
				}
				break;
			case "Address":
				if(empty($v)){
					$props['address'] = NULL;
				}else{
					$props['address'] = $v;
				}
				break;
			case "Group":
				if(empty($v)){
					$error[] = 'グループが入力されていません';
				}elseif($v > 100 || is_int($v)) {
					$error['error'][] = 'グループは100以内で設定して下さい';
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
					$error['error'][] = 'ステータスが入力されていません';
				}elseif(mb_strlen($v) > 3 || is_int($v)) {
					$error['error'][] = 'ステータスは3桁以内で設定して下さい';
				}else{
					$props['status'] = $v;
				}
				break;
			case "Active":
				if(empty($v) && $v != 0){
					$error['error'][] = 'アクティブが入力されていません';
				}elseif($v > 1 || $v < -1) {
					$error['error'][] = 'アクティブは-1/0/1で設定して下さい';
				}else{
					$props['active'] = $v;
				}
				break;
			default:
				break;
		}
		return array($error, $props);
	}
}
