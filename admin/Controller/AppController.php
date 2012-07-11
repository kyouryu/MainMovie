<?php
class AppController extends Controller {
	
	//コンポーネントの設定
	public $components = array(
		//Authコンポーネントの使用
		'Auth' => array(
			'authenticate' => array(
				'all' => array(
					'fields' => array(
						'username' => 'username', 
						'password' => 'password', 
					), 
				), 
				'Form', 
			), 
		), 
		//セッションコンポーネントの使用
		'Session', 
	);
	
}
