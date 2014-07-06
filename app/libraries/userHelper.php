<?php
/**
 * Created by PhpStorm.
 * User: dexter
 * Date: 5/14/14
 * Time: 4:03 PM
 */

class userHelper
{
    function getAllChildrenIds($parent, &$previousChildren, $indent = 0)
    {
        if($parent->subUsers->count() > 0)
        {
            $children = $parent->subUsers;
            foreach($children as $child)
            {
                $child->indent = $indent;
                array_push($previousChildren, $child);
                //var_dump($previousChildren);
                if($child->subUsers->count() > 0){
                self::getAllChildrenIds($child, $previousChildren, $indent + 1);
                }
            }
        }
        return $previousChildren;
    }
}