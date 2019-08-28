<?php

namespace App\Models;

use App\Core\App;


class Model
{


	//protected $pdo;

	protected static $table;


	// protected $columns = [];


	// public function __construct($pdo)
	// {
	// 	$this->pdo = $pdo;
	// }

	public static function all()
	{

		return App::get('database')->selectAll(static::$table);
		
	}

	/**
	 *  Get All 
	 */
	// public function getAll()
	// {
		
	// 	$table = static::$table;

	// 	var_dump($table);

	// 	$statment = $this->pdo->prepare("SELECT * FROM {$table}");

	// 	$statment->execute();

	// 	return $statment->fetchAll(\PDO::FETCH_CLASS); 
		
	// }



	public static function insert($parameters)
	{

		return App::get('database')->insert(static::$table, $parameters);

	}



	public static function find($id)
	{

		return App::get('database')->find(static::$table, $id);

	}



	public static function update($id, $parameters)
	{

		return App::get('database')->update(static::$table, $id, $parameters);
	}



	public static function delete($id)
	{

		return App::get('database')->delete(static::$table, $id);
	
	}




}