<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "project";
    protected $guarded = [];


    public function exhibit(){
    	return $this->hasMany("App\model\admin\Exhibit","project_id","id");
    }


     public function poi(){
    	return $this->hasMany("App\model\admin\Poi","project_id","id");
    }


}
