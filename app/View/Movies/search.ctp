<?php
//目当てのCSSを読み込んでくれる
echo $this->Html->css('main', null, array('inline' => false));
echo $this->Html->css('search', null, array('inline' => false));
echo $this->Html->css('result', null, array('inline' => false));
echo $this->Html->script('checkbox', array('inline' => false));

echo $this->Html->script('load', array('inline' => false));
?>


       <section id="searchSection" class="group">
           <header id="searchHeader" class="pageHeader group">
<h1 class="ttl">作品をさがす</h1>
</header>



<div id="searchList" class="group">
   
<!--    <section id="keywordSet" class="sectionWrapper">
              <h5 class="ttl">キーワード</h5>
              <div class="formWrapper">
            <?php
            //タイトル
            echo $this->Form->input('title', array('size'=>50,'label' => false,'div' => false,'error'=>false));
?>
                  </div>
                </section> /#keywordSet 
      
           -->
  
			<section id="timeSet" class="sectionWrapper">
                            
				     <h5 class="ttl">上映時間</h5>
                                 <div class="formWrapper">

 <?php           //上映時間
echo $this->Form->input('time',array('type'=>'select','label' => false,'div' => false,'error'=>false,
        'options'=>array('0-300' => '気にしない','0-59' => '0分～59分','60-99' => '60分～99分','100-119' => '100分～119分',
    '120-149' => '120分～149分','150-179' => '150分～179分','180-209' => '180分～209分','210-239' => '210分以上')));
            /*
              echo $this->Form->file('poster', array('label' => 'ポスター'));
             */
            ?>
                                </div>
</section><!-- /#timeSet -->
       
          
                
                
                
              <section id="counSet" class="sectionWrapper">
			     <h5 class="ttl">製作国</h5>
                        <div class="formWrapper">
                <?php
                //製作国
                echo $this->Form->input('country_id', array('name'=>'country_id','multiple' => 'checkbox', 'label' => false, 'div' => false,'error'=>false));
                ?>
                             </div>
            </section><!-- /#counSet-->

                

             <section id="genreSet" class="sectionWrapper">
               <h5 class="ttl">ジャンル(絞り込み)</h5>
                        <div class="formWrapper">
                <?php
                //ジャンル
                echo $this->Form->input('genre_id', array('name'=>'genre_id','multiple' => 'checkbox', 'label' => false, 'div' => false,'error'=>false));
                ?>
               </div>
            </section><!-- /#genreSet -->
        
            
               <section id="feelingSet" class="sectionWrapper">
			 <h5 class="ttl">ひとこと感想(絞り込み)</h5>
                        <div class="formWrapper">
<?php
//印象
echo $this->Form->input('feeling_id', array('name'=>'feeling_id','multiple' => 'checkbox', 'label' => false, 'div' => false,'error'=>false));
?>

          </div>
            </section><!-- /#feelingSet -->
        
        
        
         <section id="partnerSet" class="sectionWrapper">
			 <h5 class="ttl">誰と見る？</h5>
                        <div class="formWrapper">
<?php
//見る相手
echo $this->Form->input('partner_id', array('name'=>'partner_id','multiple' => 'checkbox', 'label' => false, 'div' => false,'error'=>false));
?>
 </div>
            </section><!-- /#partnerSet -->
    
   
     <section id="scoreSet" class="sectionWrapper">
            <h5 class="ttl">オススメ度</h5>
         
            
            <?php
       
        echo $this->Jisaku->selectScore();
        ?>
</section> 
            
        
        <section id="searchBtnSet" class="sectionWrapper">
       
           <input type="button" value="リセット" onclick="javascript:window.location.reload();" style="padding:0px 15px;" />
          
          
    </section><!-- /#searchListInnr -->
       </div><!-- /#searchList -->
<!-- /#serviceListSection --></section>




<section id="serviceListSection">
    <div id="result">
<div align="center"><strong style="color:#A74860">ここに検索結果が表示されます。</strong></div>
</div>
     <header id="movieListHeader" class="group">
<h2>最近登録した５０作品</h2>

 </header>
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
   “ <?php echo h($movie['Movie']['catchcopy']); ?> ”
<?php else : ?>
 " <?php  echo '詳しくはコチラ！'; ?> "
<?php endif ?>
</p>
    </section>
<!-- /.unitService --></div>
     <?php endforeach; ?>        
    
   
        

</div>
        </div>
<!-- /#serviceList --></div>
   </section> 