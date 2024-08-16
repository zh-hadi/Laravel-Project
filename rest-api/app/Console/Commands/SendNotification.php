<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification near to event start';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $events = \App\Models\Event::whereBetween('start_time', [now(), now()->addDays()])
            ->with('attendees.user')
            ->withCount('attendees')
            ->get();

        $EventCount = $events->count();
        $EventLavel = Str::plural('event', $EventCount);
        $this->info("Found {$EventCount} {$EventLavel}");


        $events->each(function($event){
            $event->attendees()->each(function($attendee){
                //$this->info("notify user id: ".$attendee->user_id);
                Mail::to("ab@gmail.com")->send(
                    new \App\Mail\SendMail()
                );
            });
        });

        $this->info("notification send successfully.");

        
            
        $this->info($events->sum('attendees_count'));
    }
}
