<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 6/21/14
 * Time: 12:35 PM
 */

class HomeController extends BaseController
{
    public function showRegister()
    {
        return View::make('home.register');
    }
}