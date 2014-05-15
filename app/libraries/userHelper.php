<?php
/**
 * Created by PhpStorm.
 * User: dexter
 * Date: 5/14/14
 * Time: 4:03 PM
 */

class userHelper
{
    static function getAllChildrenIds($parent, &$previousChildren)
    {
        if($parent->subUsers()->count() > 0)
        {
            $children = $parent->sub_users;
            foreach($children as $child)
            {
                array_push($previousChildren, $child->id);
                //var_dump($previousChildren);
                if($child->sub_users->count() > 0){
                self::getAllChildrenIds($child, $previousChildren);
                }
            }
        }
            return $previousChildren;
    }
}