<?php

namespace App\Controllers;

use App\Models\Task;
// use App\Core\Input;

class TasksController extends Controller
{
	/**
	 *  Store Tasks
	 */
	public function store()
	{

	 	if(self::exists()){
	 		
	 		$this->validate($_POST, [

	 			'description' => 'required|min:6'
	 		]);
	 	}

	 	if ($this->passed) {
	 		
	 		$description = self::filterString(self::get('description'));

	 		Task::insert(['description' => $description]);
	 	
	 		redirect('');

	 	}else{
			
			$errors = $this->errors();
	 	}


			
		view('index', ['errors' => $errors]);

	}

	/**
	 *  Get All API tasks
	 */
	public function allTasks()
	{

		header("Access-Control-Allow-Origin: *");
		
		header("Content-Type: application/json; charset=UTF-8");
		
		$tasks['data'] = Task::all();

		if (count($tasks['data'])) {
			
			echo  json_encode($tasks, JSON_PRETTY_PRINT);
		
		}else{
		
			echo json_encode([
		
				"message" => "Tasks Not Found"
			]);
		}
		
	}

	/**
	 *  Show API Task By Id
	 */

	public function showTask($vars)
	{
	
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: access");
		header("Access-Control-Allow-Methods: GET");
		header("Access-Control-Allow-Credentials: true");
		header('Content-Type: application/json');
		
		$id = (int)$vars['id'];
		
		$task = Task::find($id);
		
		// check if id > 0 and task id is exist
		if ( ($id > 0) AND ($task != false) ) {
		
			echo json_encode($task);

		} else { 

			echo json_encode([

				"message" => "Task Not Found"

			]);
		}

	}

	/**
	 *  Create API Task
	 */
	public function create()
	{
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Allow-Methods: POST");
		header("Access-Control-Max-Age: 3600");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

		// get posted data
		$data = json_decode(file_get_contents("php://input"));

		if (! empty($data) ) {

	 		$description = self::filterString($data->description);
		
			$task = Task::insert(['description' => $description]);
	 	
	 		if ( $task ) {
	 			
	 			// http_response_code(201);
        		echo json_encode(array("message" => "Task was created."));

	 		}else{
 
        		// tell the user
        		http_response_code(501);
        		echo json_encode(array("message" => "Unable to create task."));
    		}
		}
	 	
	 		// redirect('');
	}


	/**
	 *  Update Tasks By Id
	 */
	public function update($vars)
	{
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Allow-Methods: POST");
		header("Access-Control-Max-Age: 3600");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
		
		// $id = (int) $vars['id'];

		// get posted data
		$data = json_decode(file_get_contents("php://input"));

		$paramters = [];

		$paramters['id'] = $data->id;

		$paramters['description'] = $data->description;

		$paramters['completed'] =  $data->completed;

		$paramters['created_at'] = $data->created_at;

		if (Task::update($paramters['id'], $paramters)) {
			
			// set response code - 200 ok
			http_response_code(201);
			// tell the user
        	echo json_encode(array("message" => "Task was updated."));
		}else{

			// set response code - 503 service unavailable
			http_response_code(501);
			// tell the user
        	echo json_encode(array("message" => "Unable to update task."));
		}
	}


	/**
	 *  Delete Task By Id
	 */
	public function delete()
	{
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Allow-Methods: POST");
		header("Access-Control-Max-Age: 3600");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

		// get posted data
		$data = json_decode(file_get_contents("php://input"));

		$id = $data->id;


		if (Task::delete($id)) {
			
			// set response code - 200 ok
			http_response_code(201);
			// tell the user
        	echo json_encode(array("message" => "Task was deleted."));

		}else{

			// set response code - 503 service unavailable
			http_response_code(501);
			// tell the user
        	echo json_encode(array("message" => "Unable to delete task."));
		}
	}


}