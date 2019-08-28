<?php

namespace App\Controllers;

use App\Models\Task;
use App\Core\App;

class PagesController extends Controller
{

	public function home()
	{

		$tasks = Task::all();

		
		return view('index', ['tasks' => $tasks]);

	}


	public function about()
	{
		
		return view('about');

	}


	public function contact()
	{
		return view('contact');

	}
}