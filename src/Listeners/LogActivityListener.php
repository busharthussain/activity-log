<?php

namespace bushart\activitylog\Listeners;


use bushart\activitylog\Events\LogActivity;
use bushart\activitylog\Model\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogActivityListener
{
    public function handle(LogActivity $event): void
    {
        $activity = new ActivityLog();
        $activity->user_id = auth()->check() ? auth()->user()->id : null;
        $activity->log_name = !empty($event->activity['log_name']) ? $event->activity['log_name'] : '';
        $activity->description = !empty($event->activity['description']) ? $event->activity['description'] : '';
        $activity->save();
    }
}
