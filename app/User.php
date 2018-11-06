<?php
//use STORAGE прописать неймспейс
namespace App;

use Illuminate\Support\Facades\Storage;  //STORAGE use
use Cviebrock\EloquentSluggable\Sluggable; // Sluggable use
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;
    const IS_BANNED = 1;
    const IS_ACTIVE = 0;


    protected $fillable = [
        'name', 'email'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->save();

        return $user;
    }
    public function generatePassword($password)
    {
        if ($password != null)
        {
            $this->password = bcrypt($password);
            $this->save();
        }
    }


    public function edit($fields)
    {
       $this->fill($fields); //fields - name , email , password

       $this->save();
    }
    public function remove()
    {
        $this->removeAvatar();
        $this->delete();
    }
    public function uploadAvatar($image)
    {
        if($image == null) {
            return;
        }

        $this->removeAvatar();

        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads',$filename);
        $this->avatar = $filename;
        $this->save();
    }
    public function getImage()
    {
        if($this->avatar == null)
        {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->avatar;
    }
    public function makeAdmin()
    {
        $this->is_admin = 1;
        $this->save();
    }
    public function makeNormal()
    {
        $this->is_admin = 0;
        $this->save();
    }

    public function toggleAdmin($value)
    {
        if($value == null)
        {
            return $this->makeNormal();
        }
        return $this->makeAdmin();
    }
    public function ban()
    {
        $this->status = User::IS_BANNED;
        $this->save();
    }
    public function unban()
    {
        $this->status = User::IS_ACTIVE;
        $this->save();
    }
    public function toggleBan($value)
    {
        if($value == null)
        {
           return $this->unban();
        }
        return $this->ban();
    }
    public function removeAvatar()
    {
        if($this->avatar != null)
        {
            Storage::delete('uploads/' . $this->avatar);

        }
    }
}
