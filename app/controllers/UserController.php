<?php
/**
 * Created by PhpStorm.
 * User: dexter
 * Date: 4/15/14
 * Time: 9:39 AM
 */


class UserController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $users = User::all();

        $trees = userHelper::parseUsersTree($users, 0);

        return View::make('users.index')
            ->with('users', $trees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return View::make('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('users/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $user = new User;
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->accessLevel = 5;
            $user->save();
            $contact = new Contact;
            $contact->email = Input::get('email');
            $contact->firstName = Input::get('firstName');
            $contact->lastName = Input::get('lastName');
            $contact->phone = Input::get('phone');
            $user->contact()->save($contact);

            Session::flash('message', 'Successfully created user');
            return Redirect::to('users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);

        return View::make('users.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);

        return View::make('users.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $user = User::find($id);
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            if ($user->contact->id > 0) {
                $contact = Contact::find($user->contact->id);
                $contact->email = Input::get('email');
                $contact->firstName = Input::get('firstName');
                $contact->lastName = Input::get('lastName');
                $contact->phone = Input::get('phone');
                $user->contact()->save($contact);
            } else {
                $contact = new Contact;
                $contact->email = Input::get('email');
                $contact->firstName = Input::get('firstName');
                $contact->lastName = Input::get('lastName');
                $contact->phone = Input::get('phone');
                $user->contact()->save($contact);
            }

            Session::flash('message', 'Successfully created user');
            return Redirect::to('users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();

        Session::flash('message', 'User has been wiped');
        return Redirect::to('users');
    }

}