<?php

namespace App\Controllers;

use App\Models\User;

class UsersController extends Controller
{



	public function index()
	{
	
		$users = User::all();
	
		return view('users', compact('users'));

	}



	public function store()
	{

		if(filter_has_var(INPUT_POST, 'submit')):

			$name = $_POST['name'];
			
			if(! empty($name)):

				$name = $this->filterString($name);

				if(strlen($name) > 0):

					User::insert(['name' => $name]);

				endif;

			endif;

		endif;



		redirect("users");

	} 



	public function edit()
	{

		$id = $_GET['id'];

		$user = User::find($_GET['id']);

		return view('edituser', compact('user'));

	}



	public function update()
	{

		if($_SERVER['REQUEST_METHOD'] == 'POST'):

			$name = $_POST['name'];

			$age = $_POST['age'];

			if (! empty($name) AND ! empty($age)):
				
				$name = $this->filterString($name);

				$age = $this->filterInt($age);

				if(strlen($name) > 0 ):

					$user = User::update($_POST['id'], [

						'name' => $name,
						'age' => $age
					]);


				endif;

			endif;

		endif;


		redirect('users');

	}
	public function delete()
	{
		
		$id = $_GET['id'];

		User::delete($id);

		redirect("users");
	}


}