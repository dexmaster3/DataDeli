<?php

/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 7/4/14
 * Time: 6:50 PM
 */
class MumbleController extends BaseController
{
    public function index()
    {
        return View::make('static.mumblestatus');
    }

    public function grabComments($stat)
    {
        //User Information
        foreach ($stat->m_clientlist as $client) {
            $found_entry = VentComment::where('comment', '=', $client->m_comm)->get();
            if ($client->m_comm != "" && $found_entry->isEmpty()) {
                $comment = new VentComment;
                $comment->name = $client->m_name;
                $comment->comment = $client->m_comm;
                $comment->save();
            }
        }
    }
}
