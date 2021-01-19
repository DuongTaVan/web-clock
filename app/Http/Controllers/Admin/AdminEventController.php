<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Models\{Event};
class AdminEventController extends Controller
{
    public function index(){
    	$events = Event::all();
    	//dd($events);
    	return view('admin.event.index', compact('events'));
    }
    public function create(){
    	return view('admin.event.create');
    }
    public function store(Request $request){
    	//dd(1);
    	$event = new Event;
    	$event->ev_name = $request->ev_name;
    	//dd($request->trm_name);
    	$event->ev_slug = Str::slug($request->ev_name);
    	$event->location = $request->location;
    	//dd($request->location);
    	if ($request->hasFile('image')) {
			//dd(1);
            $file = $request->image;
            $file_name = Str::slug($request->ev_name).'.'.$file->getClientOriginalExtension();
           // dd($file_name);
            $file->move(public_path('images/event/'), $file_name);
            $event->ev_image = 'images/event/' . $file_name;
            $image = Image::make(public_path('images/event/'.$file_name))->fit($width = 348, $height = 314);
            $image->save();
        }
        //dd(2);
    	$event->save();
    	return redirect()->route('admin.event.index');
    }
    public function edit($id){
    	$event = Event::find($id);
    	return view('admin.event.update', compact('event'));
    }
    public function update(Request $request, $id){
    	//dd(1);
    	$event =  Event::find($id);
    	$event->ev_name = $request->ev_name;
    	//dd($request->trm_name);
    	$event->ev_slug = Str::slug($request->ev_name);
    	$event->location = $request->location;
    	if ($request->hasFile('image')) {
    		if ($event->ev_image) {
                $old_image = $event->ev_image;
                unlink($old_image);
            }
			//dd(1);
            $file = $request->image;
            $file_name = Str::slug($request->ev_name).'.'.$file->getClientOriginalExtension();
           // dd($file_name);
            $file->move(public_path('images/event/'), $file_name);
            $event->ev_image = 'images/event/' . $file_name;
            $image = Image::make(public_path('images/event/'.$file_name))->fit($width = 348, $height = 314);
            $image->save();
        }
        //dd(2);
    	$event->save();
    	return redirect()->route('admin.event.index');
    }
    public function active($id){
        $event = Event::find($id);
        $event->ev_active =! $event->ev_active;
        $event->save();
        return redirect()->back();
    }
    public function hot($id){
        $event = Event::find($id);
        $event->ev_hot =! $event->ev_hot;
        $event->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        $event = Event::find($id);
        if ($event->ev_image) {
            if (file_exists($event->ev_image)){
                $old_image = $event->ev_image;
                unlink(public_path($old_image));
            }
        }
        $event->delete();
        
        return redirect()->route('admin.event.index');
    }
}
