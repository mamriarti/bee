<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'content'];


    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    

    public function category(){

    	return $this->hasOne(Category::class);

    }
    public function author(){

    	return $this->hasOne(User::class);
    }
    public function tags(){

    	return $this->belongsToMany(

    		Tag::class,
    		'post_tags',
    		'post_id',
    		'tag_id'

    		);
    }

    public static function add($fields){

    	$post = new static;
    	$post->fill($fields);
    	$post->user_id = 1;
    	$post->save();
    	return $post;
    }

    public function edit($fields){

    	$this->fill($fields);
    	$this->save();
    }

    public function remove(){
    	
    	$this->delete();

    }

}
