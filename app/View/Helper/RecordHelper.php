<?php

class RecordHelper extends AppHelper{

  public $helpers = ['Html'];

  public function photoImage($record, $options =[]){
    $record_photoDir = Configure::read('Record_Photo.dir');
    $default_record_Photo = Configure::read('Record_Photo.default');

    if(empty($record['Record']['record_photo'])){
      $path = $default_record_Photo;
    } else {
      $path = $record_photoDir . $record['Record']['record_photo_dir'].'/'.$record['Record']['record_photo'];
    }

    return $this->Html->image($path, $options);
  }

}
