<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\admin\Poi;
use App\model\admin\Project;

class IndexController extends BaseController
{

	  public  function index()
	  {


	  	$project = Project::find(12);

	  	$data =  $project->poi()->get();


	  	return   view("index.index.index",compact("data",'project')) ;
	  }
   



}
