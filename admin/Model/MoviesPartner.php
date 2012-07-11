<?php
App::uses('AppModel', 'Model');
/**
 * MoviesPartner Model
 *
 * @property Movie $Movie
 * @property Partner $Partner
 */
class MoviesPartner extends AppModel {

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
		'Partner' => array(
			'className' => 'Partner',
			'foreignKey' => 'partner_id',
			'conditions' => '',
			'fields' => '',
                    'dependent' => true,
			'order' => ''
		)
	);
}
