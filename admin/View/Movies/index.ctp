<?php
//目当てのCSSを読み込んでくれる
echo $this->Html->css('cake.generic', null, array('inline' => false));

?>

<div class="movies index">
  <div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	<h2><?php echo __('Movies');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('year');?></th>
			<th><?php echo $this->Paginator->sort('time');?></th>
			<th><?php echo $this->Paginator->sort('summary');?></th>
			<th><?php echo $this->Paginator->sort('eigacom');?></th>
			<th><?php echo $this->Paginator->sort('poster');?></th>
                         <th><?php echo $this->Paginator->sort('catchcopy');?></th>            
			<th><?php echo $this->Paginator->sort('trailer');?></th>
		<th><?php echo $this->Paginator->sort('score');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>	
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($movies as $movie): ?>
	<tr>
		<td><?php echo h($movie['Movie']['id']); ?> </td>
		<td><?php echo h($movie['Movie']['name']); ?> </td>
		<td><?php echo h($movie['Movie']['year']); ?> </td>
		<td><?php echo h($movie['Movie']['time']); ?> </td>
		<td><?php echo h($movie['Movie']['summary']); ?> </td>
		<td><?php echo h($movie['Movie']['eigacom']); ?> </td>
		<td><?php echo h($movie['Movie']['poster']); ?> </td>
                <td><?php echo h($movie['Movie']['catchcopy']); ?> </td>
		<td><?php echo h($movie['Movie']['trailer']); ?> </td>
		<td><?php echo h($movie['Movie']['score']); ?> </td>
		<td><?php echo h($movie['Movie']['created']); ?> </td>

		<td class="actions">
			<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $movie['Movie']['id'])); ?>
			<?php echo $this->Html->link(__('編集'), array('action' => 'edit', $movie['Movie']['id'])); ?>
			<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $movie['Movie']['id']), null, __('本当に削除しますか？', $movie['Movie']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
//        現在何ページ目かといった情報をまとめて表示する
//        {:page}は現在のページ番号 {:pages}は最大ページ番号 {:count}は全データ数 {:current}は１ページに表示できるデータ数
//        {:start}は開始番号 {:end}は終了番号
	echo $this->Paginator->counter(array(
	'format' => __('{:page} / {:pages}, 全{:count}件中{:current}件,({:start}から{:end}件表示)')
	));
	?>
        </p>
<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('作品を登録する'), array('action' => 'add')); ?></li>
	
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
                
<li><?php echo $this->Html->link('ログアウト', array('controller' => 'users','action' => 'logout')); ?></li>
	</ul>
</div>