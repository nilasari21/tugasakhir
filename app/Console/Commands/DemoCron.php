<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Carbon\Carbon;
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
         $waktu = Carbon::now();

       $produk= DB::table('detail_transaksi')
            ->join('transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
            ->join('produk_ukuran','detail_transaksi.id_produk_ukuran','produk_ukuran.id_produk_ukuran')
            ->join('produk','produk.id','produk_ukuran.produk_id')
            // ->select('transaksi.*','produk.*','detail_transaksi.*','produk_ukuran.*')
            ->whereNULL('transaksi.id_konfirmasi')
            ->where('produk.jenis','=','Ready Stock')
            ->where('transaksi.id_transaksi','<=',$waktu)
            ->update(['produk_ukuran.stock'=>'produk_ukuran.stock'+'detail_transaksi.jumlah_beli']);
        // DB::table('detail_transaksi')->update(['status_pesan'=>'Batal'])
        //                            ->where('updated_at','');
        $this->info('Demo:Cron Cummand Run successfully!');
    }
}
