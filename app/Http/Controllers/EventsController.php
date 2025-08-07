<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\DeptType;
use App\Models\Event;
use App\Models\EventApplication;
use App\Models\Location;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('status', 1)->get();
        $deptTypes = DeptType::where('status', 1)->get();
        $events = Event::where('status', 1);

        if (!empty($request->keyword)) {
            // $events = $events->orWhere('title','like','%'.$request->keyword.'%');
            // $events = $events->orWhere('keywords','like','%'.$request->keyword.'%');

            $events = $events->where(function ($query) use ($request) {
                $query->orWhere('title', 'like', '%' . $request->keyword . '%');
                $query->orWhere('keywords', 'like', '%' . $request->keyword . '%');
            });
        }


        // if (!empty($request->club_location)) {
        //     $events = $events->where('club_location', $request->club_location);
        // }

        if (!empty($request->category)) {
            $events = $events->where('category_id', $request->category);
        }

        $deptTypeArray = [];
        if (!empty($request->deptType)) {
            $deptTypeArray = explode(',', $request->deptType);

            $events = $events->whereIn('dept_type_id', $deptTypeArray);
        }

        if (!empty($request->duration)) {
            $events = $events->where('duration', $request->duration);
        }

        // $events = $events->with('deptType')->orderBy('created_at','DESC')->paginate(9);

        $events = $events->with(['deptType', 'category']);

        if ($request->sort == '0') {
            $events = $events->orderBy('created_at', 'ASC');
        } else {
            $events = $events->orderBy('created_at', 'DESC');
        }


        $events = $events->paginate(9);

        return view('front.events', [

            'categories' => $categories,
            'deptTypes' => $deptTypes,
            'events' => $events,
            'deptTypeArray' => $deptTypeArray,
        ]);
    }






    public function detail($id)
    {
        // $event = Event::where([
        //     'id' => $id,
        //     'status' => 1
        // ])->with(['deptType', 'category', 'location'])->first();
        // return view('front.eventDetail', ['event' => $event]);



        // Fetch the event details
        $event = Event::where([
            'id' => $id,
            'status' => 1
        ])->with(['deptType', 'category', 'location'])->first();


        // Check if the logged-in user has already applied for the event
        $hasApplied = false;
        if (Auth::check()) {
            $hasApplied = EventApplication::where('admitted_user_id', Auth::id())
                ->where('event_id', $id)
                ->exists();
        }



        // Check if the logged-in user has already paid for the event
        $hasPaid = false;
        if (Auth::check()) {
            $hasPaid = Order::where('payer_id', Auth::id())
                ->where('event_id', $id)
                ->exists();
        }




// Check if the logged-in user is the creater of that event or not
$hasCreated = false;
if (Auth::check()) {
    $hasCreated = Event::where('user_id', Auth::id())
        ->where('id', $id)
        ->exists();
}



        // Pass the necessary data to the Blade template
        return view('front.eventDetail', [
            'event' => $event,
            'hasApplied' => $hasApplied,
            'hasPaid' => $hasPaid,
            'hasCreated' => $hasCreated,
        ]);



        
    }








    public function applyevent2(Request $request)
    {
        $id = $request->id;
        $events = Event::find($id);

        // Check if the event exists
        if ($events === null) {
            return response()->json([
                'status' => 'error',
                'message' => 'Event does not exist'
            ]);
        }

        // Prevent applying to own event
        $organizer = $events->user_id;
        if ($organizer == Auth::id()) {
            return response()->json([
                'status' => 'error',
                'message' => 'You cannot apply to your own event'
            ]);
        }




        // Create new EventApplication record

        // Just output the data instead of saving it
        // $applicationData = [
        //     'event_id' => $id,
        //     'admitted_user_id' => Auth::id(),
        //     'organizer_user_id' =>  $events->user_id,
        //     'applied_date' => now(),
        // ];

        // Use dd() to dump and die (stop execution)
        //dd($applicationData);




        $applications = new EventApplication();
        $applications->event_id = $id;
        $applications->admitted_user_id = Auth::id();
        $applications->organizer_user_id = $events->user_id;
        $applications->applied_date = now();
        $applications->save();


        // Redirect to the event page (adjust the route if needed)
        // return redirect()->route('events')->with('success', 'You have successfully applied');

        return response()->json([
            'status' => 'success',
            'message' => 'You have successfully applied'
        ]);
    }
}
