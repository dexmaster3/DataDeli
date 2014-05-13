<?php

class UploadController extends BaseController
{
    public function upload()
    {
        $input = Input::all();

        $rules = array(
            //'file' => 'image|max:3000'
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            return Response::make($validation->errors->first(), 400);
        }

        $file = Input::file('file');

        $destinationPath = 'public/uploads/'.str_random(8);
        $filename = $file->getClientOriginalName();
//$extension =$file->getClientOriginalExtension(); //if you need extension of the file
        $uploadSuccess = Input::file('file')->move($destinationPath, $filename);
//
//        $extension = File::extension($file->name);
//        $directory = path('public').'uploads/'.sha1(time());
//        $filename = sha1(time().time()).".{$extension}";
//
//        $upload_success = Input::upload('file', $directory, $filename);

        if( $uploadSuccess ) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }

}