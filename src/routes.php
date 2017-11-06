<?php

$app->get('/users/list', 'App\Users\Controller\IndexController::listAction')->bind('users.list');
$app->get('/users/edit/{id}', 'App\Users\Controller\IndexController::editAction')->bind('users.edit');
$app->get('/users/new', 'App\Users\Controller\IndexController::newAction')->bind('users.new');
$app->post('/users/delete/{id}', 'App\Users\Controller\IndexController::deleteAction')->bind('users.delete');
$app->post('/users/save', 'App\Users\Controller\IndexController::saveAction')->bind('users.save');


$app->get('/ordinateur/list/{id}', 'App\Ordinateur\Controller\IndexController::listAction')->bind('ordinateur.list');
$app->get('/ordinateur/edit/{id}', 'App\Ordinateur\Controller\IndexController::editAction')->bind('ordinateur.edit');
$app->get('/ordinateur/new', 'App\Ordinateur\Controller\IndexController::newAction')->bind('ordinateur.new');
$app->post('/ordinateur/delete/{id}', 'App\Ordinateur\Controller\IndexController::deleteAction')->bind('ordinateur.delete');
$app->post('/ordinateur/save', 'App\Ordinateur\Controller\IndexController::saveAction')->bind('ordinateur.save');