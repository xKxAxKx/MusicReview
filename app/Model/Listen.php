<?php

class Listen extends AppModel{
  public $belongsTo = [
    'User' => ['className' => 'User'],
    'Record' => ['className' => 'Record']
  ];

  public function getData($recordId, $userId){
  $options = [
    'conditions' => [
      'record_id' => $recordId,
      'user_id' => $userId
    ]
  ];

  return $this->find('first', $options);
  }

}
