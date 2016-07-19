<?php

class UserHelper extends AppHelper{

  public $helpers = ['Html'];

  public function photoImage($user, $options =[]){

    $photoDir = Configure::read('Icon_Photo.dir');
    $defaultPhoto = Configure::read('Icon_Photo.default');

    if(empty($user['User']['icon_photo'])){
      $path = $defaultPhoto;
    } else {
      $path = $photoDir . $user['User']['icon_photo_dir'].'/'.$user['User']['icon_photo'];
    }

    return $this->Html->image($path, $options);
  }

  public function photoImage_nouser($currentUser, $options =[]){

    $photoDir = Configure::read('Icon_Photo.dir');
    $defaultPhoto = Configure::read('Icon_Photo.default');

    if(empty($currentUser['icon_photo'])){
      $path = $defaultPhoto;
    } else {
      $path = $photoDir . $currentUser['icon_photo_dir'].'/'.$currentUser['icon_photo'];
    }

    return $this->Html->image($path, $options);
  }

}
