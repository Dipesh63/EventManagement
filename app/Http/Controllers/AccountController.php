<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DeptType;
use App\Models\Event;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;;

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





    public function createEvent()
    {

        $categories = Category::orderBy('name',
            'ASC'
        )->where('status', 1)->get();
        $deptTypes = DeptType::orderBy('name', 'ASC')->where('status', 1)->get();
        $locations = Location::get(); // Removed the orderBy


        return view('front.account.event.create', [
            'categories' => $categories,
            'deptTypes' => $deptTypes,
            'locations' => $locations
        ]);
    }





    public function store(Request $request) {
        $rules = [
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'depttypes' => 'required|exists:depttypes,id',
            'vacancy' => 'required|integer|min:1',
            'location' => 'required|exists:locations,id',
            'description' => 'required|string',
            'duration' => 'required|string',
            'club_name' => 'required|string|max:255',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->passes()) {
            $event = new Event();
            $event->title = $request->title;
            $event->category_id = $request->category;
            $event->dept_type_id = $request->depttypes;
            $event->user_id = Auth::user()->id;
            $event->vacancy = $request->vacancy;
            $event->registrationfees = $request->registrationfees;
            $event->location_id = $request->location;
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




    public function createEvent2(){
        $categories = Category::orderBy('name',
        'ASC'
    )->where('status', 1)->get();
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
            'deptType' => 'required|exists:depttypes,id',
            'vacancy' => 'required|integer|min:1',
            'Loc' => 'required|exists:locations,id',
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
    


}
