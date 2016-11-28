<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Exhibit extends Model
{
    protected  $table = "exhibit";

    protected $guarded = [];



    // 一对一关联 设备表
    public function  device(){

        return  $this->hasOne("App\model\admin\Device","exhibit_id","id");
    }


     // 一对多关联 资源表
    public function resource(){

        return  $this->hasMany("App\model\admin\Resource","exhibit_id","id");
    }

     // 一对多关联 项目表   反向代理
    public function project(){

        return  $this->belongsTo("App\model\admin\Project","project_id","id");
    }

     // 一对一关联 点位表
    public function poi(){

        return  $this->hasOne("App\model\admin\Poi","exhibit_id","id");
    }

}
