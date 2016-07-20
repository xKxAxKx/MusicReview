<?php

class ListensController extends AppController{

  public $uses = ['Listen', 'Record', 'User'];

  public function add(){
    $this->request->allowMethod('post');

    $userId = $this->Auth->user('id');
    $recordId = $this->request->named['record_id'];

    if($this->request->is(['post'])){
      $this->Listen->create();
    }

    $this->request->data['Listen']['user_id'] = $userId;
    $this->request->data['Listen']['record_id'] = $recordId;

    if($this->Listen->save($this->request->data)){
      return $this->redirect(['controller' => 'records', 'action' => 'view', $recordId]);
    }
  }

  public function delete(){
    $this->request->allowMethod('post');

    $userId = $this->Auth->user('id');
    $recordId = $this->request->named['record_id'];

    $params = ['user_id' => $userId, 'record_id' => $recordId];
    if($this->Listen->deleteAll($params)){
      return $this->redirect(['controller' => 'records', 'action' => 'view', $recordId]);
    }
  }

}
