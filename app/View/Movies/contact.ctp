<?php
//目当てのCSSを読み込んでくれる
echo $this->Html->css('main', null, array('inline' => false));
echo $this->Html->css('contact', null, array('inline' => false));
$this->set('title_for_layout','お問い合わせページ');
?>


<section id="contactSection" class="group">
    <?php echo $this->Form->create('Movie'); ?>
    <h3 class="ttl">お問い合わせ</h3>
    <p>以下のお問い合わせフォームに必要事項をご記入ください。 </p>
<!--エラーがあるならメッセージを表示する-->

<table id="contactDataTbl" class="module"> 

    <tbody>
        <tr>
            <th><?php echo $this->Form->label('user_name', 'お名前'); ?><em>（必須）</em></th>
            <td><?php echo $this->Form->input('user_name', array('label' => false,'size'=>'30')); ?></td>
        </tr>
        <tr>
            <th><?php echo $this->Form->label('email', 'メールアドレス(PC)'); ?><em>（必須）</em></th>
            <td><?php echo $this->Form->input('email', array('label' => false,'size'=>'30')); ?></td>
        </tr>
        <tr>
            <th><?php echo $this->Form->label('category', '問い合わせの種類'); ?></th>
            <td><?php echo $this->Form->input('category',array('type'=>'select','label' => false,'div' => false,'error'=>false,
        'options'=>array('ご意見、ご要望' => 'ご意見、ご要望','作品について' => '作品について','検索方法について' => '検索方について','ひとこと感想について' => 'ひとこと感想について','誰と見る？について' => '誰と見る？について','オススメについて' => 'オススメについて','その他のご質問' => 'その他のご質問'))); ?></td>
        </tr>
        <tr>
            <th><?php echo $this->Form->label('body', 'お問い合わせ内容'); ?><em>（必須）</em></th>
            <td><?php echo $this->Form->input('body', array('type' => 'textarea', 'label' => false,'cols'=>'70','row'=>'7')); ?></td>
        </tr>

    </tbody>
   
</table>
 
      <?php echo $this->Form->end('上記の内容で送信する'); ?>

</section>