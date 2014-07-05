<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 7/4/14
 * Time: 6:50 PM
 */

class VentriloController extends BaseController
{
    public function venttest()
    {
        return View::make('static.ventrilostatus');
    }
}