<?php

class Record extends AppModel{
  public $actsAs =[
    'Upload.Upload' => [
      'record_photo' => [
        'fields' => ['dir' => 'record_photo_dir'],
        'deleteOnUpdate' => true,
      ]
    ]
  ];

  public $validate = [
    //edit、addのバリデーション対応
    'title' => ['rule' => ['notBlank']],
    'artist' => ['rule' => ['notBlank']],

    //画像関係のバリデーション
    'record_photo' =>[
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
}
