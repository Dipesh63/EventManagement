<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\DeptType;
use App\Models\Event;
use App\Models\Location;
use App\Models\User;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('status',1)->get();
        $deptTypes = DeptType::where('status',1)->get();
        $events = Event::where('status',1);

        if(!empty($request->keyword))
        {
            // $events = $events->orWhere('title','like','%'.$request->keyword.'%');
            // $events = $events->orWhere('keywords','like','%'.$request->keyword.'%');

            $events = $events->where(function($query) use ($request) {
                $query->orWhere('title','like','%'.$request->keyword.'%');
                $query->orWhere('keywords','like','%'.$request->keyword.'%');
            });
        }

        //Problem
        if (!empty($request->club_location)) {
            $events = $events->where('club_location', $request->club_location);
        } 
        
        if (!empty($request->category)) {
            $events = $events->where('category_id', $request->category);
        } 

        $deptTypeArray =[];
        if (!empty($request->deptType)) {
            $deptTypeArray = explode(',',$request->deptType);

            $events = $events->whereIn('dept_type_id', $deptTypeArray);
        } 
        
        if (!empty($request->experience)) {
            $events = $events->where('duration', $request->experience);
        } 

        // $events = $events->with('deptType')->orderBy('created_at','DESC')->paginate(9);

        $events = $events->with(['deptType','category']);

        if($request->sort == '0') {
            $events = $events->orderBy('created_at','ASC');
        } else {
            $events = $events->orderBy('created_at','DESC');
        }
        

        $events = $events->paginate(9);

        return view('front.events',[

            'categories' => $categories,
            'deptTypes' => $deptTypes,
            'events' => $events,
            'deptTypeArray' => $deptTypeArray,
        ]);
    }






    public function detail($id){
        $event = Event::where([
            'id' => $id, 
            'status' => 1 
        ])->with(['deptType','category','location'])->first();
        return view('front.eventDetail',['event' => $event]);

    }
}