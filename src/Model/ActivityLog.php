<?php

namespace bushart\activitylog\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActivityLog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

}
