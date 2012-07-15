<?php
//目当てのCSSを読み込んでくれる

echo $this->Html->css('search', null, array('inline' => false));
echo $this->Html->script('checkbox', array('inline' => false));
?>

<section id="searchSection" class="group">
    <header id="searchListHeader" class="group">

    </header><!-- /#serviceListHeader -->


    <div id="searchList">
        <div id="searchListInnr" class="group">
            <div id="searchContainer">
                <?php echo $this->Form->create('Movie', array('enctype' => 'multipart/form-data',)); ?>
               et>

                <fieldset id="keywordSet" class="fieldsetWrapper">
                    <label for="keyword" class="formTitle">タイトル</label>
                    <div class="formWrapper">
                        <?php
                        //タイトル
                        echo $this->Form->input('name', array('size' => 50, 'label' => false, 'div' => false, 'error' => false));
                        ?>
                    </div>
                </fieldset><!-- /#keywordSet -->


                <fieldset id="keywordSet" class="fieldsetWrapper">
                    <label for="keyword" class="formTitle">あらすじ</label>
                    <div class="formWrapper">

                        <?php
                        //あらすじ
                        echo $this->Form->input('summary', array('label' => false, 'div' => false, 'cols' => 100, 'rows' => 10));
                        ?>
                    </div>
                </fieldset>    


                <fieldset id="keywordSet" class="fieldsetWrapper">
                    <label for="keyword" class="formTitle">公開日</label>
                    <div class="formWrapper">

                        <?php
                        echo $this->Form->input('year', array('label' => false, 'div' => false,));
                        ?> 
                    </div>
                </fieldset><!-- /#keywordSet -->


                <fieldset id="timeSet" class="fieldsetWrapper">

                    <label for="time" class="formTitle">上映時間</label>
                    <div class="formWrapper">
                        <?php
                        //上映時間
                        echo $this->Form->input('time', array('label' => false, 'div' => false,));
                        ?>
                    </div>
                </fieldset><!-- /#timeSet -->

                <fieldset id="counSet" class="fieldsetWrapper">
                    <label for="country" class="formTitle">製作国</label>
                    <div class="formWrapper">
                        <?php
                        //製作国
                        echo $this->Form->input('Country', array('multiple' => 'checkbox', 'label' => false, 'div' => false));
                        ?>
                    </div>
                </fieldset><!-- /#counSet-->



                <fieldset id="genreSet" class="fieldsetWrapper">
                    <label for="genre" class="formTitle">ジャンル</label>
                    <div class="formWrapper">
                        <?php
                        //ジャンル
                        echo $this->Form->input('Genre', array('multiple' => 'checkbox', 'label' => false, 'div' => false, 'error' => false, 'options' => $genres
                        ));
                        ?>
                    </div>
                </fieldset><!-- /#genreSet -->
                <fieldset id="timeSet" class="fieldsetWrapper">

                    <label for="time" class="formTitle">eigacom</label>
                    <div class="formWrapper">
                        <?php
                        //eiga.com
                        echo $this->Form->input('eigacom', array('label' => false, 'div' => false,));
                        ?>
                    </div>
                </fieldset><!-- /#timeSet -->




                <fieldset id="timeSet" class="fieldsetWrapper">

                    <label for="time" class="formTitle">ポスター</label>
                    <div class="formWrapper">
                        <?php
                        //画像
                        echo $this->Form->input('poster', array('type' => 'file', 'label' => false, 'div' => false,));
                       
                        ?>
                    </div>
                </fieldset><!-- /#timeSet -->


                <fieldset id="timeSet" class="fieldsetWrapper">

                    <label for="time" class="formTitle">キャッチコピー</label>
                    <div class="formWrapper">
                        <?php
                        echo $this->Form->input('catchcopy', array('label' => false, 'div' => false, 'size' => 100,));
                        ?>
                    </div>
                </fieldset><!-- /#timeSet -->




                <fieldset id="timeSet" class="fieldsetWrapper">

                    <label for="time" class="formTitle">トレイラー</label>
                    <div class="formWrapper">
<?php
//トレイラー
echo $this->Form->input('trailer', array('label' => false, 'div' => false));
?>
                    </div>
                </fieldset>


                <fieldset id="feelingSet" class="fieldsetWrapper">
                    <label for="feeling" class="formTitle">ひとこと感想</label>
                    <div class="formWrapper">
<?php
//印象
echo $this->Form->input('Feeling', array('multiple' => 'checkbox', 'label' => false, 'div' => false, 'error' => false));
?>

                    </div>
                </fieldset><!-- /#feelingSet -->



                <fieldset id="partnerSet" class="fieldsetWrapper">
                    <label for="partner" class="formTitle">誰と見る？</label>
                    <div class="formWrapper">
<?php
//見る相手
echo $this->Form->input('Partner', array('multiple' => 'checkbox', 'label' => false, 'div' => false, 'error' => false));
?>
                    </div>
                </fieldset><!-- /#partnerSet -->


                <fieldset id="partnerSet" class="fieldsetWrapper">
                    <label for="partner" class="formTitle">オススメ度</label>
                    <div class="formWrapper">
<?php
echo $this->Jisaku->selectScore();
?>
                    </div>
                </fieldset><!-- /#partnerSet -->



<?php
//登録日時
echo $this->Form->input('created');
?>

                <fieldset id="searchBtnSet" class="fieldsetWrapper">
                <?php echo $this->Form->end(__('編集する')); ?>
                </fieldset>
            </div><!-- /#searchContainer -->
        </div><!-- /#searchListInnr -->

        <h3>リスト</h3>
        <ul>
            <div id="list">

                <li><?php echo $this->Html->link(__('登録作品一覧'), array('action' => 'all_list')); ?></li>
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


