<?php
App::uses('AppModel', 'Model');
/**
 * Feeling Model
 *
 * @property Movie $Movie
 */
class Feeling extends AppModel {
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
			'joinTable' => 'feelings_movies',
			'foreignKey' => 'feeling_id',
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

        
              //ジャンルリストを取得メソッド
   public function getFeeling() {
   
 $option = array(
            'order' => array(
                'Feeling.id' => 'ASC',
            ),
        );
        return $this->find('list', $option);

}



 public function getAddFeeling($ids) {
$cond=array();
        foreach ($ids as $id) {
            $cond[] = $id;
        }
        
        return $this->find('list', Array('conditions' => Array('Feeling.id' => $cond)));
        
   }   
   
   
public function getSearFeeling($ids) {

  $id= explode('|', $ids);
return $this->find('list', Array('conditions' => Array('Feeling.id' => $id)));
}


}
