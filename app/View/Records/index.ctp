<h2>Music Review</h2>

<table>
  <tbody style="border: solid 1px #000">
    <?php foreach ($records as $record) :?>
      <tr>
        <td style="width: 10%">
          <?= $this->Html->link(
            $this->Record->photoImage($record, ['style' => 'width:100%']),
            ['action' => 'view', $record['Record']['id']],
            ['escape' => false]
          );?>
        </td>
        <td style="width: 30%">
          <?= $this->Html->link($record['Record']['title'], ['action' => 'View', $record['Record']['id']]) ;?>
        </td>
        <td style="width: 30%">
          <?= $this->Html->link($record['Record']['artist'], ['action' => 'View', $record['Record']['id']]) ;?>
        </td>
        <td style="width: 30%">
          登録日: <?= $this->Time->format($record['Record']['created'], '%Y/%m/%d'); ?>
        </td>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>
