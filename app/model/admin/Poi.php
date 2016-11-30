<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Poi extends Model
{
    protected $table = "poi";
    protected $guarded = [];



    // 一对多关联 项目表   反向代理
    public function project(){
        return  $this->belongsTo("App\model\admin\Poi","project_id","id");
    }

    // 一对多关联 项目表   反向代理
    public function exhibit(){
        return  $this->belongsTo("App\model\admin\Exhibit","exhibit_id","id");
    }


}
	