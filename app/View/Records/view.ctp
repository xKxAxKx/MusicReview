<div>
  <h2>作品詳細</h2>
  <table>
    <tbody>
    <tr>
      <td>
      <?= $this->Record->photoImage($record, ['style' => 'width:100%']) ;?>
      </td>
    </tr>
    <tr>
      <td style="width: 25%;">作品名</td>
      <td style="width: 75%;"><?= $record['Record']['title']; ?></td>
    </tr>
    <tr>
      <td>アーティスト名</td>
      <td><?= $record['Record']['artist']; ?></td>
    </tr>
    </tbody>
  </table>
  <?php if($currentUser) :?>
    <div style="text-align:right;">
      <?= $this->Html->link('作品を編集する', ['action' => 'edit', $record['Record']['id']]); ?>
    </div>
    <div style="text-align:right;">
      <?= $this->Form->postLink(
        '作品を削除する',
        ['action' => 'delete', $record['Record']['id']],
        ['confirm' => '本当に削除してよろしいですか?']
      ); ?>
    </div>
    <?php if($flag == '1') :?>
      <div style="text-align:right;">
        <?= $this->Form->postLink('作品を聴いていないことにする',
        ['controller'=> 'listens', 'action' => 'delete', 'record_id' => $record['Record']['id']]); ?>
      </div>
    <?php else :?>
      <div style="text-align:right;">
        <?= $this->Form->postLink('作品を聴いた',
        ['controller'=> 'listens', 'action' => 'add', 'record_id' => $record['Record']['id']]); ?>
      </div>
    <?php endif; ?>
  <?php endif; ?>
</div>
<hr>
<span>この作品を聴いたユーザ</span>
<?php if(!$message == '0') :?>
  <p><?= $message; ?></p>
<?php else :?>

<?php endif; ?>
