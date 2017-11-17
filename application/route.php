<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    'home/' => 'home/Index/index',
    'logout/' => 'home/Index/logout',
    'showMyArticle' => 'home/Index/showMyArticle',
    'addMyArticle'  => 'home/Index/addMyArticle',
    'editMyArticle/:id$' => 'home/Index/editMyArticle',
    'deleteMyArticle/:id$' => 'home/Index/deleteMyArticle',
    'forum/'  => 'home/Index/forum',
    'addComment/:mid' => 'home/Index/addComment',

    'admin_user_add/'  => 'admin/Index/admin_user_add',
    'admin_user_change/[:mode]/[:uid]'  => 'admin/Index/admin_user_change',

    'admin_message_hide/[:mode]/[:mid]' => 'admin/Index/admin_message_hide',
    'admin_message_delete/[:mid]' => 'admin/Index/admin_message_delete',
    'admin_message_top/[:mode]/[:mid]' => 'admin/Index/admin_message_top',

    'admin_logout/'   => 'admin/Index/admin_logout',

];
