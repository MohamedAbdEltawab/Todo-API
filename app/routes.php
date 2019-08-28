<?php

use App\Core\Router;


Router::get('', 'PagesController@home');
Router::get('about', 'PagesController@about');
Router::get('contact', 'PagesController@contact');
Router::post('', 'TasksController@store');


//==============  Routes Api  =============================

Router::get('api/tasks', 'TasksController@allTasks');
Router::get('api/tasks/{id}', 'TasksController@showTask');
Router::post('api/tasks/create', 'TasksController@create');
Router::post('api/tasks/update', 'TasksController@update');
Router::post('api/tasks/delete', 'TasksController@delete');




Router::get('users', 'UsersController@index');
Router::post('users', 'UsersController@store');
Router::get("deleteuser", 'UsersController@delete');
Router::get("edituser", 'UsersController@edit');
Router::post("updateuser", 'UsersController@update');
