<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   const IS_ALLOW = 1;
   const IS_DISALLOW = 0;


    public function post(){
    	return $this->hasOne(Post::class);
    }

    public function author(){
    	return $this->hasOne(User::class);
    }

    public function allow(){
    	$this->status = Comment::IS_ALLOW;
    	$this->save();

    }

    public function disallow(){
    	$this->status = Comment::IS_DISALLOW;
    	$this->save();
    }

     public function toogleStatus(){
     	if($this->status = Comment::IS_DISALLOW;){
     		return $this->allow();
     	}
     	return $this->disallow();

     }
     public function remove(){
     	$this->delete();
     }
}
