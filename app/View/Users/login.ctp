<h2>ログインする</h2>


<div class="container">
  <?= $this->Flash->render('Auth');?>
  <?= $this->Form->create('User');?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('email', ['label' => 'mail adress', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('password', ['label' => 'password', 'class' => 'form-control']); ?>
    </div>
      <?= $this->Form->submit('ログイン', ['class' => 'btn btn-primary']); ?>
  </form>
</div>
