<div class="container">
  <?= $this->Form->create('Record', ['type' => 'file']); ?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('title',['label' => '作品タイトル', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('artist',['label' => 'アーティスト名', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('record_photo', ['type'=>'file', 'label' => 'ジャケット画像', 'class' => 'form-control']); ?>
    </div>
    <?= $this->Form->input('record_photo_dir', ['type'=>'hidden']); ?>
    <?php if(!empty($this->request->data)) :?>
      <?= $this->Form->hidden('id'); ?>
    <?php endif; ?>
    <?= $this->Form->submit($submitLabel, ['class' => 'btn btn-primary']); ?>
  </form>
</div>
