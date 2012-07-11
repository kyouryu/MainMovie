<table>
  <tr>
    <th>名前</th>
	<td>
      <?php echo $this->Xformjp->input('user_name', array('type' => 'text')); ?>
      <?php echo $this->Xformjp->error('user_name'); ?>
    </td>
  </tr>
  <tr>
    <th>メールアドレス</th>
    <td>
<?php echo $this->Xformjp->input('email'); ?>
 </td>
  <td>
<?php if($this->Xformjp->checkConfirmScreen() === false) : // 確認画面では非表示  ?>
<?php echo $this->Xformjp->input('email_conf'); ?>(確認)
<?php endif; ?>
    </td>
  </tr>
  <tr>
    <th>お問い合わせ内容</th>
    <td>
      <?php echo $this->Xformjp->textarea('body', array('rows' => '10', 'cols' => '40')); ?>
      <?php echo $this->Xformjp->error('body'); ?>
    </td>
  </tr>
</table>