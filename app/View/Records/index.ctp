<div class="container">
  <div class="row">
    <ul>
      <?php foreach ($records as $record) :?>
        <div class="col-md-3 portfolio-item" style="padding-bottom: 20px;">
          <li class="img-responsive relative">
              <?= $this->Html->link(
              $this->Record->photoImageRecord($record, ['style' => 'width:100%']),
              ['action' => 'view', $record['Record']['id']],
              ['escape' => false]
              );?>
              <div class="absolute">
                <?= $record['Record']['title']; ?><br>
                <?= $record['Record']['artist']; ?>
              </div>
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
