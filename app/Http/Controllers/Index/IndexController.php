<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\admin\Poi;
use App\model\admin\Project;
use App\model\admin\Exhibit;

class IndexController extends BaseController
{

	  public  function index()
	  {
	  	
	  	$project = Project::find(12);

	  	$data =  $project->poi()->get();


	  	return   view("index.index.index",compact("data",'project')) ;
	  }

	  public  function  info(Request $request)
	  {
	  	

	  	$id = $request->input("exhibit");

	  	$exhibit = Exhibit::find($id);

	  	$resource = $exhibit->resource()->orderBy("type","asc")->get();
	  	$resource['title'] = $exhibit->title;

	  	return response()->json($resource);

	  }


   



}
