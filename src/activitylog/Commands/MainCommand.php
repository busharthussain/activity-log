<?php

namespace bushart\activitylog\activitylog\Commands;

use Illuminate\Support\Str;
use InvalidArgumentException;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\Artisan;

class MainCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate new log to db';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'log';


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return;
    }


    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function handle()
    {
        $this->handleCommands();
        $this->info('Completed successfully.');
    }

    protected function handleCommands()
    {
        //Generate model
//        Artisan::call('vendor:publish', [
//            '--tag' => 'migrations',
//        ]);

    }
}
