<?php

namespace App\Http\Controllers;


use App\CanLoadRelationshipes;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{

    use CanLoadRelationshipes;

    private  array $relations = ['user', 'attendees', 'attendees.user', 'attendees.event'];
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        $query = Event::query();

       
        // $query->when(true, fn($q) => $q->with('user') );
        // return $query->get();
        

        $query = $this->loadRelationShips($query);
        
       
        return EventResource::collection(
            $query->latest()->paginate()
        );
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
   

        $attribute = request()->validate([
            'name' => "required|string|max:255",
            'description' => "nullable|string",
            'start_time' => "required|date",
            'end_time' => "required|date",
        ]);

        $event = Event::create([
            ...$attribute,
            'user_id' => 1
        ]);

        return $event;
        // store
        // redirect
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return $this->loadRelationShips($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // validate
        Gate::authorize('update-event', $event);

        $attribute = request()->validate([
            'name' => "required|string|max:255",
            'description' => "nullable|string",
            'start_time' => "required|date",
            'end_time' => "required|date",
        ]);
        // update 
        $event->update([
            ...$attribute,
            'user_id' => $event->id
        ]);
        // return / redirect
        return $event;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        // if(!Gate::allows('delete-event', $event)){
        //     return response()->json([
        //         'message' => 'you are not create this event'
        //     ]);
        // }

        Gate::authorize('delete-event', $event);

        $event->delete();

        return response()->json([
            'message' => "event delete successfully"
        ]);
    }
}
