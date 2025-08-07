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


    public function Choosefunc2($event_id)
    {
        return view('Upload.choose2', compact('event_id'));
    }








    // public function uploadvidefunc()
    // {
    //     return view('Upload.uploadvideo');
    // }
    public function uploadvidefunc($event_id)
    {
        return view('Upload.uploadvideo', compact('event_id'));
    }


    public function seevidefunc($event_id)
    {
         // $data=Videoupload::all();
        //Fetch only videos where event_id matches the provided $event_id
        $data = Videoupload::where('event_id', $event_id)->get();
        return view('Upload.seevideo',compact('data'));
        
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



    
    public function downloadfunc(Request $request, $file)
    {
        return response()->download(public_path('assets/' . $file));
    }
    
    
    
     public function viewfunc($id){
        $data=Videoupload::find($id);
        return view('viewVideo',compact('data'));
    
     }


}
