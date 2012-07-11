<?php
class User extends AppModel {

	//バリデーション
	public $validate = array(
		'username' => array(
			array(
				'rule' => 'alphaNumeric', 
				'message' => '英数字で入力してください', 
			), 
			array(
				'rule' => array('minLength', 4), 
				'message' => '短すぎます', 
			), 
			array(
				'rule' => array('maxLength', 255), 
				'message' => '長すぎます', 
			), 
			array(
				'rule' => array('isUnique'), 
				'message' => '既に登録されているユーザ名です',
			), 
		), 
		'password' => array(
			array(
				'rule' => 'alphaNumeric', 
				'message' => '英数字で入力してください', 
			), 
			array(
				'rule' => array('minLength', 4), 
				'message' => '短すぎます', 
			), 
			array(
				'rule' => array('maxLength', 255), 
				'message' => '長すぎます', 
			), 
		), 
	);
	
	
}
