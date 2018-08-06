<?php

return array(
    //main page routes
    '' => 'main/index',
    'index.php' => 'main/index',

    //articles routes
    'article/([0-9]+)' => 'articles/view/$1',
    'articles' => 'articles/index',
    'article/add' => 'articles/add',
    'articles/manage' => 'articles/manage',
    'articles/manage/delete/([0-9]+)' => 'articles/delete/$1',

    //category routes
    'category/([0-9]+)' => 'category/category/$1',

    //user routes
    'register' => 'user/register',
    'login' => 'user/login',
    'logout' => 'user/logout',
);
