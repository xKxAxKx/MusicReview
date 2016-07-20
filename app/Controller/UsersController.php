<?php

class UsersController extends AppController{

  public $helpers = ['User'];

  public $uses = ['User', 'Listen', 'Record'];

  public function beforeFilter(){
    parent::beforeFilter();

    $this->Auth->allow('signup');
  }

  public function view($id = null){
    if(!$this->User->exists($id)){
      throw new NotFoundException('登録されていないユーザです');
    } else{
      $message = 'まだ何も聴いていません';
      if($this->Listen->findByuser_id($id)){
        $message = '0';
      }
      $this->set('message', $message);
      $this->set('user', $this->User->findById($id));
    }


  }

  public function login(){
    if($this->Auth->user()){
      return $this->redirect($this->Auth->redirectUrl());
    }

    if($this->request->is('post')){
      if($this->Auth->login()){
        $this->redirect($this->Auth->redirectUrl());
      }
      $this->Flash->error('メールアドレスかパスワードが違います');
    }
  }

  public function signup(){
    if($this->Auth->user()){
      return $this->redirect($this->Auth->redirectUrl());
    }

    if($this->request->is('post')){
      $this->User->create();
      if($this->User->save($this->request->data)){
        $this->Flash->success('ユーザを登録しました');
        return $this->redirect(['action' => 'login']);
      }
    }
  }

  public function logout(){
    $this->redirect($this->Auth->logout());
  }

  public function edit() {
    if($this->request->is(['post', 'put'])){

      if($this->User->save($this->request->data)) {
        $this->Flash->success('会員情報を変更しました');

        $user = $this->User->find('first',
          ['fields' => ['id', 'email', 'name', 'password', 'icon_photo', 'icon_photo_dir'],
          'conditions' => ['id' => $this->Auth->user('id')]]);
        $this->Auth->login($user['User']);

        return $this->redirect($this->Auth->redirectUrl());
      }
    } else {
      $this->request->data = $this->User->findById($this->Auth->user('id'));
    }
  }

  public function delete($id = null) {
    $this->request->allowMethod('post', 'delete');

    if($this->User->Delete($id)){
      $this->Flash->success('ユーザを削除しました');
      $this->Auth->logout($user['User']);
    } else {
      $this->Flash->error('ユーザを削除できませんでした');
    }

    return $this->redirect($this->Auth->redirectUrl());
  }

}
