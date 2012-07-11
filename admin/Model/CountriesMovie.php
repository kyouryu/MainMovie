<?php
App::uses('AppModel', 'Model');
/**
 * CountriesMovie Model
 *
 * @property Movie $Movie
 * @property Country $Country
 */
class CountriesMovie extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

    
    
            
 /* ----------------------------------------------------   
     自分自身に相手のIDを保存する(１対１)
      ---------------------------------------------------- */
	public $belongsTo = array(
            
		'Movie' => array(
//                    現在のモデルに関連したモデルのクラス名
			'className' => 'Movie',
//                     現在のモデルにある外部キー名
			'foreignKey' => 'movie_id',
			'conditions' => '',
			'fields' => '',
                    'dependent' => true,
			'order' => ''
		),
            
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
                    'dependent' => true,
			'order' => ''
		)
	);
}
