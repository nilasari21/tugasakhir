<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BatalCheckout extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batalcheckout:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        DB::table('items')->insert(['name'=>'hello new']);
        $this->info('Demo:Cron Cummand Run successfully!');
    }
}
