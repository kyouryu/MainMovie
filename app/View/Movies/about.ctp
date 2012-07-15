<?php
//目当てのCSSを読み込んでくれる
echo $this->Html->css('main', null, array('inline' => false));
echo $this->Html->css('about', null, array('inline' => false));
$this->set('title_for_layout','このサイトについて');
?>




<section id="aboutSection" class="group">

    <h1 class="ttl">『ムムットってなぁ〜に？』</h1>

    <div class="aboutWrapper">
        <p class="f14">このサイトは、あなたが本当に見たい映画を探してくれるWEBサービスです。<br />
            今まであるようでなかった検索機能を実装しています。</p>
        <p class="f14">映画の探しかたは人それぞれ。例えば・・・</p>
        <p> <span class="f16 pink"><strong>　・長すぎる映画はイヤ！ でも、短すぎる映画もイヤ！　⇒　そんなときは「上映時間」で検索だ！</strong></span></p>
        <p> <span class="f16 pink"><strong>　・SFでホラーな映画をみたいよぉ〜　⇒　そんなときは「ジャンル」で検索だ！</strong></span></p>
        <p class="f16 pink"><strong>　・笑って、泣けて、心温まる映画がみたいよぉ〜　⇒　そんなときは「ひとこと感想」で検索だ！</strong></p>
        <p class="f16 pink"><strong>　・家族やカップルにおすすめの映画はないかなぁ〜？　⇒　そんなときは「誰と見る？」で検索だ！</strong></p>
        <p class="f14">等、『多種多様な条件』であなたが『ほんとうに』見たい映画がきっと見つかるはずです！</p>
        <p class="f14">思う存分、利用しちゃってください！</p>
        <p align="right">「ムムット♩」管理者より</p>
    </div>


</section><!-- /#searchSection -->


