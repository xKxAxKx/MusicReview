<?= $this->Form->create('Record', ['type' => 'file']); ?>
<?= $this->Form->input('title',['label' => '作品タイトル']); ?>
<?= $this->Form->input('artist',['label' => 'アーティスト名']); ?>

<?= $this->Form->input('record_photo', ['type'=>'file', 'label' => 'ジャケット画像']); ?>
<?= $this->Form->input('record_photo_dir', ['type'=>'hidden']); ?>
<?php if(!empty($this->request->data)) :?>
  <?= $this->Form->hidden('id'); ?>
<?php endif; ?>
<?= $this->Form->end($submitLabel); ?>
