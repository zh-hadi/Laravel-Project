<?php

namespace App\Http\Controllers;

use App\CanLoadRelationshipes;
use App\Http\Resources\AttendeeResource;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    use CanLoadRelationshipes;
    private array $relations = ['user'];

    public function index(Event $event)
    {
        
        $hasMany = $event->attendees();

        $attendees = $this->loadRelationShips($hasMany);


        return AttendeeResource::collection(
            $attendees->paginate(3)
        );
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Event $event)
    {
        $attendee = $event->attendees();
        $attendee->create(['user_id' => 2]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, Attendee $attendee)
    {
        return new AttendeeResource($this->loadRelationShips( $attendee));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendee $attendee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendee $attendee)
    {
        $attendee->delete();

        return response($status = 201);
    }
}
