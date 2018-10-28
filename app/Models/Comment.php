<?php
/**
 * Created by PhpStorm.
 * User: saeedpourali
 * Date: 10/28/18
 * Time: 11:59 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public function sub_comments(){

        return $this->hasMany('App\Models\Comment', 'parent_id', 'id');
    }



}