<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
   //table name
    protected $table = "device";

    protected $guarded = [];
    protected $primaryKey = "exhibit_id";
}
