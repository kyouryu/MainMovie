<?php

/*
 * モデルの中で使う場合、behavior
  コントローラの中で使う場合は、component
  ビューの中で使う場合は、helper
 */

App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'simpleHtmlDom/simple_html_dom');

/**
 * Movies Controller
 *
 * @property Movie $Movie
 */
class MoviesController extends AppController {
   public $helpers = array('Jisaku','Html', 'Form');
  
 
    //使用するコンポネートを指定する
    public $components = array('Transition', 'Search.Prg');
    //「app/View/Layouts」でレイアウトを読み込む
    
    //使用するモデル名
   public $uses = array('Movie');

    
    /* 共通項目
      ---------------------------------------------------- */
    function beforeFilter() {
//タイトル
        $title_for_layout = '見たい映画に出会える・・・';
        //キーワード
        $keywords = 'ムムット,映画,感想,レビュー,ジャンル,キャッチコピー,予告編,検索';
        //概要
        $description = 'たくさんの映画の中から感想、レビュー、上映時間、ジャンル、キャッチコピー、予告編などで、あなたの見たい映画を検索するサイトです。';

        $this->set(compact('title_for_layout', 'keywords', 'description'));


        // 検索対象のフィールド設定代入  
        $this->presetVars = $this->Movie->presetVars;
        // ページャ設定  
        $pager_numbers = array(
            'before' => ' - ',
            'after' => ' - ',
            'modulus' => 10,
            'separator' => ' ',
            'class' => 'pagenumbers'
        );
        $this->set('pager_numbers', $pager_numbers);
    }

    
    /* ----------------------------------------------------   
      トップページ
      ---------------------------------------------------- */
    public function index() {

        //映画ポスターを入手する
        $movies_1 = $this->Movie->getImage();
        $movies_2 = $this->Movie->getImage();
        $movies_3 = $this->Movie->getImage();
        $movies_4 = $this->Movie->getImage();
        $movies_5 = $this->Movie->getImage();


        //viewにデータを送る
        $this->set(compact('movies_1', 'movies_2', 'movies_3', 'movies_4', 'movies_5'));
    }



    /* ----------------------------------------------------   
     とはページ
      ---------------------------------------------------- */
    public function about() {

	}
        
        
    
    /* ----------------------------------------------------   
      検索ページ
      ---------------------------------------------------- */
    public function search() {

        //最新が像を５０件取得
        $movies = $this->Movie->getSearch();

//国情報を取得
        $countries = $this->Movie->Country->getCountry();
        //ジャンル情報を取得
        $genres = $this->Movie->Genre->getGenre();
        //感想情報を取得
        $feelings = $this->Movie->Feeling->getFeeling();
        //見る相手情報を取得
        $partners = $this->Movie->Partner->getPartner();

//viewにデータを送る
        $this->set(compact('movies', 'countries', 'feelings', 'genres', 'partners'));
    }

    
    
    /* ----------------------------------------------------
      検索結果ページ
      ---------------------------------------------------- */
    public function results() {

        //cssを適用しない
        $this->layout = "";

        // 検索条件設定でURLを生成 
        $this->Prg->commonProcess();

//検索条件が存在すれば、それを代入。なければ、nullを代入
        $country_ids = isset($this->request->params["named"]["country_id"]) ? $this->request->params["named"]["country_id"] : null;
        $genre_ids = isset($this->request->params["named"]["genre_id"]) ? $this->request->params["named"]["genre_id"] : null;
        $feeling_ids = isset($this->request->params["named"]["feeling_id"]) ? $this->request->params["named"]["feeling_id"] : null;
        $partner_ids = isset($this->request->params["named"]["partner_id"]) ? $this->request->params["named"]["partner_id"] : null;
        $time = isset($this->request->params["named"]["time"]) ? $this->request->params["named"]["time"] : null;
        $score = isset($this->request->params["named"]["score"]) ? $this->request->params["named"]["score"] : null;

       
//検索条件に使用された国IDを「|」を基準に区切って取得する( '1|2|3' ⇒1,2,3)
        $search_country = $this->Movie->Country->getSearCountry($country_ids);

    
        //検索条件に使用されたジャンルIDを「|」を基準に区切って取得する
        $search_genre = $this->Movie->Genre->getSearGenre($genre_ids);

        //検索条件に使用された印象IDを「|」を基準に区切って取得する
        $search_feeling = $this->Movie->Feeling->getSearFeeling($feeling_ids);

        //検索条件に使用された鑑賞相手IDを「|」を基準に区切って取得する
        $search_partner = $this->Movie->Partner->getSearPartner($partner_ids);

        //検索条件に使用されたタイトルを取得する
//        $search_title = $this->request->params["named"]["title"];
        //検索条件に使用された時間を取得する
        $search_time = $time;

        //検索条件に使用されたスコアを取得する
        $search_score = $score;

        
        //viewにデータを送る
        $this->set(compact('search_country', 'search_genre', 'search_partner', 'search_feeling', 'search_title', 'search_time', 'search_score', 'title_for_layout'));


        //検索条件取得で検索条件を設定
        $conditions = $this->Movie->parseCriteria($this->passedArgs);

        //ページング設定(50件ずつ)
        $this->paginate = array(
            'conditions' => $conditions,
             'modified'=>'DESC',
            'limit' => 50,
             
        );



        //もし検索に一致するデータがあれば
        if ($this->paginate('Movie')) {

//
//            //ヒット件数
//            $search_count = $this->request->params["paging"]["Movie"]["count"];

//            //現ページ番号
//            $page = $this->request->params["paging"]["Movie"]["page"];
//
//            //最大表示件数(50件)
//            $limit = $this->request->params["paging"]["Movie"]["limit"];
//
//            //各ページの最小値
//            $minNum = ($page - 1) * $limit + 1;
//
//            //もし、ヒット件数が(現ページ番号×最大表示件数)より小さいなら
//            if ($search_count < ($page * $limit)) {
//
//                //ヒット件数が最大値になる
//                $maxNum = $search_count;
//            } else {
//                //そうでなく、大きいなら(現ページ数*最大表示件数)が最大値になる
//                $maxNum = $page * $limit;
//            }

            
            //全レコード件数を取得
            $total = $this->Movie->find('count');

            
            $this->set(compact('total'));

            //検索に一致したデータをviewに送る
            $this->set('movies', $this->paginate('Movie'));
        }
    }

    
    /* ----------------------------------------------------
      #ポスターページ
      ---------------------------------------------------- */
    public function poster() {
        //48件ずつ表示
        $this->paginate = array(
             'fields'=>array(
                'id',
                'poster',
                'name'
            ),
            'limit' => 48,
            'order' => array(
            'modified'=>'DESC'
        )
        );
        
        $this->set('movies', $this->paginate());
        
    }
    

     
    /* ----------------------------------------------------
      #キャッチコピーページ
      ---------------------------------------------------- */
	public function catchcopy() {
 //30件ずつ表示
        $this->paginate = array(
            'limit' => 30,
            'order' => array(
            'modified'=>'DESC'
        )
        );
      
           $this->set('movies', $this->paginate());
   
    }
        
    
    
     /* ----------------------------------------------------
      #予告動画ページ
      ---------------------------------------------------- */
	public function trailer() {
 //28件ずつ表示
        $this->paginate = array(
            'limit' => 28,
            'order' => array(
            'modified'=>'DESC'
        )
        );
        $this->set('movies', $this->paginate());
      
    }
    
    
    /* ----------------------------------------------------
      #詳細ページ
      ---------------------------------------------------- */
    public function view($id = null) {

           //作品データを取得
		$movie = $this->Movie->findById($id);
                
                //なければエラーメッセージ
		if(empty($movie)) {
			$this->Session->setFlash('作品が見つかりませんでした');
			$this->redirect(array('action'=> 'search'));
		}
		
		$this->set(compact('movie'));
                
        
        //グラフ用のコード
        $this->Movie->FeelingsMovie->virtualFields['cnt'] = 0;
        
        $cound=Array(
       'conditions' => array('FeelingsMovie.movie_id' => $id), 
        'fields' =>  array('FeelingsMovie.feeling_id','COUNT(FeelingsMovie.movie_id) AS FeelingsMovie__cnt'),
         'group'=>array('FeelingsMovie.feeling_id'),
      
    );
    $feelings=$this->Movie->FeelingsMovie->find('all', $cound);

    $this->set(compact('feelings'));
     }

    

    
    
   
    /* ----------------------------------------------------
      #問い合わせページ
      ---------------------------------------------------- */
    public function contact() {


       if(!empty($this->request->data)) { 
             
           //値をセットする
      $this->Movie->set($this->request->data);
      
      //  手動でバリデーション
      //バリデーションに引っかからないのなら
      if($this->Movie->validates()) {
      
 
      //メールアドレスが空でないなら、送信処理をする
       if(!empty($this->request->data['Movie']['email'])) { 
     $ary_body = array(
                    'name' => $this->request->data['Movie']['user_name'],
                    'email' => $this->request->data['Movie']['email'],
                    'category' => $this->request->data['Movie']['category'],
                    'body' => $this->request->data['Movie']['body'],
                );
//                自分ののアドレス
                $from_mail = 'mumutto0131@gmail.com';
//                自分の名前
                $from_name = 'ムムット管理者';
//                相手ののアドレス(宛先)
                $to_mail = $this->request->data['Movie']['email'];
//              相手の名前
                $to_name = $this->request->data['Movie']['user_name'];
                $email = new CakeEmail('gmail');
                $mailRespons = $email->config(array('log' => 'emails'))
//                        使用するテンプレート
                        ->template('text_mail', 'text_layout')
//                        viewVarsでテンプレートに変数をセット
                        ->viewVars($ary_body)
//                        emailFormatで'text'形式に設定
                        ->emailFormat('text')
//                        fromで送信者を設定
                        ->from(array($from_mail => $from_name))
//                        自分にも送信
                        ->bcc($from_mail)
//                        toで受信者を設定
                        ->to(array($to_mail => $to_name))

//                        subjectで件名を設定
                        ->subject('問い合わせ内容')
                        ->send();
                $this->redirect(array('action' => 'thanks'));
      
    } 
       }
       }
  } 

 

    
    //サンキューページ
    public function thanks() {
        
    }

   
}

