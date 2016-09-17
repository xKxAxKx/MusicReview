<?php

class RecordsController extends AppController{

  public $uses = ['Record', 'Listen', 'User'];

  public function beforeFilter(){
    parent::beforeFilter();

    $this->Auth->allow('index', 'view');
  }

  public $helpers = ['Record', 'User'];

  public $components = [
    'Paginator' => ['limit' => 12, 'order' => ['artist' =>'asc']]
  ];

  public function index(){

    $this->set('records', $this->Paginator->paginate());
  }//indexここまで



  public function view($id = null) {
    if(!$this->Record->exists($id)){
      throw new NotFoundException('作品が見つかりません');
    }

    $flag = '0';
    if($this->Auth->user() && $this->Listen->getData($id, $this->Auth->user('id'))){
      $flag = '1';
    }

    $message = 'この作品を聴いたユーザはいません';
    $Listen_list = $this->Listen->find('all',  ['conditions' => ['record_id' => $id]]);
    if($Listen_list){
      $message = '0';

      $user_ids = Hash::extract($Listen_list, '{n}.Listen.user_id');
      $this->User->recursive = -1;
      $this->set('users', $this->User->find('all', ['conditions' => ['id' => $user_ids]]));
    }

    $this->set('message', $message);
    $this->set('flag', $flag);
    $this->set('record', $this->Record->findById($id));
  }//viewここまで



// $this->Session->setFlash('フラッシュメッセージだよ！', 'default', array('class'=> 'alert alert-success'));


  public function add() {
    if($this->request->is('post')){
      $this->Record->create();
      if($this->Record->save($this->request->data)) {
        $this->Flash->success('作品を登録しました', 'default', ['class' => ['alert', 'alert-success']]);
        return $this->redirect(['action' => 'index']);
      }
    }
  }//addここまで


  public function edit($id = null) {
    if(!$this->Record->exists($id)){
      throw new NotFoundException('作品が見つかりません');
    }

    if($this->request->is(['post','put'])) {
      if($this->Record->save($this->request->data)) {
        $this->Flash->success('作品を更新しました', 'default', ['class' => ['alert', 'alert-success']]);
        return $this->redirect(['action' => 'index']);
      }
    } else {
      $this->request->data = $this->Record->findById($id);
    }
  }//editここまで

  public function delete($id = null){
    if(!$this->Record->exists($id)){
      throw new NotFoundException('作品が見つかりません');
    }

    $this->request->allowMethod('post', 'delete');

    if($this->Record->Delete($id)){
      $this->Flash->success('作品を削除しました');
    } else {
      $this->Flash->error('作品を削除できませんでした');
    }

    return $this->redirect(['action' => 'index']);
  }//deleteここまで

}
