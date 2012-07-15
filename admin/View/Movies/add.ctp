<?php
//目当てのCSSを読み込んでくれる
echo $this->Html->css('main', null, array('inline' => false));
echo $this->Html->css('search', null, array('inline' => false));
  echo $this->Html->script('checkbox', array('inline' => false));
?>



       
       
        <section id="searchSection" class="group">
    <header id="searchListHeader" class="group">
<h1 class="ttl">作品を追加する</h1>
</header><!-- /#serviceListHeader -->


 <div id="searchList">
<div id="searchListInnr" class="group">
    <div id="searchContainer">
  <?php echo  $this->Form->create('Movie'); ?>
      
        
        
                          <fieldset id="keywordSet" class="fieldsetWrapper">
                    <label for="q" class="formTitle">URL</label>
                      <div class="formWrapper">
<?php
echo $this->Form->input('movie_url1', array('label' => false, 'size' => 50));
?>
                            </div>
                </fieldset>
        
                   <fieldset id="keywordSet" class="fieldsetWrapper">
                    <label for="q" class="formTitle">URL</label>
                      <div class="formWrapper">
<?php
echo $this->Form->input('movie_url2', array('label' => false, 'size' => 50));
?>
                            </div>
                </fieldset>
        
                   <fieldset id="keywordSet" class="fieldsetWrapper">
                    <label for="q" class="formTitle">URL</label>
                      <div class="formWrapper">
<?php
echo $this->Form->input('movie_url3', array('label' => false, 'size' => 50));
?>
                            </div>
                </fieldset>
        
                   <fieldset id="keywordSet" class="fieldsetWrapper">
                    <label for="q" class="formTitle">URL</label>
                      <div class="formWrapper">
<?php
echo $this->Form->input('movie_url4', array('label' => false, 'size' => 50));
?>
                            </div>
                </fieldset>
        
                   <fieldset id="keywordSet" class="fieldsetWrapper">
                    <label for="q" class="formTitle">URL</label>
                      <div class="formWrapper">
<?php
echo $this->Form->input('movie_url5', array('label' => false, 'size' => 50));
?>
                            </div>
                </fieldset>
        
         
            
     
         <fieldset id="searchBtnSet" class="fieldsetWrapper">
<?php echo $this->Form->end(__('登録する', true)); ?>
             </fieldset>
          </div><!-- /#searchContainer -->
    </div><!-- /#searchListInnr -->
    
    <h3>リスト</h3>
	<ul>
            <div id="list">
	
		<li><?php echo $this->Html->link(__('登録作品一覧'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('国一覧'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
<!--		<li><?php echo $this->Html->link(__('国追加'), array('controller' => 'countries', 'action' => 'add')); ?> </li>-->
		<li><?php echo $this->Html->link(__('見た印象一覧'), array('controller' => 'feelings', 'action' => 'index')); ?> </li>
<!--		<li><?php echo $this->Html->link(__('見た印象追加'), array('controller' => 'feelings', 'action' => 'add')); ?> </li>-->
		<li><?php echo $this->Html->link(__('ジャンル一覧'), array('controller' => 'genres', 'action' => 'index')); ?> </li>
<!--		<li><?php echo $this->Html->link(__('ジャンル追加'), array('controller' => 'genres', 'action' => 'add')); ?> </li>-->
		<li><?php echo $this->Html->link(__('オススメ鑑賞相手一覧'), array('controller' => 'partners', 'action' => 'index')); ?> </li>
<!--		<li><?php echo $this->Html->link(__('オススメ鑑賞相手登録'), array('controller' => 'partners', 'action' => 'add')); ?> </li>-->
<!--		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New People'), array('controller' => 'people', 'action' => 'add')); ?> </li>-->
	</ul>

</div>
       </div><!-- /#searchList -->
    </section><!-- /#searchSection -->
   

