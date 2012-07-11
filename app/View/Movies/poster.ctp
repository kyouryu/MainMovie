<?php
//目当てのCSSを読み込んでくれる

echo $this->Html->css('poster', null, array('inline' => false));
$this->set('title_for_layout','ポスター画像一覧');
?>

            <header id="movieListHeader" class="group">
<h1>ポスター 一覧</h1>


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
          <ul class="gallery">
                <?php foreach ($movies as $movie): ?>
                    <li class="unitMovie">
                        
                 <section class="innr group">
                            <h4><?php echo $movie['Movie']['name'] ?></h4>
<div class="image"><a href="/eigazuki/view/<?php echo $movie['Movie']['id'] ?>" target="_blank" title="<?php echo $movie['Movie']['name'] ?>"><?php echo $this->Html->image('poster/' . $movie['Movie']['poster'], array('width' => '120', 'height' => '169', 'alt' => $movie['Movie']['name'],
        'class'=>'capture'))?></a></div>
                        </section></li>
                <?php endforeach; ?>  

            </ul>
</div>
      </div>

     <div class="pagination group">
    				<p class="searchNum">
                                    <?php echo h($this->Jisaku->getMin($this->params['paging']['Movie'])) ?>件目から
                                        <?php echo h($this->Jisaku->getMax($this->params['paging']['Movie'])) ?>件目まで表示</p>
			
	
				              
    <?php echo $this->element('pager') ?>
                                           
         
   
                             <!-- /#pagination --></div>