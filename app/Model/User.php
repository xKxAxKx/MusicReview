<?php

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{
  public $actsAs =[
    'Upload.Upload' => [
      'icon_photo' => [
        'fields' => ['dir' => 'icon_photo_dir'],
        'deleteOnUpdate' => true,
      ]
    ]
  ];

  public $hasMany =['Listen' => ['className' => 'Listen']];

  public $validate =[
    'email' => [
      'required' => [
        'rule' => 'notBlank',
        'message' => 'メールアドレスを入力してください'
      ],
      'validEmail' => [
        'rule' => 'email',
        'message' => '正しいメールアドレスを入力してください'
      ],
      'emailExists' => [
        'rule' => ['isUnique', 'email'],
        'message' => '入力されたメールアドレスは既に登録されています'
      ],
    ],

    'password' => [
      'required' => [
        'rule' => 'notBlank',
        'message' => 'パスワードを入力してください'
      ],
      // バリデーションにメソッドを指定
      'match' => [
        'rule' => 'passwordConfirm',
        'message' => 'パスワードが一致していません'
      ],
    ],

    'password_confirm' => [
      'required' => [
        'rule' => 'notBlank',
        'message' => 'パスワード(確認)を入力してください'
      ],
    ],

    //ログイン時のバリデーション
    'password_current' =>[
      'required' => [
        'rule' => 'notBlank',
        'message' => 'パスワードが入力されていません'
      ],
      'match' => [
        'rule' => 'checkCurrentPassword',
        'message' => 'パスワードが一致していません'
      ]
    ],

    //画像関係のバリデーション
    'icon_photo' =>[
      'UnderPhpSizeLimit' => [
        'allowEmpty' => true,
        'rule' => 'isUnderPhpSizeLimit',
        'message' => 'アップロード可能なファイルサイズを超えています'
      ],
      'BelowMaxSize' => [
        'rule' => ['isBelowMaxSize', 5242880],
        'message' => 'アップロード可能なファイルサイズを超えています'
      ],
      'CompletedUpload' => [
        'rule' => 'isCompletedUpload',
        'message' => 'ファイルが正常にアップロードされませんでした'
      ],
      'ValidMimeType' => [
        'rule' => ['isValidMimeType', ['image/jpeg', 'image/png'], false],
        'message' => 'ファイルが JPEG でも PNG でもありません'
      ],
      'ValidExtension' => [
        'rule' => ['isValidExtension', ['jpeg', 'jpg', 'png'], false],
        'message' => 'ファイルの拡張子が JPEG でも PNG でもありません'
      ]
    ]
  ];


  public function passwordConfirm($check) {
    // $check は [Keyに'password' => '入力された値']
    if ($check['password'] === $this->data['User']['password_confirm']) {
      return true;
    }
    return false;
  }

  public function beforeSave($options = [ ]){
  //パスワードをハッシュ化する
    if(isset($this->data['User']['password'])){
      $passwordHasher = new BlowfishPasswordHasher();
      $this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
    }
    return true;
  }

  public function checkCurrentPassword($check){
    $password = array_values($check)[0];

    $user = $this->findById($this->data['User']['id']);

    $passwordHasher = new BlowfishPasswordHasher();

    if($passwordHasher->check($password, $user['User']['password'])){
      return true;
    }
    return false;
  }


}
