<h2>新規ユーザ登録</h2>

<?= $this->Form->create('User', ['type' => 'file']); ?>
<?= $this->Form->input('name', ['label' => 'ニックネーム']); ?>
<?= $this->Form->input('email', ['label' => 'メールアドレス', 'type' => 'email']); ?>
<?= $this->Form->input('password', ['label' => 'パスワード', 'type' => 'password']); ?>
<?= $this->Form->input('password_confirm', ['label' => 'パスワード(確認)', 'type' => 'password']); ?>

<?= $this->Form->input('icon_photo', ['type'=>'file', 'label' => 'アイコン']); ?>
<?= $this->Form->input('icon_photo_dir', ['type'=>'hidden']); ?>

<?= $this->Form->end('登録する'); ?>
