<h2>ユーザ情報変更</h2>

<hr>
<h4>ユーザ情報</h4>
<?= $this->Form->create('User'); ?>
<?= $this->Form->input('name', ['label' => 'ニックネーム'] ); ?>
<?= $this->Form->input('email', ['label' => 'メールアドレス']); ?>
<?= $this->Form->hidden('id'); ?>
<?= $this->Form->end('保存する'); ?>

<hr>
<h4>アイコンの変更</h4>
<span>現在のアイコン</span><p>
<?= $this->User->photoImage_nouser($currentUser, ['style' => 'width:100px']) ;?>
<?= $this->Form->create('User', ['type' => 'file']); ?>
<?= $this->Form->input('icon_photo', ['type'=>'file', 'label' => 'アイコン']); ?>
<?= $this->Form->input('icon_photo_dir', ['type'=>'hidden']); ?>
<?= $this->Form->hidden('id'); ?>
<?= $this->Form->end('保存する'); ?>

<hr>
<h4>パスワードの変更</h4>
<?= $this->Form->create('User'); ?>
<?= $this->Form->input('password_current', ['label' => '現在のパスワード', 'type' => 'password']); ?>
<?= $this->Form->input('password', ['label' => '新パスワード', 'type' => 'password', 'value' => '']); ?>
<?= $this->Form->input('password_confirm', ['label' => 'パスワード（確認）', 'type' => 'password']); ?>
<?= $this->Form->hidden('id'); ?>
<?= $this->Form->end('保存する'); ?>

<hr>
<h4>ユーザ削除</h4>
<p>一度アカウントを削除すると、二度と元に戻せません。十分ご注意ください。</p>
<div>
  <?= $this->Form->postLink(
    'ユーザを削除する',
    ['action' => 'delete', $currentUser['id']],
    ['confirm' => '本当に削除してよろしいですか?']
  ); ?>
</div>
