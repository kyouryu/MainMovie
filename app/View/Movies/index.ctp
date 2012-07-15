<?php
//目当てのCSSを読み込んでくれる
echo $this->Html->css('main', null, array('inline' => false));
echo $this->Html->css('home', null, array('inline' => false));
echo $this->Html->css('slider', null, array('inline' => false));

echo $this->Html->script('slider', array('inline' => false));
echo $this->Html->script('preloader', array('inline' => false));
?>


<script type="text/javascript">
    $(function() {
  
//ローディング中を表示
        $(".gallery").preloader();


//スライドを表示
        $('#sliderList').slider({
            autoplay: true,
            showControls: true,
            showProgress: true,
            hoverPause: true,
            wait: 13000,//次のスライドまでの間隔のスピード(16秒)
            fade: 6000,//スライドアニメーションのスピード(10秒)
            direction: 'left',
           
            randomize: false
        });
    


    });
</script>

<section id="topSection" class="group">
 
<h1 class="ttl">あなたが見たい映画は何ですか？</h1>
<!-- /#serviceListHeader -->
    
    
  
<div id="sliderList" class="group">
   

        <div>
            <ul class="gallery">
                <?php foreach ($movies_1 as $movie): ?>
                    <li>
                        
                        <section>
                             <h4><?php echo $movie['Movie']['name'] ?></h4>
                             <p><a href="/eigazuki/view/<?php echo h($movie['Movie']['id'])?>" target="_blank" title="<?php echo h($movie['Movie']['name']); ?>"><?php echo $this->Html->image('poster/' . h($movie['Movie']['poster']), array('width' => '150', 'height' => '211', 'alt' => h($movie['Movie']['name']))) ?></a></p>
                        </section></li>
                <?php endforeach; ?>  

            </ul>
        </div>
        <div>
            <ul class="gallery">
                <?php foreach ($movies_2 as $movie): ?>
                         <li>
                        <section>
                             <h4><?php echo $movie['Movie']['name'] ?></h4>
                            <p><a href="/eigazuki/view/<?php echo h($movie['Movie']['id'])?>" target="_blank" title="<?php echo h($movie['Movie']['name']); ?>"><?php echo $this->Html->image('poster/' . h($movie['Movie']['poster']), array('width' => '150', 'height' => '211', 'alt' => h($movie['Movie']['name']))) ?></a></p>
                        </section></li>
                <?php endforeach; ?> 

            </ul>
        </div>

        <div>
            <ul class="gallery">
<?php foreach ($movies_3 as $movie): ?>
                    <li>
                       <section>
                             <h4><?php echo $movie['Movie']['name'] ?></h4>
                            <p><a href="/eigazuki/view/<?php echo h($movie['Movie']['id'])?>" target="_blank" title="<?php echo h($movie['Movie']['name']); ?>"><?php echo $this->Html->image('poster/' . h($movie['Movie']['poster']), array('width' => '150', 'height' => '211', 'alt' => h($movie['Movie']['name']))) ?></a></p>
                        </section></li>
                <?php endforeach; ?> 

            </ul>
        </div>

        <div>
            <ul class="gallery">
<?php foreach ($movies_4 as $movie): ?>
                        <li>
                        <section>
                             <h4><?php echo $movie['Movie']['name'] ?></h4>
                            <p><a href="/eigazuki/view/<?php echo h($movie['Movie']['id'])?>" target="_blank" title="<?php echo h($movie['Movie']['name']); ?>"><?php echo $this->Html->image('poster/' . h($movie['Movie']['poster']), array('width' => '150', 'height' => '211', 'alt' => h($movie['Movie']['name']))) ?></a></p>
                        </section></li>
                <?php endforeach; ?> 

            </ul>
        </div>

        <div>
            <ul class="gallery">
<?php foreach ($movies_5 as $movie): ?>
                       <li>
                          <section>
                             <h4><?php echo $movie['Movie']['name'] ?></h4>
                            <p><a href="/eigazuki/view/<?php echo h($movie['Movie']['id'])?>" target="_blank" title="<?php echo h($movie['Movie']['name']); ?>"><?php echo $this->Html->image('poster/' . h($movie['Movie']['poster']), array('width' => '150', 'height' => '211', 'alt' => h($movie['Movie']['name']))) ?></a></p>
                        </section></li>
<?php endforeach; ?> 

            </ul>
        </div>

 
         </div>
  
    </section>

