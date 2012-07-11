<?php
App::uses('AppModel', 'Model');
/**
 * Country Model
 *
 * @property Movie $Movie
 */
class Country extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

        
/* ----------------------------------------------------   
     中間テーブルに双方のIDを保存する(複数対複数)
      ---------------------------------------------------- */
	public $hasAndBelongsToMany = array(
		'Movie' => array(
//                    現在のモデルに関連したモデルのクラス名
			'className' => 'Movie',
//                    関連で使用する結合テーブルの名前
			'joinTable' => 'countries_movies',
//                    joinTableにある外部キーの名前
			'foreignKey' => 'country_id',
//                    joinTableにあるもう一方の外部キーの名前
			'associationForeignKey' => 'movie_id',
//                    外部キーのテーブルに新たなレコードを挿入する前に既存の関連レコードを削除
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

        
        
   //フォーム選択用リスト
   public function getCountry() {
 $option = array(
            'order' => array(
                'Country.id' => 'ASC',
            ),
        );
        return $this->find('list', $option);

}


 //選択した国を確認画面で表示する
   public function getAddCountry($ids) {
$cond=array();
        foreach ($ids as $id) {
            $cond[] = $id;
        }
        
        return $this->find('list', Array('conditions' => Array('Country.id' => $cond)));
        
   }   

   
   
//ID群を「|」を基準に区切って取得する
public function getSearCountry($ids = null) {
   //explode()は、文字列を指定した区切り文字「|」を基に分割
  $id = explode('|', $ids);
  //IDが$idのレコードを返す
return $this->find('list', Array('conditions' => Array('Country.id' => $id)));
}
}
