<?php

use App\Core\App;

use App\Models\Model;




App::bind('config', require 'config.php');


App::bind('database', new QueryBuilder(
	Connection::make(App::get('config')['database'])
));


App::bind('eloquent', new Model(
	Connection::make(App::get('config')['database'])
));
