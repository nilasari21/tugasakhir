<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use DB;
use App\Transaksi;
use App\DetailTransaksi;
use App\ProdukUkuran;
class TrsanBat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trans:bat';

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
        $waktu = Carbon::now(8);

        

           $produk= DB::table('transaksi')
            ->join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
            ->join('produk_ukuran','detail_transaksi.id_produk_ukuran','produk_ukuran.id_produk_ukuran')
            ->join('produk','produk.id','produk_ukuran.produk_id')
            ->select('transaksi.*','produk.*','detail_transaksi.*','produk_ukuran.*')
            ->whereNULL('transaksi.id_konfirmasi')
            ->where('produk.jenis','=','Ready Stock')
            ->where('transaksi.updated_at','<=',$waktu)->update(['status_pesan'=>'Pending']);
       
                                    
        $this->info('Batal:trans Cummand Run successfully!');
       
    }
}
