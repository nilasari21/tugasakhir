<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

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
        DB::table('transaksi')->insert(['name'=>'hello new']);
        $this->info('Demo:Cron Cummand Run successfully!');
       /* $jam=2
        DB::table('detail_transaksi')->update(['status_pesan'=>'Batal'])
                                    ->where('updated_at','');
        $this->info('Demo:Cron Cummand Run successfully!');*/
    }
}
