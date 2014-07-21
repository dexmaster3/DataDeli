<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{
	protected $table = 'users';

	protected $hidden = array('password');

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getReminderEmail()
	{
		return $this->email;
	}

    public function subUsers()
    {
        return $this->hasMany('User', 'parent_id', 'id');//->where('parent_id', 0);
    }

    public function parentUser()
    {
        return User::find($this->parent_id);
    }

    public function contact()
    {
        return $this->hasOne('Contact', 'user_id');
    }

    public function offers()
    {
        return $this->hasMany('Offer');
    }

    public function visibleFiles()
    {
        return $this->hasMany('VisibleFile');
    }

    public function postings()
    {
        return $this->hasMany('UserPost', 'user_id', 'id')->orderBy('created_at', 'ASC');
    }

    public function profilePosts()
    {
        return $this->hasMany('UserPost', 'profile_user_id', 'id')->orderBy('created_at', 'DESC');
    }
    public function gravatar()
    {
        return "http://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email)));
    }

    public function friendlyCreatedAt()
    {
        if (strtotime($this->created_at) > strtotime("-30 days")) {
            return \Carbon\Carbon::createFromTimestamp(strtotime($this->created_at))->diffForHumans();
        } else {
            return date("g:i a F j, Y", strtotime($this->created_at));
        }
    }
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}