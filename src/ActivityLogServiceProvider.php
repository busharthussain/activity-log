<?php

namespace bushart\activitylog;
use Illuminate\Support\ServiceProvider;
use bushart\activitylog\activitylog\Commands\MainCommand;
use bushart\activitylog\activitylog\Commands\ModelCommand;

class ActivityLogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->commands([
            MainCommand::class,
            ModelCommand::class,
        ]);
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/migration/022_11_24_110854_create_activity_logs_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_activity_logs_table.php'),
        ], 'migrations');

    }
}
