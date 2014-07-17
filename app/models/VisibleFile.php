<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 7/17/14
 * Time: 5:13 PM
 */
class VisibleFile extends Eloquent
{
    protected $table = 'visible_files';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function file()
    {
        return $this->hasOne('UserFile');
    }
}