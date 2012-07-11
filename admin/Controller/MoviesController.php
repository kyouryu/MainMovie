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

        //取得したidを代入する
        $this->Movie->id = $id;

        //存在しないなら
        if (!$this->Movie->exists()) {
            //404エラーを表示する
            throw new NotFoundException(__('Invalid movie'));
        }

        //あるIDのデータをフィールド情報＋データで受け取る
        $this->set('movie', $this->Movie->read(null, $id));

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
//cssを適用しない
      
    
        //指定のIDを取得する
        $this->Movie->id = $id;
        if (!$this->Movie->exists()) {
            throw new NotFoundException(__('Invalid movie'));
        }



        //現在のページのリクエストが「post」であるなら、editアクション時には「isput」
        if ($this->request->is('post') || $this->request->is('put')) {

            if (!empty($this->request->data)) {
                if (!empty($this->request->data['Movie']['movie_url'])) {
                    $url = $this->request->data['Movie']['movie_url'];

                    $html = file_get_contents($url);
                    $htmlEnco = mb_convert_encoding($html, "UTF-8", "auto");
                    $htmlDom = str_get_html($htmlEnco);
                    $data = $htmlDom->find('#title h1');
                    $summarry = $htmlDom->find('p.outline');
                    $year = $htmlDom->find('.moveInfoBox strong');

                    foreach ($data as $key => $element) {

                        $this->request->data['Movie']['name'] = $element->plaintext;
                        $this->request->data['Movie']['summary'] = mb_substr($summarry[$key]->plaintext, 0, 80);
                        $this->request->data['Movie']['year'] = $year[$key]->plaintext;
                    }

                    $this->request->data['Movie']['eigacom'] = str_replace("http://eigacom/movie/", "", $url);
                }


                //ポスターが存在するなら
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



            //データがあるなら保存する
            if ($this->Movie->save($this->request->data)) {


                //表示するメッセージ
                $this->Session->setFlash(__('更新しました'));
                //ページ遷移
                $this->redirect(array('action' => 'index'));
            } else {
                //エラーメッセージ
                $this->Session->setFlash(__('更新できませんでした'));
            }
        } else {
            //$idが指定されていたらそのデータを読み込む
            $this->request->data = $this->Movie->read(null, $id);

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
        if (!$this->request->is('post')) {


            throw new MethodNotAllowedException();
        }
        $this->Movie->id = $id;

        if (!$this->Movie->exists()) {
//            これはエラーページを生成し、その例外のログを取ります。
            throw new NotFoundException(__('Invalid movie'));
        }

        //IDに一致するレコードを削除
        if ($this->Movie->delete($this->Movie->id)) {
            //movie_idに一致するレコードを削除する
            $this->Movie->CountriesMovie->delete(array('movie_id' => $this->Movie->id));
            $this->Movie->GenresMovie->delete(array('movie_id' => $this->Movie->id));
            $this->Movie->MoviesPartner->delete(array('movie_id' => $this->Movie->id));
            $this->Movie->FeelingsMovie->delete(array('movie_id' => $this->Movie->id));

            $this->Session->setFlash(__('削除しました'));
            $this->redirect(array('action' => 'all_list'));
        }

        $this->Session->setFlash(__('削除できませんでした'));
        $this->redirect(array('action' => 'all_list'));
    }

}

