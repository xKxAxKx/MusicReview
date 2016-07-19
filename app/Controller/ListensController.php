<?php

class ListensController extends AppController{

  public $uses = ['Listen', 'Record'];

  public function add($recordId = null){
    $userId = $this->Auth->user('id');//現在ログインしているユーザのidを入れてあげる

    if($this->request->is(['post', 'put'])){
      $this->Listen->create();
    }

    $this->request->data['Listen']['user_id'] = $userId;
  }

  public function delete($recordId = null){

  }



}
