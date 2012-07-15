<!DOCTYPE html>
<head>
    <!--OGP,Facebookのいいねボタン,mixiチェックボタン-->
<html lang="ja" xmlns:og="http://ogp.me/ns#" xmlns:mixi="http://mixi-platform.com/ns#" xmlns:fb="http://www.facebook.com/2012/fbml">
    <meta charset="UTF-8" />
    <title><?php echo $title_for_layout; ?>｜映画検索サイト ムムット♩</title>
    <!--ページの概要-->
    <meta name="description" content="<?php echo $description; ?>" />
    <!--ページの重要なキーワードを書く5個～6個ぐらいが良い-->
    <meta name="keywords" content="<?php echo $keywords; ?>" />
    <!--作者情報-->
    <meta name="author" content="KYOURYU" />
    <!--スマートフォン向け　幅はデバイスに準拠、ズームはさせない-->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />

    <!--ソーシャルメディア要素-->
    <!--オブジェクトのタイトル-->
    <meta property="og:title" content="<?php echo $title_for_layout; ?>｜映画検索サイト ムムット♩" />
    <!--オブジェクトの説明-->
    <meta property="og:description" content="<?php echo $description; ?>" />
    <!--オブジェクトのURL-->
    <meta property="og:url" content="<?php echo $this->Html->url('/', true); ?>" />
    <!--オブジェクトの画像-->
    <meta property="og:image" content="" />
    <!--サイト名-->
    <meta property="og:site_name" content="映画を探すなら ムムット♩" />
    <!--Webページと結びつけたいFacebookのファンページID-->
    <meta property="fb:page_id" content="1410148374" />
    <!--お気に入りやアドレスバーに表示する小さなアイコン-->
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" sizes="16x16" href="" />

    <!--サイトのアイコンを指定-->
    <link rel="icon" type="image/gif" href="" />
    <!--Google FeedBurner-->
    <link rel="alternate" href="" title="映画探すなら ムムット♩ TOPICS" type="application/rss+xml" />
    <!--スマートフォン　ホーム画面アイコン-->
    <link rel="apple-touch-icon-precomposed" href="" />

    <!--　mixi 表示するアイコンの画像-->
    <link rel="mixi-check-image" href="" />

    <!--Google ウェブマスターツール-->
    <meta name="google-site-verification" content="" />

    <link rel="index" href="/" title="トップページ" />
    <link rel="help" href="" title="" />

    <!--パソコンにインストールされていないフォントを表示-->
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css' />
   
     
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $("ul.sub").hide();
            $("ul.group li").hover(function(){
                $("ul:not(:animated)",this).slideDown("fast")
            },
            function(){
                $("ul",this).slideUp("fast");
            })
        })
    </script>

    <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--> 
    <!--/app/webroot/css」でCSSを読み込む-->

     <?php echo $scripts_for_layout; ?>
</head>
<body>
 <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
    <!-- [[[ CONTAINER-AREA ]]] -->
    <div id="container">

        <!-- [[[ HEADER-AREA ]]] -->
        <header id="siteHeader">

            <?php echo $this->element('header'); ?>       

            <!-- / #siteHeader --></header>
        <!-- / [[[ HEADER-AREA ]]] -->

        <!-- [[[ GlOBAL NAV -AREA ]]] -->
        <!--    ナビセクション-->
        <section id="globalNavSection">

            <?php echo $this->element('nav'); ?>

            <!-- /#globalNavSection --></section>

        <!-- / [[[ GlOBAL NAV -AREA ]]] -->


        <!-- [[[ CONTENT -AREA ]]] -->
        <!--コンテンツ-->
        <div id="content">
            <!--コンテンツ内部-->
            <div id="contentInnr" class="group">


                <?php echo $this->Session->flash(); ?>
                <?php echo $content_for_layout; ?>

                <!-- [[[ SOCIAL LINK -AREA ]]] メインコンテンツに何かしら関連があるが、なくても良い-->
                <aside id="siteShareBtn" class="group">
                    <?php echo $this->element('social'); ?>
                </aside>

                <!-- /#containerInnr --></div>
            <!-- /#content --></div> 

        <!-- [[[ FOOTER -AREA ]]] -->
        <!--    フッター-->
        <footer id="siteFooter">
<!--フッター内部-->
  <?php echo $this->element('footer'); ?>

            <!-- /#siteFooter --></footer>

        <!-- / [[[ FOOTER LINK-AREA ]]] -->

        <!-- / #container --></div>
    <?php
    /*
     * echo $this->element('sql_dump');
     */
    ?>
    <script src="js/script.js"></script>
    <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>

</body>
</html>
