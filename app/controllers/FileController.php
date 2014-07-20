<?php

/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 7/13/14
 * Time: 6:10 PM
 */
class FileController extends BaseController
{
    public function index()
    {
        return View::make('files/index');
    }

    public function listing()
    {
        $user = Auth::user();

        $files = UserFile::where('user_id', '=', $user->id)->get();
        $users = User::all();

        return View::make('files.list')->with('files', $files)->with('users', $users);
    }

    public function listVisibility($fileId)
    {
        $visible = VisibleFile::where("file_id", "=", $fileId)->get();
        $visible_users_ids = array();
        foreach ($visible as $uservis) {
            array_push($visible_users_ids, $uservis->user_id);
        }

        $users = User::all();

        return Response::json(array("visible" => $visible_users_ids, "users" => $users->toArray()), 200);
    }

    public function setVisibility()
    {
        $current_user = Auth::user();
        $data = Input::json("data");
        $file_id = Input::json('fileId');

        $file = UserFile::find($file_id);
        if ($current_user->id == $file->user->id) {
            $file_old_visibility = VisibleFile::where("file_id", "=", $file_id)->delete();

            foreach ($data as $user_id) {
                $visible_file = new VisibleFile;
                $visible_file->user_id = $user_id;
                $visible_file->file_id = $file_id;
                $visible_file->save();
            }

            return Response::json('success', 200);
        }
        return Response::json('wrong user', 400);
    }

    public function setPublic()
    {
        $current_user = Auth::user();
        $data = Input::json("data");
        $file_id = Input::json('fileId');

        $file = UserFile::find($file_id);
        if ($current_user->id == $file->user->id) {

            $file->public = $data;
            $file->save();

            return Response::json('success', 200);
        }
        return Response::json('wrong user', 400);
    }

    public function upload()
    {
        $input = Input::all();
        $rules = array(
            'file', 'image|max:3000'
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Response::make($validation->errors->first(), 400);
        }

        $file = Input::file('file');

        $extension = $file->getClientOriginalExtension();
        $random_directory = sha1(time());
        $local_directory = public_path('uploads/') . $random_directory;
        $web_directory = "/uploads/$random_directory";
        $filename = sha1(time() . time()) . ".$extension";

        $upload_success = $file->move($local_directory, $filename);

        if ($upload_success) {
            $file_entry = new UserFile;
            $file_entry->user_id = Auth::user()->id;
            $file_entry->location = "$web_directory/$filename";
            $file_entry->filename = $file->getClientOriginalName();
            $file_entry->save();
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }
}