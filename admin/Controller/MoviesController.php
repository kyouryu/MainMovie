<?php

/*
 * モデルの中で使う場合、behavior
  コントローラの中で使う場合は、component
  ビューの中で使う場合は、helper
 */
App::uses('AppController', 'Controller');
App::import('Vendor', 'simpleHtmlDom/simple_html_dom');

/**
 * Movies Controller
 *
 * @property Movie $Movie
 */
class MoviesController extends AppController {

    //使用するヘルパーを指定する
    public $helpers = array('Jisaku');
 
    //使用するモデル名
    public $name = 'Movies';

    /* 共通項目
      ---------------------------------------------------- */

    function beforeFilter() {


//認証不要ページ
      
        
      
        
//                ログインしていないときのメッセージ
        $this->Auth->authError = 'ログインしてください';


    }

    
      public function index() {

        //50件ずつ表示
        $this->paginate = array(
            'limit' => 50
        );
        $this->set('movies', $this->paginate());
    }
    
    
    
       /* ----------------------------------------------------
      #詳細ページ
      ---------------------------------------------------- */
    public function view($id = null) {

           
		$movie = $this->Movie->findById($id);
		if(empty($movie)) {
			$this->Session->setFlash('作品が見つかりませんでした');
			$this->redirect(array('action'=> 'search'));
		}
		
		$this->set(compact('movie'));
                

    }

    
    
    /* ----------------------------------------------------
      #作品追加ページ
      ---------------------------------------------------- */
    public function add() {
//cssを適用しない
        $this->layout = "";
        if (!empty($this->request->data['Movie']['movie_url1'])) {
            //データが空でないなら配列に代入する
            if (!empty($this->request->data['Movie']['movie_url1'])) {
                $movie_urls[] = $this->request->data['Movie']['movie_url1'];
            }
            if (!empty($this->request->data['Movie']['movie_url2'])) {
                $movie_urls[] = $this->request->data['Movie']['movie_url2'];
            }
            if (!empty($this->request->data['Movie']['movie_url3'])) {
                $movie_urls[] = $this->request->data['Movie']['movie_url3'];
            }
            if (!empty($this->request->data['Movie']['movie_url4'])) {
                $movie_urls[] = $this->request->data['Movie']['movie_url4'];
            }
            if (!empty($this->request->data['Movie']['movie_url5'])) {
                $movie_urls[] = $this->request->data['Movie']['movie_url5'];
            }

            foreach ($movie_urls as $url) {

                //作品ページのHTMLを取得
                $html = file_get_contents($url);
                //UTF-8に変換する
                $htmlEnco = mb_convert_encoding($html, "UTF-8", "auto");
                //取得したhtmlのsimple_html_domオブジェクトを作成
                $htmlDom = str_get_html($htmlEnco);
//<div id="title">内の<h1>要素内のタイトルを取得
                $data = $htmlDom->find('#title h1');
//あらすじを取得
                $summarry = $htmlDom->find('.outline p');
                //公開日を取得
                $year = $htmlDom->find('.moveInfoBox strong');

                foreach ($data as $key => $element) {

//タイトル代入
                    $this->request->data['Movie']['name'] = $element->plaintext;
//あらすじ１００文字を代入
                    $this->request->data['Movie']['summary'] = mb_substr($summarry[$key]->plaintext, 0, 100);
                    //製作年を代入
                    $this->request->data['Movie']['year'] = $year[$key]->plaintext;
                }

                //$urlからhttp://eigacom/movie/を取り除きidのみ取得
                $this->request->data['Movie']['eigacom'] = str_replace("http://eiga.com/movie/", "", $url);
                $this->Movie->create();
                //保存する
                $this->Movie->save($this->request->data);
            }

            //表示するメッセージ
            $this->Session->setFlash(__('追加しました'));
            //ページ遷移
            $this->redirect(array('action' => 'index'));
        }
    }


    
    
   /* ----------------------------------------------------
      #編集ページ
      ---------------------------------------------------- */
    public function edit($id = null) {
          $this->Movie->id = $id;
          
if($this->request->isPost() || $this->request->isPut()) {
                     //ポスターが存在するなら
     if (!empty($this->request->data)) {
                if (!empty($this->request->data['Movie']['poster']['size'])) {

                    //ポスターデータを入れる
                    $poster = $this->request->data['Movie']['poster'];
                  
                    //アップロードする関数にポスターIDとデータIDを渡す
                    $this->request->data["Movie"]["poster"] = $this->Movie->uploadImage($poster, $this->Movie->id);
                    $this->Session->setFlash("ファイルのアップロードに成功しました。");
                } else {
                    //ポスターフィールドを削除
                    unset($this->request->data["Movie"]["poster"]);
                }
     }
     
			if($this->Movie->save($this->request->data)) {
				$this->Session->setFlash('問い合わせを保存しました');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('入力に間違いがあります');
			}
		} else {
			$this->request->data = $this->Movie->findById($id);
			if(empty($this->request->data)) {
				$this->Session->setFlash('作品が見つかりませんでした');
				$this->redirect(array('action'=> 'index'));
			}
		}
                
               $countries = $this->Movie->Country->getCountry();
        $genres = $this->Movie->Genre->getGenre();
        $feelings = $this->Movie->Feeling->getFeeling();
        $partners = $this->Movie->Partner->getPartner();
        $this->set(compact('poster', 'countries', 'feelings', 'genres', 'partners', 'isEdit'));
                
	}




    
    
    /* ----------------------------------------------------
      #削除ページ
      ---------------------------------------------------- */
    public function delete($id = null) {
    $this->Movie->id = $id;

        //IDに一致するレコードを削除
        if ($this->Movie->delete($id)) {
            //movie_idに一致するレコードを削除する
            $this->Movie->CountriesMovie->delete(array('movie_id' => $id));
            $this->Movie->GenresMovie->delete(array('movie_id' => $id));
            $this->Movie->MoviesPartner->delete(array('movie_id' => $id));
            $this->Movie->FeelingsMovie->delete(array('movie_id' => $id));

            $this->Session->setFlash(__('削除しました'));
            $this->redirect(array('action' => 'index'));
        }

        $this->Session->setFlash(__('削除できませんでした'));
        $this->redirect(array('action' => 'index'));
    }

    
     
}

