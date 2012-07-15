<?php
class UsersController extends AppController {

	//利用するモデルの設定
	public $uses = array('User');
	
	/**
	 * beforeFilterコールバック
	 */
	public function beforeFilter(){
		
		//ログインなしでアクセス可能なページを列挙
		//$this->Auth->allow('add');
	}
	
	/**
	 * ログイン処理
	 */
	public function login(){
		
		//フォームに入力があった場合にログイン処理後ダッシュボードへ
		if($this->request->isPost()){
			if($this->Auth->login()){
				$this->redirect(array('controller'=>'movies','action' => 'index'));
			}
		}
	}
	
	/**
	 * ログアウト処理
	 */
	public function logout(){
		$this->Auth->logout();
	}
	
	/**
	 * ダッシュボード
	 */
	public function index(){
		
		//ビューテンプレートを表示するのみ
	}
	
        /**
	 * ダッシュボード
	 */
	public function add(){
		
		//ビューテンプレートを表示するのみ
	}
}
