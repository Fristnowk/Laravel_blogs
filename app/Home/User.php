<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //定义模型关联数据表（一个模型只操作一张表）
    protected $table='users';
    //定义禁止操作的时间
    public $timestamps=false;
    //设置允许写入的数据字段
    protected $fillable=['account','password'];
}
