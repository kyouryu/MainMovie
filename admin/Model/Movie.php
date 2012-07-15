<?php
App::uses('AppModel', 'Model');
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
  


        
//        バリデーション
	public $validate = array(
            
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
               
                ),
		
		
		'time' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'summary' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            
		'eigacom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
             
             
//		'poster' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//               
//                    'rule' => 'isUnique',
//                    'message' => 'この作品は既に登録されています'
//                ),
//		
//		
//		'time' => array(
//			'numeric' => array(
//				'rule' => array('numeric'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//			'notempty' => array(
//				'rule' => array('notempty'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//		'summary' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//            
//		'eigacom' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//             
//             
////		'poster' => array(
////			'notempty' => array(
////				'rule' => array('notempty'),
////				'message' => '画像を選択してください',
////				//'allowEmpty' => false,
////				//'required' => false,
////				//'last' => false, // Stop validation after this rule
////				//'on' => 'create', // Limit validation to 'create' or 'update' operations
////			),
////		),
//		
//		'trailer' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				'message' => '入力してください',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//                 
//            
//            'Country' => array(
//			
//				'rule'=>array('multiple', array('min' => 1)),
//
//			'message' => '一つ以上選択してください'
//			
//		),
//            'genres' => array(
//			
//				'rule'=>array('multiple', array('min' => 1)),
//
//			'message' => '一つ以上選択してください'
//			
//		),
//            
//            'partners' => array(
//			
//				'rule'=>array('multiple', array('min' => 1)),
//
//			'message' => '一つ以上選択してください'
//			
//		),
//            
//            'feeling_id' => array(
//		'rule'=>array('multiple', array('min' => 1)),
//
//			'message' => '一つ以上選択してください'
//		),
//            
            
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

   


/* コントローラーのeditで使用
----------------------------------------------------*/
 public function uploadImage($image,$code) {
                 //画像処理
                $filesize = $image['size'];
                $file_temp = $image['tmp_name'];
                $file_name = $image['name'];

                if ($filesize > 10000000) {
                    $this->Session->setFlash(__('サイズが大きいです'));
                    $this->redirect('index');
                }

                if (is_uploaded_file($file_temp)) {
                    //サイズを取得
                    $size = getImageSize($file_temp);

                    //指定サイズ
                    $width = 300;
                    $high = 421;

                    $imgtype = exif_imagetype($file_temp);
                   
                    //それが1.GIF 2.JPEG 3.PNGのどれかなら
                     switch ($imgtype) {
                    case 1:

                      $img_in = imagecreatefromgif($file_temp);
                        $img_out = ImageCreateTruecolor($width, $high);
                        ImageCopyResampled($img_out, $img_in, 0, 0, 0, 0, $width, $high, $size[0], $size[1]);
                        Imagegif($img_out, $file_temp);
                         $file_name = $code . ".gif";
                        break;
                    case 2:
                        $img_in = imagecreatefromjpeg($file_temp);
                        $img_out = ImageCreateTruecolor($width, $high);
                        ImageCopyResampled($img_out, $img_in, 0, 0, 0, 0, $width, $high, $size[0], $size[1]);
                        Imagejpeg($img_out, $file_temp);
                         $file_name = $code . ".jpeg";
                        break;
                    case 3:

                      $img_in = imagecreatefrompng($file_temp);
                        $img_out = ImageCreateTruecolor($width, $high);
                        ImageCopyResampled($img_out, $img_in, 0, 0, 0, 0, $width, $high, $size[0], $size[1]);
                        Imagepng($img_out, $file_temp);
                         $file_name = $code . ".png";
                        break;
                    default:
                            $this->Session->setFlash(__('拡張子が違います'));
                            $this->redirect('add');
                    }

//保存先
                    $uploaddir = '/Applications/MAMP/htdocs/eigazuki/app/webroot/img/poster/';
                   
                

                    $uploadfile = $uploaddir . basename($file_name);

//画像をテンポラリーの場所から、上記で設定したアップロードファイルの置き場所へ移動
                    if (move_uploaded_file($file_temp, $uploadfile)) {
                     
                       
                    }
                    //ファイル名を返す
                    return $file_name;
                }
           
 }
 
 
    } 