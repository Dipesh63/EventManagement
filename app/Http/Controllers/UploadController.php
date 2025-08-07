<?php

namespace App\Http\Controllers;

use App\Models\Videoupload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    // public function Choosefunc(){
    //     return view('Upload.choose');
    // }
    public function Choosefunc($event_id)
    {
        return view('Upload.choose', compact('event_id'));
    }








    // public function uploadvidefunc()
    // {
    //     return view('Upload.uploadvideo');
    // }
    public function uploadvidefunc($event_id)
    {
        return view('Upload.uploadvideo', compact('event_id'));
    }



    public function uploadvideofuncinDB(Request $request,$event_id)
    {
        // Validate the input
        $request->validate([
            'tittle' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            //'videofile' => 'required|mimes:mp4,avi,mkv|max:20000',  // Accepts only certain video types
        ]);

        // Create a new Videoupload instance
        $data = new Videoupload();

        // Handling file upload
        $file = $request->file('videofile');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets', $filename);

        // Storing the uploaded file and data into the database
        $data->videofile = $filename;
        $data->event_id = $event_id;  // Assign event_id
        $data->tittle = $request->tittle;
        $data->description = $request->description;
        $data->save();

        return redirect()->back()->with('success', 'Video uploaded successfully!');
    }


}
