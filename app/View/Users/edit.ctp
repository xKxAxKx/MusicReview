<h2>ユーザ情報変更</h2>

<hr>
<h4>ユーザ情報</h4>
<div class="container">
  <?= $this->Form->create('User'); ?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('name', ['label' => 'ニックネーム', 'class' => 'form-control'] ); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('email', ['label' => 'メールアドレス', 'class' => 'form-control']); ?>
    </div>
    <?= $this->Form->hidden('id'); ?>
    <?= $this->Form->submit('保存する', ['class' => 'btn btn-primary']); ?>
  </form>
</div>


<hr>
<h4>アイコンの変更</h4>
<div class="container">
  <div>
    <span>現在のアイコン</span><p>
    <?= $this->User->photoImage_nouser($currentUser, ['style' => 'width:100px']) ;?>
  </div>
  <?= $this->Form->create('User', ['type' => 'file']); ?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('icon_photo', ['type'=>'file', 'label' => 'アイコン', 'class' => 'form-control']); ?>
    </div>
    <?= $this->Form->input('icon_photo_dir', ['type'=>'hidden']); ?>
    <?= $this->Form->hidden('id'); ?>
    <?= $this->Form->submit('保存する', ['class' => 'btn btn-primary']); ?>
  </form>
</div>


<hr>
<h4>パスワードの変更</h4>
<div class="container">
<?= $this->Form->create('User'); ?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('password_current', ['label' => '現在のパスワード', 'type' => 'password',  'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('password', ['label' => '新パスワード', 'type' => 'password', 'value' => '', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('password_confirm', ['label' => 'パスワード（確認）', 'type' => 'password', 'class' => 'form-control']); ?>
    </div>
      <?= $this->Form->hidden('id'); ?>
      <?= $this->Form->submit('保存する', ['class' => 'btn btn-primary']); ?>
  </form>
</div>


<hr>
<h4>ユーザ削除</h4>
<p>一度アカウントを削除すると、二度と元に戻せません。十分ご注意ください。</p>
<div style="margin-bottom: 30px;">
  <button type="button" class="btn btn-danger">
  <?= $this->Form->postLink(
    'ユーザを削除する',
    ['action' => 'delete', $currentUser['id']],
    ['confirm' => '本当に削除してよろしいですか?']
  ); ?>
  </button>
</div>
