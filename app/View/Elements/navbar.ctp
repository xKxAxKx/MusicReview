<div id="navbar">
  <ul>
    <li><?= $this->Html->link('Music Review', '/'); ?></li>
    <?php if($currentUser) :?>
      <li><?= $this->Html->link('作品を追加する', '/Records/add'); ?></li>
    <?php endif; ?>
  </ul>
  <ul class ="menu navbar-right">
    <?php if($currentUser) :?>
      <li class ="menu-li">
        <a href="#" class="caret-down">
          <?= $this->User->photoImage_nouser($currentUser, ['style' => 'width:50px']) ;?>
        </a>
        <ul class = "menu-second">
          <li class="menu-second-li">
            <?= $this->Html->link('マイページ', ['controller' => 'users', 'action' => 'view', $currentUser['id']]); ?>
          </li>
          <li class="menu-second-li">
            <?= $this->Html->link('設定編集', ['controller' => 'users', 'action' => 'edit']); ?>
          </li>
          <li class="menu-second-li">
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
</div>
