<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $fillable = ['cate_id','user_id','title','body','active'];
    protected $table = 'articles';

    public function category(){
        return $this->belongsTo('App\Category','cate_id','id');
    }

    public function user(){
        return $this->belongsTo('App\user','user_id','id');
    }    

}
