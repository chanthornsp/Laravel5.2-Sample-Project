<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','active'];

    protected $table = 'categories';

    public function article(){
        return $this->hasMany('App\Article','cate_id');
    }
     public function newsData(){
        return $this->hasMany('App\NewsData','cate_id');
    }
}
