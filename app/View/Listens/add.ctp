<?= $this->Form->create('Listen'); ?>
<?= $this->Form->hidden('id'); ?>
<?= $this->Form->hidden('record_id', ['value' => $shopId]); ?>
<?= $this->Form->end('聴いた'); ?>
