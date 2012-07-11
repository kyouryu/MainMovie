<?php
App::uses('AppModel', 'Model');
/**
 * Partner Model
 *
 * @property Movie $Movie
 */
class Partner extends AppModel {
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
			'className' => 'Movie',
			'joinTable' => 'movies_partners',
			'foreignKey' => 'partner_id',
			'associationForeignKey' => 'movie_id',
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

        
   //見る相手リスト取得メソッド
   public function getPartner() {
   
 $option = array(
            'order' => array(
                'Partner.id' => 'ASC',
            ),
        );
        return $this->find('list', $option);

}




// public function getAddPartner($ids) {
//$cond=array();
//        foreach ($ids as $id) {
//            $cond[] = $id;
//        }
//        
//        return $this->find('list', Array('conditions' => Array('Partner.id' => $cond)));
//        
//   }   
   
   
//ID群を「|」を基準に区切って取得する
public function getSearPartner($ids) {

    //explode()は、文字列を指定した区切り文字「|」を基に分割
  $id= explode('|', $ids);
//IDが$idのレコードを返す
return $this->find('list', Array('conditions' => Array('Partner.id' => $id)));
}
}
