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
        //This array used as reference in the getAllChildrenIds function -- needed to get 'subSubUsers'
        $currentUser = Auth::user();
        $childUsers = array();
        userHelper::getAllChildrenIds($currentUser, $childUsers);
        return View::make('users.index')->with('childtree', $childUsers);
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
            $user->parent_id = Auth::user()->id;
            $user->password = Hash::make(Input::get('password'));
            $user->role = 5;
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

        //We are temporarily adding gravatar/children/parsednumber to User, just to pass to this view
        $user->gravatar = Hash::make($user->email);

        $children = array();
        foreach ($user->subUsers as $subs){
            array_push($children, $subs);
        }
        if (isset($children)){
            $user->children = $children;
        }
        if(  preg_match('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', $user->contact->phone,  $matches ) )
        {
            $user->parsedNumber = $matches[1] . '-' .$matches[2] . '-' . $matches[3];
        }

        return View::make('users.show')
            ->with('user', $user)->with('pageId', $id);
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
        $user = User::find($id);
        $children = User::where('parent_id', '=', $id)->get();
        foreach($children as $item){
            $item->parent_id = Auth::user()->id;
            $item->save();
        }
        $user->delete();

        Session::flash('message', 'User has been wiped (dependant accounts transferred to you)');
        return Redirect::to('users');
    }

    public function userProfilePost()
    {
        $rules = array(
            'content' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            return Redirect::to('users/' . $id)->withErrors($validator)->withInput(Input::all());
        } else {
            $user = Auth::user();
            $pageId = Input::get('pageId');
            $posting = new UserPost;
            $posting->content = Input::get('content');
            $posting->user_id = $user->id;
            $posting->profile_user_id = $pageId;
            $user->postings()->save($posting);

            $postedToUser = User::find($pageId);
            $postedToUser->profilePosts()->save($posting);

            return Redirect::to('/users/' . $pageId);
        }
    }

    public function userProfileComment()
    {
        $parentPost = UserPost::find(Input::get('commentParent'));
        $user = Auth::user();

        $comment = new PostComment;
        $comment->content = Input::get('comment');
        $comment->user_id = $user->id;
        $comment->parent_post_id = $parentPost->id;
        $parentPost->commentPosts()->save($comment);
    }

}