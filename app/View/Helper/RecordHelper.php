<?php

class RecordHelper extends AppHelper{

  public $helpers = ['Html'];

  public function photoImage($record, $options =[]){

    $photoDir = Configure::read('Record_Photo.dir');
    $defaultPhoto = Configure::read('Record_Photo.default');

    if(empty($record['Record']['record_photo'])){
      $path = $defaultPhoto;
    } else {
      $path = $photoDir . $record['Record']['record_photo_dir'].'/'.$record['Record']['record_photo'];
    }

    return $this->Html->image($path, $options);
  }

}
