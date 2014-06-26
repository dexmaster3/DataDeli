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
        return $this->hasMany('PostComment', 'parent_post_id', 'id');
    }
}