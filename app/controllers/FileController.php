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

        return View::make('files.list')->with('files', $files);
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