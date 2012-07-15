<?php
//目当てのCSSを読み込んでくれる
echo $this->Html->css('main', null, array('inline' => false));
echo $this->Html->css('catchcopy', null, array('inline' => false));
$this->set('title_for_layout','キャッチコピー一覧');
?>

                <header id="movieListHeader" class="group">
<h1>キャッチコピー 一覧</h1>


<p id="indicateNumber">
    
        <em class="number">全<?php echo h($this->Jisaku->getTotal($this->params['paging']['Movie'])) ?></em><span class="unit">作品</span>
    </p>
 </header>
   <div class="pagination group">
    				<p class="searchNum">
                                    <?php echo h($this->Jisaku->getMin($this->params['paging']['Movie'])) ?>件目から
                                        <?php echo h($this->Jisaku->getMax($this->params['paging']['Movie'])) ?>件目まで表示</p>
			
	
				              
    <?php echo $this->element('pager') ?>
                                           
         
   
                             <!-- /#pagination --></div>

  <div id="movieListInnr" class="group">
        <div id="movieBlockContainer" class="group">
              <?php foreach ($movies as $movie): ?>
            <a href="/eigazuki/view/<?php echo $movie['Movie']['id'] ?>" target="_blank">
         <div class="picktxtarea">
<p class="picklines"><?php echo h($movie['Movie']['catchcopy']) ?></p>
<p class="picktit"><?php echo h($movie['Movie']['name']); ?></p>
</div><!--picktxtare-->
</a>
 <?php endforeach; ?>      
<div class="picktxtarea"></div>
<div class="picktxtarea"></div>
</div>

      </div>
    
     <div class="pagination group">
    				<p class="searchNum">
                                    <?php echo h($this->Jisaku->getMin($this->params['paging']['Movie'])) ?>件目から
                                        <?php echo h($this->Jisaku->getMax($this->params['paging']['Movie'])) ?>件目まで表示</p>
			
	
				              
    <?php echo $this->element('pager') ?>
                                           
         
   
                             <!-- /#pagination --></div>
