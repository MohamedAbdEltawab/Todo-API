<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';
require 'core/helper.php';


use App\Core\{Router, Request, App};


Router::load('app/routes.php')
	
	->direct(Request::uri(), Request::Method());

// var_dump($_SERVER['REQUEST_URI']);

	 