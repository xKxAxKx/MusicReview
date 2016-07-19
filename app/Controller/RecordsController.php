<?php

class RecordsController extends AppController{

  public function beforeFilter(){
    parent::beforeFilter();

    $this->Auth->allow('index', 'view');
  }

  public $helpers = ['Record'];

  public $components = [
    'Paginator' => ['limit' => 5, 'order' => ['artist' =>'asc']]
  ];

  public function index(){
    $this->set('records', $this->Paginator->paginate());
  }//indexここまで

  public function view($id = null) {
    if(!$this->Record->exists($id)){
      throw new NotFoundException('作品が見つかりません');
    }
    $this->set('record', $this->Record->findById($id));
  }//viewここまで

  public function add() {
    if($this->request->is('post')){
      $this->Record->create();
      if($this->Record->save($this->request->data)) {
        $this->Flash->success('作品を登録しました');
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
        $this->Flash->success('作品を更新しました');
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
