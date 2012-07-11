<!--    ナビ内部-->
<div id="globalNavSectionInnr">
<!--    ナビ本体-->
<nav id="globalNav" class="group">
    
<ul class="group">
    <li id="globalHome" class="globalNavGroup group">
        <p class="label"><a href="/eigazuki">ホーム</a></p>
    </li>
    <li id="globalAbout" class="globalNavGroup group">
        <p class="label"><a href="/eigazuki/about">ムムット♩とは？</a></p>
    </li>
    <li id="globalSearch" class="globalNavGroup group">
        <p class="label"><?php echo $this->Html->link(__('映画をさがす'), array('action' => 'search')); ?></p>
        <ul class="sub">
            <li><?php echo $this->Html->link(__('条件でさがす'), array('action' => 'search')); ?></li>
            <li><?php echo $this->Html->link(__('ポスターでさがす'), array('action' => 'poster')); ?></li>
            <li><?php echo $this->Html->link(__('キャッチコピーでさがす'), array('action' => 'catchcopy')); ?></li>
            <li><?php echo $this->Html->link(__('予告編でさがす'), array('action' => 'trailer')); ?></li>
        </ul>
    </li>
    <li id="globalContact" class="globalNavGroup group">
        <p class="label"><?php echo $this->Html->link(__('お問い合わせ'), array('action' => 'contact')); ?></p>
    </li>
</ul>
       <!-- /#globalNav --></nav>
<!-- /#globalNavSectionInnr --></div>