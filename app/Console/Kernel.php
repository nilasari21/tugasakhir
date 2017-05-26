<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    Commands\BatalCheckout::class,
    Commands\TrsanBat::class,
    Commands\DemoCron::class,
    Commands\BatalTrans::class,
    // Commands\KeranjangBatal::class,
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();
        $schedule->command('trans:bat')
                 ->everyMinute();
        /*$schedule->command('batalcheckout:cron')
                 ->everyMinute();*/
        $schedule->command('demo:cron')
                 ->everyMinute();
        $schedule->command('batal:trans')
                 ->everyMinute();
        /*$schedule->command('keranjang:batal')
                 ->everyMinute();*/
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
