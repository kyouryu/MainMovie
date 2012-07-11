<?php
//目当てのCSSを読み込んでくれる

echo $this->Html->css('result', null, array('inline' => false));
$this->set('title_for_layout','検索結果');
?>


<!--データが存在するなら以下を表示する-->
<?php  if(!empty($movies)): ?>
<!--<div id="reSearch" class="group">
  <p><?php echo $this->Html->link(__('条件を変えて再検索する'), array('action' => 'search')); ?></p>
</div>
  
        <section id="serviceListSection" class="group">
        
-->
<header id="movieListHeader" class="group">
<h1>一致した作品</h1>


<p id="indicateNumber">
  
        <em class="number"><?php echo h($this->Jisaku->getTotal($this->params['paging']['Movie'])) ?></em><span class="unit">作品</span><span class="amount">/全<?php echo h($total) ?>作品</span>
    </p>
 </header>
    
   <div id="supFnctionWrap" class="group"> 
       <aside id="serCondition" class="group">
  
         <h2>検索条件</h2>
        <ul class="serSet group">
<!--            <?php if(!empty($search_title)): ?>
            <li>検索タイトル：<?php echo h($search_title); ?></li>
            <?php endif ?>
            -->
             <?php if(!empty($search_time)): ?>
            <li>上映時間：<?php echo h($search_time); ?>分</li>
            <?php endif ?>

          
            
              <?php if(!empty($search_country)): ?>
            <li>製作国：<?php echo $this->Jisaku->getSearch($search_country) ?></li>
            <?php endif ?>
            
            
              <?php if(!empty($search_genre)): ?>
            <li>ジャンル：<?php echo $this->Jisaku->getSearch($search_genre) ?></li>
            <?php endif ?>
            
            
              <?php if(!empty($search_partner)): ?>
            <li style="display:inline;padding-right:1em;">誰と見る？：<?php echo $this->Jisaku->getSearch($search_partner) ?></li>
            <?php endif ?>
            
            
              <?php if(!empty($search_feeling)): ?>
            <li style="display:inline;padding-right:1em;">ひとこと感想：<?php echo $this->Jisaku->getSearch($search_feeling) ?></li>
            <?php endif ?>
          
              <?php if(!empty($search_score)): ?>
            <li>オススメ度：<?php echo h($search_score); ?></li>
            <?php endif ?>
        </ul>
    </aside>

  </div>
            
  
            
  <div class="pagination group">
    				<p class="searchNum">
                                    <?php echo h($this->Jisaku->getMin($this->params['paging']['Movie'])) ?>件目から
                                        <?php echo h($this->Jisaku->getMax($this->params['paging']['Movie'])) ?>件目まで表示</p>
			
	
				              
    <?php echo $this->element('pager') ?>
                                           
         
   
                             <!-- /#pagination --></div>

        

<div id="movieList" class="group">
    <div id="movieListInnr" class="group">
        <div id="movieBlockContainer" class="group">
            <?php foreach ($movies as $movie): ?>
<div class="unitMovie group" id="listBlock01">
<section class="innr group">
    <h4><?php echo $movie['Movie']['name'] ?></h4>
<div class="image slideUp"><a href="/eigazuki/view/<?php echo $movie['Movie']['id'] ?>" target="_blank" title="<?php echo $movie['Movie']['name'] ?>"><?php echo $this->Html->image('poster/' . $movie['Movie']['poster'], array('width' => '180', 'height' => '253', 'alt' => $movie['Movie']['name'],
        'class'=>'capture'))?></a></div>
                    
    
<p class="tagline balloon04">
   <?php if (!empty($movie['Movie']['catchcopy'])) :?>
   “<?php echo h($movie['Movie']['catchcopy']); ?>”
<?php else : ?>
 <?php  echo ''; ?>
<?php endif ?>
</p>
    </section>
<!-- /.unitService --></div>
     <?php endforeach; ?>        
    
   
        
</div>
</div>
<!-- /#serviceList -->
           <div class="pagination group">
    				<p class="searchNum">
                                    <?php echo h($this->Jisaku->getMin($this->params['paging']['Movie'])) ?>件目から
                                        <?php echo h($this->Jisaku->getMax($this->params['paging']['Movie'])) ?>件目まで表示</p>
			
	
				              
    <?php echo $this->element('pager') ?>
                                           
         
   
                             <!-- /#pagination --></div>
</div>
<p>使用している画像・映像・文章の権利は、原権利者に帰属します。</p>

<?php else: ?>

<div align="center"><p><strong style="color:#A74860">その条件に一致する作品はございません。</strong></p></div>

 <?php endif ?>



