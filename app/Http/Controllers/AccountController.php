<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\EventApplication;
use App\Models\DeptType;
use App\Models\Event;
use App\Models\Order;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;


class AccountController extends Controller
{
    //This method work for user registration
    public function registration(){
        return view('front.account.registration');

    }

     // This method will save a user
     public function processRegistration(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        if ($validator->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('success','You have registerd successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    //This method work for user login
    public function login(){
        return view('front.account.login');
        
    }




    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }




    public function authenticateUser(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
 
        if ($validator->passes()) {
            
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('account.profile');
            } else {
                return redirect()->route('account.login')->with('error','Either Email/Password is incorrect');
            }

        } else {
            return redirect()->route('account.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }

    }

    public function profile(){
       $id = Auth::user()->id; 
       $user = User::where('id',$id)->first();


        return view('front.account.profile',['user' => $user]);
        
    }








    public function createEvent2(){
        $categories = Category::orderBy('name','ASC')->where('status', 1)->get();
    $deptTypes = DeptType::orderBy('name', 'ASC')->where('status', 1)->get();
    $locations = Location::get(); // Removed the orderBy


    return view('front.account.event.create2', [
        'categories' => $categories,
        'deptTypes' => $deptTypes,
        'locations' => $locations
    ]);
        
    }





    public function store2(Request $request) {
        $rules = [
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'deptType' => 'required|exists:dept_types,id',
            'vacancy' => 'required|integer|min:1',
            'Loc' => 'required|exists:location,id',
            'description' => 'required|string',
            'duration' => 'required|string',
            'club_name' => 'required|string|max:255',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->passes()) {
            $event = new Event();
            $event->title = $request->title;
            $event->category_id = $request->category;
            $event->dept_type_id = $request->deptType;
            $event->user_id = Auth::user()->id;
            $event->vacancy = $request->vacancy;
            $event->registrationfees = $request->registrationfees;
            $event->location_id = $request->Loc;
            $event->description = $request->description;
            $event->benefits = $request->benefits;
            $event->responsibility = $request->responsibility;
            $event->qualifications = $request->qualifications;
            $event->keywords = $request->keywords;
            $event->duration = $request->duration;
            $event->club_name = $request->club_name;
            $event->club_location = $request->club_location;
            $event->club_website = $request->website;
            $event->save();
    
            session()->flash('success', 'Event added successfully.');
    
            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    

    public function myEvents(){

        $events = Event::where('user_id',Auth::user()->id)->with('deptType')->paginate(1);

       // dd($events);

        return view('front.account.event.my-event',[
            'events' => $events
        ]);
    }


    public function deleteEvent(Request $request)
    {
        $event = Event::where([
            'user_id'=>Auth::user()->id,
            'id'=>$request->eventId
        ])->first();

        if($event==null){
            session()->flash('error','Event not found');
            return response()->json()([
                'status'=>true
            ]);
        }

        Event::where('id',$request->eventId)->delete();
        session()->flash('success','Event deleted successfully');
        return response()->json([
            'status' => true
        ]);
    }


    public function myEventApplication(){
       $eventApplications = EventApplication::where('admitted_user_id',Auth::user()->id)->with('event','event.deptType')->paginate(10);
        // dd($events);
        return view('front.account.event.my-event-applications',[
            'eventApplications' => $eventApplications
        ]);
    }
   









    public function cancelEvents(Request $request)
    {
        $eventApplication = EventApplication::where(['id'=>$request->id , 'admitted_user_id' => Auth::user()->id])->first();

        if($eventApplication==null)
        {
            session()->flash('error','Event Application not found');
            return response()->json([
                'status'=>false,
            ]);
        }
        EventApplication::find($request->id)->delete();
        session()->flash('success','Event cancel successfully');
            return response()->json([
                'status'=>true,
            ]);
    }

    //Google Auth

    public function dashboardnew(){
        $id = Auth::user()->id; 
       $user = User::where('id',$id)->first();


        return view('front.account.profile',['user' => $user]);
        
    }


    public function dashboardnew2(){
        return view('front.account.login');
    }









    // public function showApplicants()
    // {
    //     // Get the event applications for the events organized by the authenticated user, eager load the user
    // $applicants = EventApplication::where('organizer_user_id', Auth::id())->get();  // Execute the query

    // //dd($applicants);  // Dump and die to see the data

        
    //     // Pass the applicants to the view
    //     return view('front.account.event.applicants', compact('applicants'));
    // }

    public function showApplicants()
{
    // Get the event applications for the events organized by the authenticated user
    $applicants = EventApplication::where('organizer_user_id', Auth::id())->get(); // Execute the query

    // For each applicant, determine the payment status
    foreach ($applicants as $applicant) {
        $order = Order::where('event_id', $applicant->event_id)
                      ->where('payer_id', $applicant->admitted_user_id)
                      ->first();

        // Set payment status based on whether an order exists
        $applicant->payment_status = $order ? 'Paid' : 'Unpaid';
    }

    // Pass the applicants to the view
    return view('front.account.event.applicants', compact('applicants'));
}




public function updateProfilePicture(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Get the authenticated user
    $user = Auth::user();

    // Delete the old profile picture if it exists
    if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
        unlink(public_path($user->profile_picture));
    }

    // Store the new profile picture locally
    $file = $request->file('profile_picture');
    $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
    $filePath = 'assets/profile_pictures/' . $fileName;

    // Save the file to the public directory
    $file->move(public_path('assets/profile_pictures'), $fileName);

    // Update the user's profile picture path in the database
    $user->profile_picture = $filePath;
    $user->save();

    return back()->with('success', 'Profile picture updated successfully.');
}

    







}








