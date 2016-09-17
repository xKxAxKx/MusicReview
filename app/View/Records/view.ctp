

<div class="container">
  <div class="row">
      <!-- 5列をサイドメニューに割り当て -->
      <div class="col-xs-5">
        <?= $this->Record->photoImageRecord($record, ['style' => 'width:80%', 'class' => "center-block"]) ;?>
      </div>
      <div class="col-xs-7">
        <h2>
          <span style="border-bottom: 2px solid;"><?= $record['Record']['title']; ?></span><br>
          <small><?= $record['Record']['artist']; ?></small>
        </h2>
        <br>
          <div style="margin-bottom: 30px;">
          <p class="c-black m-b-5">ステータス</p>
          <?php if($flag == '1') :?>
            <?= $this->Form->postLink(
              '作品を聴いた',
              ['controller'=> 'listens', 'action' => 'delete', 'record_id' => $record['Record']['id']],
              ['class' => 'btn btn-info', 'disabled' => 'disabled', 'role' => 'button']
            ); ?>
          <?php else :?>
            <?= $this->Form->postLink(
              '作品を聴いた',
              ['controller'=> 'listens', 'action' => 'add', 'record_id' => $record['Record']['id']],
              ['class' => 'btn btn-info active', 'role' => 'button']
            ); ?>
          <?php endif; ?>
        </div>
        <div style="margin-bottom: 30px;">
          <p class="c-black m-b-5">この作品を聴いたユーザ</p>
          <?php if(!$message == '0') :?>
            <p><?= $message; ?></p>
          <?php else :?>
            <?php foreach ($users as $user) :?>
              <?= $this->Html->link(
                $this->User->photoImageUser($user, ['style' => 'width:30px', 'class' => "img-circle"]),
                ['controller' => 'users', 'action' => 'view', $user['User']['id']],
                ['escape' => false]
              );?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <?php if($currentUser) :?>
        <div style="text-align: right;">
          <p class="c-black m-b-5">作品の操作</p>
          <p>
            <?= $this->Html->link('作品を編集する', ['action' => 'edit', $record['Record']['id']]); ?>
          </p>
          <p>
            <?= $this->Form->postLink(
              '作品を削除する',
              ['action' => 'delete', $record['Record']['id']],
              ['confirm' => '本当に削除してよろしいですか?']
            ); ?>
          </p>
        </div>
        <?php endif; ?>
      </div>
  </div>
<div>
