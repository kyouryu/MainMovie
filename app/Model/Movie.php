<?php
/**
 * Movie Model
 *
 * @property Country $Country
 * @property Feeling $Feeling
 * @property Genre $Genre
 * @property Partner $Partner
 * @property People $People
 */
class Movie extends AppModel {
  
 
 // 検索プラグインとfind を実行するときに関連したモデルを選別したり限定したりするためのプラグイン
 public $actsAs = array('Search.Searchable','Containable');

  
  //リストで表示されるファイールド
	public $displayField = 'name';

        
//        バリデーション
	public $validate = array(
            
		
		'user_name' => array(
			
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '入力してください',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            
            'email' => array(
             'notempty' => array(
				'rule' => array('notempty'),
				'message' => '入力してください',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			
			'email' => array(
				  'rule' => array('email'),
				'message' => 'メールアドレスが正しくありません',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            
            
            'body' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '入力してください',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			
                            
                            )
                ),
            );
	//The Associations below have been created with all possible keys, those that are not needed can be removed

        
        
    /* ----------------------------------------------------
      #複数と複数(中間テーブルいる)
      ---------------------------------------------------- */
	public $hasAndBelongsToMany = array(
		'Country' => array(
			'className' => 'Country',
                    //中間テーブル
			'joinTable' => 'countries_movies',
                    //現在(Country)モデルにある外部キーの名前
			'foreignKey' => 'movie_id',
                    //もう一方(movie)のモデルにある外部キー
			'associationForeignKey' => 'country_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
//                    結合テーブルのモデル名
                    'with' => 'CountriesMovie',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Feeling' => array(
			'className' => 'Feeling',
			'joinTable' => 'feelings_movies',
			'foreignKey' => 'movie_id',
			'associationForeignKey' => 'feeling_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
                    'with' => 'FeelingsMovie',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Genre' => array(
			'className' => 'Genre',
			'joinTable' => 'genres_movies',
			'foreignKey' => 'movie_id',
			'associationForeignKey' => 'genre_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
                     'with' => 'GenresMovie',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Partner' => array(
			'className' => 'Partner',
			'joinTable' => 'movies_partners',
			'foreignKey' => 'movie_id',
			'associationForeignKey' => 'partner_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
                    'with' => 'MoviesPartner',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		
		
	);

   
        
    /* 検索結果ページで使用する
     * expressionは範囲
     * subqueryはサブクエリ
----------------------------------------------------*/      
        // 検索対象のフィルタ設定  
  public $filterArgs = array(
      //likeは部分一致
//    array('name' => 'title', 'type' => 'like', 'field' => 'Movie.name'),
      //完全一致で検索したい場合は『value』
//    array('name' => 'year', 'type' => 'value', 'field' => 'Movie.year'),
 
      //'method'は使用するメソッド
   array('name' => 'time', 'type' => 'expression', 'method' => 'timeBetween', 'field' => 'Movie.time BETWEEN ? AND ?'),
       array('name' => 'country_id', 'type' => 'subquery', 'field' => 'Movie.id', 'method' => 'searchCountry'),
    array('name' => 'genre_id', 'type' => 'subquery', 'field' => 'Movie.id', 'method' => 'searchGenre'),
    array('name' => 'score', 'type' => 'value', 'field' => 'Movie.score'), 
       array('name' => 'partner_id', 'type' => 'subquery', 'field' => 'Movie.id', 'method' => 'searchPartner'),
    array('name' => 'feeling_id', 'type' => 'subquery', 'field' => 'Movie.id', 'method' => 'searchFeeling'),
  );  
  
  
//  timeで呼び出される60-90を「-」で区切る
function timeBetween($data = array()) {
    //検索時間を取得
		$time = $data['time'];
                //それを「-」で区切る
		$times = explode('-', $time);
               
		
			$coditions = $times;
		
		return $coditions;
	}
    
        
    //検索国を取得する
   function searchCountry($data = array()) {
        $this->CountriesMovie->Behaviors->attach('Containable', array('autoFields' => false));
        $this->CountriesMovie->Behaviors->attach('Search.Searchable');
        $query = $this->CountriesMovie->getQuery('all', array(
            //| で区切られたID群から｜を外す
               'conditions' => array('country_id'  => explode('|', $data['country_id'])),
            'fields' => array('movie_id'),
            'contain' =>  $this->Country->alias,
            )
        );
        return $query;
    }
    
    //検索ジャンルを取得
     function searchGenre($data = array()) {
        $this->GenresMovie->Behaviors->attach('Containable', array('autoFields' => false));
        $this->GenresMovie->Behaviors->attach('Search.Searchable');
        $tag_id = explode('|', $data['genre_id']);
        $options = array(
            'conditions' => array('genre_id'  => $tag_id),
            'fields' => array('movie_id'),
            'contain' => $this->Genre->alias,
        );
        if (( $c = count ( $tag_id )) !== 1 )
            $options['group'] = 'GenresMovie.movie_id HAVING COUNT(GenresMovie.movie_id) = '.$c;
        $condition = implode(', ', $this->GenresMovie->find('list', $options));
        if ( empty( $condition ))
            $condition = 'NULL';
        return $condition;
    }
    
    //検索相手を取得
    function searchPartner($data = array()) {
        $this->MoviesPartner->Behaviors->attach('Containable', array('autoFields' => false));
        $this->MoviesPartner->Behaviors->attach('Search.Searchable');
        $query = $this->MoviesPartner->getQuery('all', array(
               'conditions' => array('partner_id'  => explode('|', $data['partner_id'])),
            'fields' => array('movie_id'),
            'contain' =>  $this->Partner->alias,
            )
        );
        return $query;
    }
    
    //検索感想を取得
    function searchFeeling($data = array()) {
        $this->FeelingsMovie->Behaviors->attach('Containable', array('autoFields' => false));
        $this->FeelingsMovie->Behaviors->attach('Search.Searchable');
        $tag_id = explode('|', $data['feeling_id']);
        $options = array(
            'conditions' => array('feeling_id'  => $tag_id),
            'fields' => array('movie_id'),
            'contain' => $this->Feeling->alias,
        );
        if (( $c = count ( $tag_id )) !== 1 )
            $options['group'] = 'FeelingsMovie.movie_id HAVING COUNT(FeelingsMovie.movie_id) = '.$c;
        $condition = implode(', ', $this->FeelingsMovie->find('list', $options));
        if ( empty( $condition ))
            $condition = 'NULL';
        return $condition;
    }
    
   
  // 検索対象(検索ページにある)のフィールド設定  
  public $presetVars = array(  
//    array('field' => 'title', 'type' => 'value'),  
//    array('field' => 'year', 'type' => 'checkbox'),  
    
       array('field' => 'country_id', 'type' => 'checkbox'),  
    array('field' => 'genre_id', 'type' => 'checkbox'),  
    array('field' => 'time', 'type' => 'value'),  
       array('field' => 'score', 'type' => 'value'),  
    array('field' => 'partner_id', 'type' => 'checkbox'),  
    array('field' => 'feeling_id', 'type' => 'checkbox'),  
  );  
  
  

  
  
  /* コントローラーのindexで使用
----------------------------------------------------*/
  //画像をランダムに取得するメソッド
  public function getImage() {
          $option =array(
   
        
        'fields'=>array('Movie.id','Movie.name','Movie.poster'), 
        'limit' => 21 ,
        'order' => 'rand()',
             );
        return $this->find('all', $option);       
    } 
 
   
    /* 検索ページで使用
----------------------------------------------------*/
  //最新画像に取得するメソッド
  public function getSearch() {
          $option =array(
        'limit' => 50 ,
        'order' => array(
            'modified'=>'DESC'
        )
             );
        return $this->find('all', $option);       
    } 
    


 
 
    } 