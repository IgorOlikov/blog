<?php

namespace App;

use App\Comment;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string|null $password
 * @property int $is_admin
 * @property int $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $avatar
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Post[] $posts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{

    use Notifiable;



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

    public function toggleAdmin()
    {
        if($this->is_admin == 1)
        {
            return $this->makeNormal();
        }
        return $this->makeAdmin();
    }
    public function ban()
    {
        $this->status = 1;
        $this->save();
    }
    public function unban()
    {
        $this->status = 0;
        $this->save();
    }
    public function toggleBan()
    {
        if($this->status == 1)
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
