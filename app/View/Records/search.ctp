<h2 >
  <span style="border-bottom: 2px solid;">作品を検索する</span>
</h2>

<div class="container" style="margin-bottom: 50px;">
  <?= $this->Form->create('Record', ['type' => 'data']); ?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('keyword', ['label' => '', 'class' => 'form-control']); ?>
    </div>
    <?= $this->Form->submit('検索する',['class' => 'btn btn-primary']); ?>
  </form>
</div>

<?php if($result == 1): ?>
  <div>
    <h2>
        <span style="border-bottom: 2px solid;">検索結果</span>
    </h2>
    <!--null-->
    <?php if(empty($lists)) :?>
    <div　class="container">
      <div>見つかりませんでした。</div>
    </div>
    <?php endif; ?>

    <!--true-->
    <div　class="container">
      <div class="row">
        <ul>
          <?php foreach ($lists as $list) :?>
            <div class="col-md-3 portfolio-item" style="padding-bottom: 20px;">
                <li class="img-responsive relative">
                  <?= $this->Html->link(
                  $this->Record->photoImageRecord($list, ['style' => 'width:100%']),
                  ['action' => 'view', $list['Record']['id']],
                  ['escape' => false]
                  );?>
                  <div class="absolute">
                    <?= $list['Record']['title']; ?><br>
                    <?= $list['Record']['artist']; ?>
                  </div>
                </li>
              </div>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
<?php endif; ?>
