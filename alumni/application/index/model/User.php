<?php
/**
 * Created by PhpStorm.
 * User: sigmeta
 * Date: 2018/3/9
 * Time: 13:26
 */
namespace app\index\model;

use think\Model;

class User extends Model
{
    // 设置数据表（不含前缀）
    protected $name = 'users';

}