<?php

return array(
    //main page routes
    '' => 'main/index',
    'page-([0-9]+)' => 'main/index/$1',
    'index.php/page-([0-9]+)' => 'main/index/$1',

    //articles routes
    'article/([0-9]+)' => 'articles/view/$1',
    'articles' => 'articles/index',
    'article/add' => 'articles/add',
    'articles/manage' => 'articles/manage',
    'articles/manage/delete/([0-9]+)' => 'articles/delete/$1',
    'articles/manage/edit/([0-9]+)' => 'articles/edit/$1',

    //comment routes
    'article/comment' => 'comment/add',

    //category routes
    'category/([0-9]+)' => 'category/category/$1',
    'category/([0-9]+)/page-([0-9]+)' => 'category/category/$1/$2',

    //user routes
    'register' => 'user/register',
    'login' => 'user/login',
    'logout' => 'user/logout',

    //admin
    'admin/main' => 'admin/index',
    'admin/articles' => 'admin/articles',
    'admin/articles/page-([0-9]+)' => 'admin/articles/$1',
    'admin/categories' => 'admin/categories/',
    'admin/categories/page-([0-9]+)' => 'admin/categories/$1',
    'admin/categories/add' => 'category/add',
    'admin/categories/delete/([0-9]+)' => 'category/delete/$1',
    'admin/categories/edit/([0-9]+)' => 'category/edit/$1',
    'admin/users' => 'admin/users',
    'admin/users/page-([0-9]+)' => 'admin/users/$1',
    'admin/users/edit/([0-9]+)' => 'user/edit/$1',
    'admin/users/deactivate/([0-9]+)' => 'user/deactivate/$1',
    'admin/comments/delete/([0-9]+)/([0-9]+)' => 'comment/delete/$1/$2',
);
