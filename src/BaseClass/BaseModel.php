<?php

namespace bushart\activitylog\BaseClass;

use bushart\activitylog\Events\LogActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class BaseModel extends Model
{
    protected static $arrActivity = [];

    /**
     * Boot function to get any event trigger on the models
     *
     * @param array $arrActivity
     */
    public static function boot($arrActivity = [])
    {
        parent::boot();

        static::$arrActivity = $arrActivity;

        // Events triggered when a new record is created
        static::created(function ($model) {
            $activity = static::$arrActivity;
            self::createLogActivity($activity, $model, 'created');

        });

        // Events triggered when a record is updated
        static::updated(function ($model) {
            $activity = static::$arrActivity;
            self::createLogActivity($activity, $model, 'updated');
        });

        // Events triggered after a record is deleted
        static::deleted(function ($model) {
            $activity = static::$arrActivity;
            self::createLogActivity($activity, $model, 'deleted');
        });
    }

    /**
     * Create activities performed by user
     *
     * @param $activity
     * @param string $model
     * @param $eventEn
     * @param $eventDu
     */
    protected static function createLogActivity($activity, $model = '', $event = '')
    {
        $tableName = $model->getTable();
        $isPlural = Str::plural($tableName) !== $tableName;
        if (!$isPlural) {
            $tableName = Str::singular($tableName);
        }
        $activity['user_id'] = self::loginId();
        $message = !empty($tableName) ? $tableName : $model->table;
        $activity['log_name'] = $message . ' ' . $event;
        $activity['description'] = $message . ' has been ' . $event . ' by the ' . self::loginUserName();

        event(new LogActivity($activity));
    }


    /**
     * get user name
     * @return string
     */
    protected static function loginUserName()
    {
        $name = '';
        if (\Auth::check()) {
            $name = \Auth::user()->name;
        }

        return $name;
    }

}
