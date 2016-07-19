<div>
  <span>作品詳細</span>
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
  <?php endif; ?>
</div>
