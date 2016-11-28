<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\admin\Project;
use App\model\admin\Exhibit;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::all();

        return view("admin.project.index",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return  view("admin.project.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $data = Project::create([
            "pname"   => $request->pname,
             "map"    => $request->map,
          "pdescript" => $request->pdescript,
           "user_id"  => session("uid"),
         ]);

        return redirect("admin/exhibit");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        echo "报错了 笨蛋";

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Project::find($id);

        return  view("admin.project.edit",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = Project::find($id);
         $data->pname = $request->pname;
         $data->map = $request->map;
         $data->pdescript = $request->pdescript;
         $data->save();
         return redirect("admin/exhibit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Project::destroy([$id]);

        return redirect("admin/exhibit");
    }




     /**
     * Show the project's goods 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function goods($id)
    {

        $data = Exhibit::where("project_id",$id)->get();

        $project = Project::find($id);

        return view("admin.project.goods",compact("data","project"));


    }

     /**
     * Add the new project's goods  template
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addGoods($id)
    {

        $project = Project::find($id);


        $data = Exhibit::where("project_id",0)->orderBy('id','asc')->get();


        return view("admin.project.addGoods",compact("data","project"));

    }

    /**
     * Add the new project's goods  action  method post
     *
     * @param  int  $id       project_id
     * @param  int  $exhibit  exhibit
     * @return \Illuminate\Http\Response
     */
    public function actionAddGoods($id,$exhibit)
    {

        $data = Exhibit::find($exhibit);

        $data->project_id = $id;

        $data->save();

        return  back();


    }

    /**
     * remove the new project's goods  action  method post
     *
     * @param  int  $id       project_id
     * @param  int  $exhibit  exhibit
     * @return \Illuminate\Http\Response
     */
    public function actionRemoveGoods($id,$exhibit)
    {

        $data = Exhibit::find($exhibit);
        
        $data->project_id = 0;
        
        $data->save();
        
        return  back();

    }




}
