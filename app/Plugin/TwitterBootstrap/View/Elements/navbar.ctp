<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">
        <?= $this->Html->link('Music Review', '/'); ?>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php if($currentUser) :?>
          <li><?= $this->Html->link('作品を追加する', '/Records/add'); ?></li>
        <?php endif; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if($currentUser) :?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <?= $this->User->photoImage_nouser($currentUser, ['style' => 'width:50px']) ;?>
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>
                <?= $this->Html->link('マイページ', ['controller' => 'users', 'action' => 'view', $currentUser['id']]); ?>
              </li>
              <li>
                <?= $this->Html->link('設定編集', ['controller' => 'users', 'action' => 'edit']); ?>
              </li>
              <li>
                <?= $this->Html->link('ログアウト', ['controller' => 'users', 'action' => 'logout']); ?>
              </li>
            </ul>
          </li>
        <?php else :?>
          <li>
            <?= $this->Html->link('ログイン', ['controller' => 'users', 'action' => 'login']); ?>
          </li>
          <li>
            <?= $this->Html->link('新規会員登録', ['controller' => 'users', 'action' => 'signup']); ?>
          </li>
        <?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
