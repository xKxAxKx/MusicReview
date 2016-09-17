<div class="container">
  <div class="row">
    <ul>
      <?php foreach ($records as $record) :?>
        <div class="col-md-3 portfolio-item">
          <li class="img-responsive">
              <?= $this->Html->link(
              $this->Record->photoImageRecord($record, ['style' => 'width:100%']),
              ['action' => 'view', $record['Record']['id']],
              ['escape' => false]
              );?>
              <span style ="text-align:center">
                <?= $this->Html->link($record['Record']['title'], ['action' => 'View', $record['Record']['id']]) ;?> /
                <?= $this->Html->link($record['Record']['artist'], ['action' => 'View', $record['Record']['id']]) ;?>
              </span>
          </li>
        </div>
      <?php endforeach;?>
    </ul>
  </div>
</div>

<nav style="text-align:center">
	<ul class="pagination">
		<li><?= $this->Paginator->prev('<< 前へ'); ?></li>
		<li><?= $this->Paginator->numbers(); ?></li>
		<li><?= $this->Paginator->next('次へ >>'); ?></li>
	</ul>
</nav>
