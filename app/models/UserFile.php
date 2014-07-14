<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 7/13/14
 * Time: 7:24 PM
 */

class UserFile extends Eloquent
{
    protected $table = 'files';

    public function user()
    {
        return $this->belongsTo('User');
    }
}