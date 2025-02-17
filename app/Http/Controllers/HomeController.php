<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::where('status',1)->orderBy('name','ASC')->get();
        $featuredevents = Event::where('status',1)->with('location')->with('deptType')->where('isFeatured',1)->get();
        $latestevents = Event::where('status',1)->with('location')->with('deptType')->orderBy('created_at','DESC')->get();
        return view('front.home',[
            'categories' => $categories,
            'featuredevents' => $featuredevents,
            'latestevents' => $latestevents
        ]);
    }
}
