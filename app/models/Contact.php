<?php


class Contact extends Eloquent
{
    protected $table = 'contacts';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function fullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
} 