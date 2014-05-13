<?php
/**
 * Created by PhpStorm.
 * User: dexter
 * Date: 4/15/14
 * Time: 3:43 PM
 */

class Offer extends Eloquent
{
    protected $table = 'offers';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function images()
    {
        return $this->hasMany('Image');
    }
}