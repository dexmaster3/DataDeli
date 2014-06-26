<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 6/25/14
 * Time: 8:01 PM
 */
class PostComment extends Eloquent
{
    protected $table = 'post_comments';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function postedOn()
    {
        return $this->belongsTo('UserPost');
    }

    public function friendlyCreatedAt()
    {
        if (strtotime($this->created_at) > strtotime("-30 days")) {
            return \Carbon\Carbon::createFromTimestamp(strtotime($this->created_at))->diffForHumans();
        } else {
            return date("g:i a F j, Y", strtotime($this->created_at));
        }
    }
}