<?php
//目当てのCSSを読み込んでくれる
echo $this->Html->css('main', null, array('inline' => false));
echo $this->Html->css('trailer', null, array('inline' => false));
echo $this->Html->css('prettyPhoto', null, array('inline' => false));
echo $this->Html->script('prettyPhoto', array('inline' => false));
$this->set('title_for_layout','予告編一覧');
?>
<script type="text/javascript" charset="utf-8">
    
    //予告動画をすぐに見れる
        $(function() {  
      $('.gallery a[rel^="prettyPhoto"]').prettyPhoto({ theme: 'facebook' });  
    });
    </script>
     <header id="movieListHeader" class="group">
<h1>予告編 一覧</h1>


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
          <ul class="gallery group">
                <?php foreach ($movies as $movie): ?>
                    <li class="unitMovie">
                        
                 <section class="innr group">
                            <h4><?php echo $movie['Movie']['name'] ?></h4>

<a class="youtube" href="http://www.youtube.com/watch?v=<?php echo h($movie['Movie']['trailer']); ?>"  rel="prettyPhoto[YouTube]" title="<?php echo $movie['Movie']['name'] ?>の予告編" 
   ><div style="background-color:black;border-right:8px solid black;border-left:8px solid black" >
        <img src="http://i.ytimg.com/vi/<?php echo h($movie['Movie']['trailer']); ?>/0.jpg" border="0" width="250" height="188" alt="<?php echo $movie['Movie']['name'] ?>"/>
    </div>
</a>
  <a href="/eigazuki/view/<?php echo $movie['Movie']['id'] ?>" target="_blank">詳細ページへ</a>
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
