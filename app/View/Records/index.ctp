<ul class="row">
  <?php foreach ($records as $record) :?>
    <li style="width: 23%; display: inline-block; text-align: center">
      <?= $this->Html->link(
      $this->Record->photoImageRecord($record, ['style' => 'width:100%']),
      ['action' => 'view', $record['Record']['id']],
      ['escape' => false]
      );?>
      <span>
        <?= $this->Html->link($record['Record']['title'], ['action' => 'View', $record['Record']['id']]) ;?> /
        <?= $this->Html->link($record['Record']['artist'], ['action' => 'View', $record['Record']['id']]) ;?>
      </span>
    </li>
  <?php endforeach;?>
</ul>

<nav style="text-align:center">
	<ul class="pagination">
		<li><?= $this->Paginator->prev('<< 前へ'); ?></li>
		<li><?= $this->Paginator->numbers(); ?></li>
		<li><?= $this->Paginator->next('次へ >>'); ?></li>
	</ul>
</nav>
