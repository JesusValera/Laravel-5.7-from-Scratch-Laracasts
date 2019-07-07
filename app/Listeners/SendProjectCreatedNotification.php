<?php

namespace App\Listeners;

use App\Events\ProjectCreated;
use App\Mail\ProjectCreated as ProjectCreatedMail;

class SendProjectCreatedNotification
{
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreated $event): void
    {
        \Mail::to($event->project->user->email)->send(
            new ProjectCreatedMail($event->project)
        );
    }
}
