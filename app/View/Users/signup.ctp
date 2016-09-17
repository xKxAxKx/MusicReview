<h2>新規ユーザ登録</h2>

<div class="container">
  <?= $this->Form->create('User', ['type' => 'file']); ?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('name', ['label' => 'ニックネーム', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('email', ['label' => 'メールアドレス', 'type' => 'email', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('password', ['label' => 'パスワード', 'type' => 'password', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('password_confirm', ['label' => 'パスワード(確認)', 'type' => 'password', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('icon_photo', ['type'=>'file', 'label' => 'アイコン', 'class' => 'form-control']); ?>
    </div>
    <?= $this->Form->input('icon_photo_dir', ['type'=>'hidden']); ?>
    <?= $this->Form->submit('登録する',['class' => 'btn btn-primary']); ?>
  </form>
</div>
