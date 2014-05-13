<?php
/**
 * Created by PhpStorm.
 * User: dexter
 * Date: 4/15/14
 * Time: 4:28 PM
 */

class Image extends Eloquent
{
    protected $table = 'images';

    public function offer()
    {
        return $this->belongsTo('Offer');
    }
}