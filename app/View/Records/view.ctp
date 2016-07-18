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
</div>
