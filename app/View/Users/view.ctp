<div class="container">
  <div class="row">
  <!-- 4列をサイドメニューに割り当て -->
    <div class="col-xs-2">
      <div class="panel panel-primary">
         <div class="panel-heading">
          <div class="panel-title">会員情報</div>
         </div>
         <div class="panel-body">
           <?= $this->User->photoImageUser($user, ['style' => 'width:80%', 'class' => "img-circle center-block"]) ;?>
         </div>
         <div class="panel-body">【ニックネーム】<br><?= $user['User']['name']; ?></div>
      </div>
  </div>
  <div class="col-xs-10">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="panel-title">このユーザが聴いた音楽</div>
      </div>
        <div class="panel-body">
          <?php if(!$message == '0') :?>
            <?= $message; ?>
          <?php else :?>
            <?php foreach ($records as $record) :?>
              <?= $this->Html->link(
                $this->Record->photoImageRecord($record, ['style' => 'width:19%', 'class' => "user-img"]),
                ['controller' => 'records', 'action' => 'view', $record['Record']['id']],
                ['escape' => false]
              );?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
