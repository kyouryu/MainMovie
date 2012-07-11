<?php
App::uses('AppModel', 'Model');
/**
 * FeelingsMovie Model
 *
 * @property Movie $Movie
 * @property Feeling $Feeling
 */
class FeelingsMovie extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Movie' => array(
			'className' => 'Movie',
			'foreignKey' => 'movie_id',
			'conditions' => '',
			'fields' => '',
                    'dependent' => true,
			'order' => ''
		),
		'Feeling' => array(
			'className' => 'Feeling',
			'foreignKey' => 'feeling_id',
			'conditions' => '',
			'fields' => '',
                    'dependent' => true,
			'order' => ''
		)
	);
}
