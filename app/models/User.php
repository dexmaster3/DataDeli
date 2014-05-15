<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

    public function subUsers()
    {
        return $this->hasMany('User', 'parent_id');//->where('parent_id', 0);
    }

    public function parentUser()
    {
        return User::find($this->parent_id);
    }

    public function role()
    {
        return $this->role;
    }

    public function contact()
    {
        return $this->hasOne('Contact', 'user_id');
    }

    public function offers()
    {
        return $this->hasMany('Offer');
    }

    public function delete()
    {
        $this->contact()->delete();
        // could be Contact::where('user_id', $this->id)->delete()

        $this->offers()->delete();

        return parent::delete();
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