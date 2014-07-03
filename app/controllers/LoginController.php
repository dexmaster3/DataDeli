<?php

class LoginController extends BaseController {

    public function showLogin()
    {
        $user = Auth::user();
        if (isset($user) && $user->activated) {
            return Redirect::to('/users/profile');
        } else {
            Auth::logout();
            return View::make('static.login');
        }
    }

    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails())
        {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }
        else
        {

            // create our user data for the authentication
            $userdata = array(
                'email' 	=> Input::get('email'),
                'password' 	=> Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {
                $user = Auth::user();
                if ($user->activated) {
                    return Redirect::to('/users/profile');
                } else {
                    $message = array(
                        'title' => 'Hold on!',
                        'content' => 'Please activate your account first by following our email link <br/> If you need another click <a href=' . action("HomeController@resendActivation", $user->id) . '>Here</a>'
                    );
                    return View::make('home.message')->with('message', $message);
                }

            } else {

                Session::flash('message', 'Incorrect Email/Password');
                return Redirect::to('login')->withInput(Input::except('password'));

            }
        }
    }

    public function doLogout()
    {
        Auth::logout();
        Session::flash('message', 'You have been logged out');
        return Redirect::to('login');
    }
}