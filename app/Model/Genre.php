<?php
App::uses('AppModel', 'Model');
/**
 * Genre Model
 *
 * @property Movie $Movie
 */
class Genre extends AppModel {
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
			'joinTable' => 'genres_movies',
			'foreignKey' => 'genre_id',
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
   public function getGenre() {
   
 $option = array(
            'order' => array(
                'Genre.id' => 'ASC',
            ),
        );
        return $this->find('list', $option);

}


// public function getAddGenre($ids) {
//$cond=array();
//        foreach ($ids as $id) {
//            $cond[] = $id;
//        }
//        
//        return $this->find('list', Array('conditions' => Array('Genre.id' => $cond)));
//        
//   }   
//   
   

public function getSearGenre($ids) {

  $id= explode('|', $ids);
return $this->find('list', Array('conditions' => Array('Genre.id' => $id)));
}

}
