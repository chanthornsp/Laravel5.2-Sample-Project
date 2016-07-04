<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class NewsData extends Model
{
    protected $fillable = ['title','body','active','cate_id','user_id'];

    protected $table = 'newsdata';



    public function scopeData($query){
    	if (Auth::check()) {
    		return $query->orderBy('id','desc');    		
    	}else{
    		return $query->where('active',1)->orderBy('id','desc');
    	}
    }


    public function category(){
        return $this->belongsTo('App\Category','cate_id','id');
    }

    public function user(){
        return $this->belongsTo('App\user','user_id','id');
    }


}
