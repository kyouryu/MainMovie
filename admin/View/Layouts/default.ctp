<!DOCTYPE html>
<head>
    <!--OGP,Facebookのいいねボタン,mixiチェックボタン-->
<html lang="ja" xmlns:og="http://ogp.me/ns#" xmlns:mixi="http://mixi-platform.com/ns#" xmlns:fb="http://www.facebook.com/2012/fbml">
    <meta charset="UTF-8" />
    <title>映画検索サイト ムムット♩</title>
  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
 
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

       
            <!-- / #siteHeader --></header>
        <!-- / [[[ HEADER-AREA ]]] -->

        <!-- [[[ GlOBAL NAV -AREA ]]] -->
        <!--    ナビセクション-->
        <section id="globalNavSection">

        
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
              
                <!-- /#containerInnr --></div>
            <!-- /#content --></div> 

        <!-- [[[ FOOTER -AREA ]]] -->
        <!--    フッター-->
        <footer id="siteFooter">

            <!-- /#siteFooter --></footer>

        <!-- / [[[ FOOTER LINK-AREA ]]] -->

        <!-- / #container --></div>
    <?php
    /*
     * echo $this->element('sql_dump');
     */
    ?>
   
</body>
</html>
