<?php
/**
 * Created by PhpStorm.
 * User: dexter
 * Date: 5/14/14
 * Time: 4:03 PM
 */

class userHelper
{
    static function parseUsersTree($users, $count)
    {

        foreach($users as $user)
        {
            echo str_repeat("-", $count) . $user->email . '<br/>';
            self::parseUsersTree($user->sub_users, $user->sub_users->count());
        }
    }
}