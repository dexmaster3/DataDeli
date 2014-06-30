<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 6/21/14
 * Time: 12:35 PM
 */

use Mailgun\Mailgun;

class HomeController extends BaseController
{
    public function showRegister()
    {
        return View::make('static.register');
    }

    public function sendRegister()
    {
        $userdata = Input::all();

        $rules = array(
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'password_confirmation' => 'required|same:password'
        );

        $validation = Validator::make($userdata, $rules);

        if ($validation->fails()) {
            return Redirect::to('register')
                ->withErrors($validation)
                ->withInput(Input::except('password', 'password_confirmation'));
        } else {
            $user = new User;
            $user->email = $userdata['email'];
            $user->password = Hash::make($userdata['password']);
            $user->role = 1;
            $user->activation_guid = uniqid('confirm_');
            $user->activation_mail_sent = date("Y-m-d H:i:s");
            $user->save();

            //Send mail with MailGun
            $mgClient = new Mailgun('key-2x68ecav4y0-a-bv2ed35pfuaqi672b2');
            $domain = "dexcaff.com";

            $mailResult = $mgClient->sendMessage($domain, array(
                'from' => 'Registrar <noreply@dexcaff.com>',
                'to' => $user->email,
                'subject' => 'Validate your DexCaff.com Account',
                'text' => 'Activate your DexCaff account by clicking here: ' . action('HomeController@activateAccount', array($user->id, $user->activation_guid))
            ));
            $message = array(
                'title' => 'Thank You',
                'content' => 'An email has been sent to your email with an activation link'
            );
            return View::make('home.message')->with('message', $message);
        }

    }

    public function activateAccount($id, $activate_string)
    {
        $user = User::find($id);
        if ($user->activation_guid == $activate_string) {
            $user->activated = true;
            $user->save();

            $message = array(
                'title' => 'Thank You',
                'content' => 'Your account is now active, click login to sign on with your credentials'
            );
            return View::make('home.message')->with('message', $message);
        } else {
            $message = array(
                'title' => 'Sorry',
                'content' => 'Your activation string was wrong'
            );
            return View::make('home.message')->with('message', $message);
        }
    }

    public function resendActivation($user_id)
    {
        $user = User::find($user_id);
        if (isset($user) && (time() - strtotime($user->activation_mail_sent)) > 3600) {
            $user->activation_guid = uniqid('confirm_');
            $user->activation_mail_sent = date("Y-m-d H:i:s");
            $user->save();
            //Send mail with MailGun
            $mgClient = new Mailgun('key-2x68ecav4y0-a-bv2ed35pfuaqi672b2');
            $domain = "dexcaff.com";

            $mailResult = $mgClient->sendMessage($domain, array(
                'from' => 'Registrar <noreply@dexcaff.com>',
                'to' => $user->email,
                'subject' => 'Validate your DexCaff.com Account',
                'text' => 'Activate your DexCaff account by clicking here: ' . action('HomeController@activateAccount', array($user->id, $user->activation_guid))
            ));
            $message = array(
                'title' => 'Thank You',
                'content' => 'An email has been sent to your email with an activation link'
            );
            return View::make('home.message')->with('message', $message);
        } else {
            $message = array(
                'title' => 'Hold up',
                'content' => 'An email was sent to your email with an activation link, check your email again. If you don\'t receive it in an hour, try to log in again.'
            );
            return View::make('home.message')->with('message', $message);
        }
    }

    public function contactInfo()
    {
        $user = Auth::user();

        $rules = array(
            'phone' => 'required|min:10',
            'firstName' => 'required|min:2',
            'lastName' => 'required|min:2'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return View::make('users.contact')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            $contact = new Contact;
            $contact->email = $user->email;
            $contact->firstName = Input::get('firstName');
            $contact->lastName = Input::get('lastName');
            $contact->phone = Input::get('phone');
            $user->contact()->save($contact);

            Session::flash('message', 'Your contact info has been added');
            return Redirect::to('/users');
        }
    }
}