<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    const IS_ADMIN = 1;
    const IS_NORMAL = 0;
    const IS_BANNED = 1;
    const ACTIVE = 0;


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts(){
        return $this->hasMany(Post::class);

    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public static function add($fields){
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();

        return $user;

    }
     public function edit($fields){
        $this->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();


     }

     public function remove(){
        Storage::delete('uploads/' . $this->image);
        $this->delete();
     }

     public function uploadAvatar($image){

        if($image == null){return;}
        if($this->avatar =! null)
        {
            Storage::delete('uploads/' . $this->avatar);
        }


        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->avatar = $filename;
        $this->save();

    }
    public function getAvatar(){

        if($this->avatar == null){
            
            return '/uploads/avatar.png';

        }

        return '/uploads/'. $this->avatar;
    }

    public function makeAdmin(){
        $this->is_admin = User::IS_ADMIN;
        $this->save();

    }

    public function makeNormal(){
        $this->is_admin = User::IS_NORMAL;
        $this->save();
    }

    public function toogleAdmin($value){
        if($value == null){
            return $this->makeNormal();

        }
        return $this->makeAdmin();
    }

    public function ban(){
        $this->status = User::IS_BANNED;
        $this->save();
    }

    public function unban(){
        $this->status = User::ACTIVE;
        $this->save();
    }

    public function toogleBan($value){
        if($value == null){
            return $this->unban();
        }
        return $this->ban();
    }

}
