<?php

namespace bushart\activitylog\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LogActivity
{
    use Dispatchable, SerializesModels;

    public $activity;


    public function __construct($activity)
    {
        $this->activity = $activity;

    }
}