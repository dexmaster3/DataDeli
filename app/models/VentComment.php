<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 7/10/14
 * Time: 7:42 PM
 */

class VentComment extends Eloquent
{
    protected $table = 'vent_comments';

    public function friendlyCreatedAt()
    {
        if (strtotime($this->created_at) > strtotime("-30 days")) {
            return \Carbon\Carbon::createFromTimestamp(strtotime($this->created_at))->diffForHumans();
        } else {
            return date("g:i a F j, Y", strtotime($this->created_at));
        }
    }
}