<?php
/**
 * esayWeChat的配置
 */
return [
    'config' => [
        'app_id' => env('WX_APP_ID'),
        'secret' => env('WX_SECRET'),
    
        // 下面为可选项
        // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
        'response_type' => 'array',
    
        // 'log' => [
        //     'level' => 'debug',
        //     'file' => __DIR__.'/wechat.log',
        // ],
    ],
    
];