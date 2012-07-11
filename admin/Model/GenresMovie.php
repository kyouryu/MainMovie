<?php
App::uses('AppModel', 'Model');
/**
 * GenresMovie Model
 *
 * @property Movie $Movie
 * @property Genre $Genre
 */
class GenresMovie extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

    
/* ----------------------------------------------------   
     自分自身に相手のIDを保存する(１対１)
      ---------------------------------------------------- */
	public $belongsTo = array(
		'Movie' => array(
			'className' => 'Movie',
			'foreignKey' => 'movie_id',
			'conditions' => '',
			'fields' => '',
                    'dependent' => true,
			'order' => ''
		),
		'Genre' => array(
			'className' => 'Genre',
			'foreignKey' => 'genre_id',
			'conditions' => '',
			'fields' => '',
                    'dependent' => true,
			'order' => ''
		)
	);
}
