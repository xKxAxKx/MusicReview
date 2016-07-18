<?php

class RecordsController extends AppController{

  public $helpers = ['Record'];

  public function index(){
    $this->set('records', $this->Record->find('all'));
  }

  public function view($id = null) {
    if(!$this->Record->exists($id)){
      throw new NotFoundException('作品が見つかりません');
    }
    $this->set('record', $this->Record->findById($id));
  }

}

 ?>
