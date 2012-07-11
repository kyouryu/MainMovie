<?php
//目当てのCSSを読み込んでくれる
echo $this->Html->css('main', null, array('inline' => false));
echo $this->Html->css('view', null, array('inline' => false));

?>



<article id="movieSection" class="group">

    <div class="columnLeft group">

<div id="blockMovieGallery" class="group">
<div id="mainCapture">
<p><img src="/eigazuki/img/poster/<?php echo $movie['Movie']['poster'] ?>" width="250" height="351" alt="<?php echo $movie['Movie']['name']?>" /></p>

  

<!-- /#mainCapture --></div>




<!-- /#blockCaptureGallery --></div>
        </div>
        
<div class="columnRight group">
<header id="movieSectionHeader" class="group">
    <h1><?php echo h($movie['Movie']['name']); ?></h1>
<ul class="state">
</ul>
<!-- /#detailSectionHeader --></header>
    
 <section id="outlineSection" class="group"> 
<h2 class="ttl">“ <?php echo $movie['Movie']['catchcopy'] ?> ”</h2>
   
<p><?php echo h($movie['Movie']['summary']); ?>...
    <br/>
    <a href="http://eiga.com/movie/<?php echo h($movie['Movie']['eigacom']); ?>" target="_blank">>>詳しく見る (映画.comへ)</a></p>
 </section>
<!-- /.columnRight --></div>
        
        
    
 <?php if(!empty($search_time)): ?>
            <li>上映時間：<?php echo h($search_time); ?>分</li>
            <?php endif ?>


<div class="columnRight group">
<div id="blockDetailData" class="group">
<table id="detailDataTbl" class="module"> 

<tbody>

<tr><th>公開日</th><td><?php echo h($movie['Movie']['year']); ?></td></tr>
<tr><th>上映時間</th><td><?php echo h($movie['Movie']['time']); ?>分</td></tr> 
<tr><th>製作国</th><td><?php echo $this->Jisaku->getName($movie['Country']) ?></td></tr>
<tr><th>ジャンル</th><td><?php echo $this->Jisaku->getName($movie['Genre']) ?></td></tr>
<tr><th>ひとこと感想</th><td><?php echo $this->Jisaku->getName($movie['Feeling']) ?></td></tr>
<tr><th>誰と見る？</th><td><?php echo $this->Jisaku->getName($movie['Partner']) ?></td></tr>
<tr><th>オススメ度</th><td><?php 
$max = 5;
$level = h($movie['Movie']['score']);
echo str_repeat($this->Html->image('star_on.png'), $level) . str_repeat($this->Html->image('star_off.png'), $max-$level);
?> <?php echo $level ?>
        </td></tr>
</tbody> 
<!-- /#detailDataTbl --></table>
<!-- /#blockDetailData --></div>

</div>
      
      
    <div class="columnRight group">
        <aside id="trailerSection" class="group">
<h3 class="ttl">予告編</h3>
<div class="content group">

<div class="heightAlign present group">
    <p><iframe width="480" height="360" src="http://www.youtube.com/embed/<?php echo h($movie['Movie']['trailer']); ?>" 
                    frameborder="0" allowfullscreen></iframe></p>
<!-- /.present --></div>

<!-- /.content --></div>

<!-- /#memberSection --></aside>
        <p>   本サイトに掲載されているすべての著作物（文書・画像・動画）に関する著作権はは各権利所有者に帰属しております。問題がある場合は各権利所有者様ご本人がメールでご連絡下さい。確認後、早急に対応させていただきす。当サイトのご利用は、自己責任でお願いします。当サイト及び外部リンク先のサイトを利用したことにより発生した、いかなる損失・損害についても当サイトは一切の責任と義務を負いません。</p>  
     <!-- /columnLeft --></div>

<!-- /#detailSection --></article> 