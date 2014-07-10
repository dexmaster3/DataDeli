<?php

/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 7/4/14
 * Time: 6:50 PM
 */
class ListingController extends BaseController
{
    public function search($topic)
    {
        return Redirect::to("http://bizsavingsguide.com/searchresults/?cx=partner-pub-1940693989370178%3A9807546235&cof=FORID%3A10&ie=UTF-8&q=$topic");
    }
}