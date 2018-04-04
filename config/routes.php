<?php
return array(
  'article/([0-9]+)' => 'article/view/$1',
  'category/([0-9]+)/page-([0-9]+)' => 'category/view/$1/$2',
  'category/([0-9]+)' => 'category/view/$1',
  'category' => 'category/index',
  'user/register' => 'user/register',
  'user/login' => 'user/login',
  'user/logout' => 'user/logout',
  'cabinet/edit' => 'cabinet/edit',
  'cabinet' => 'cabinet/index',
  'admin/article/delete/([0-9]+)' => 'adminArticle/delete/$1',
  'admin/article/update/([0-9]+)' => 'adminArticle/update/$1',
  'admin/article/create' => 'adminArticle/create',
  'admin/articles' => 'adminArticle/index',
  'admin' => 'admin/index',
  '' => 'site/index',
);