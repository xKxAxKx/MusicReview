<?php

class ListensController extends AppController{

  public function add($recordId = null){
    $userId = $this->Auth->user('id');

    if($this->request->is(['post', 'put'])){
      $this->Listen->create();
    }

    $this->request->data['Listen']['user_id'] = $userId;
  }

  public function delete($recordId = null){

  }



}
