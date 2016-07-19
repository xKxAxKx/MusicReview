<?php

class Listen extends AppModel{
  public $belongsTo = [
    'User' => ['className' => 'User'],
    'Record' => ['className' => 'Record']
  ];
  
}
