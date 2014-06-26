<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 6/25/14
 * Time: 6:21 PM
 */
class UserPost extends Eloquent
{
    protected $table = 'user_posts';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function postedOn()
    {
        return $this->belongsTo('User');
    }

    public function commentPosts()
    {
        return $this->hasMany('PostComment', 'parent_post_id', 'id')->orderBy('created_at', 'ASC');
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