<div>
  <span>会員情報</span>
  <table>
    <tbody>
    <tr>
      <td>
      <?= $this->User->photoImageUser($user, ['style' => 'width:100%']) ;?>
      </td>
    </tr>
    <tr>
      <td style="width: 25%;">ユーザ名</td>
      <td style="width: 75%;"><?= $user['User']['name']; ?></td>
    </tr>
    <tr>
      <td>登録日</td>
      <td><?= $user['User']['created']; ?></td>
    </tr>
    </tbody>
  </table>
</div>
<p>このユーザが聴いた作品</p>
<?php if(!$message == '0') :?>
  <p><?= $message; ?></p>
<?php else :?>
  <?php foreach ($records as $record) :?>
    <?= $this->Html->link(
      $this->Record->photoImageRecord($record, ['style' => 'width:100px']),
      ['controller' => 'records', 'action' => 'view', $record['Record']['id']],
      ['escape' => false]
    );?>
  <?php endforeach; ?>
<?php endif; ?>
