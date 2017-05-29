<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use DB;
class KeranjangBatal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'keranjang:batal';

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
        $waktu = Carbon::now()->SubHour(5);

        $trans= DB::table('keranjang')
            ->where('updated_at','<',$waktu);
            ->join('produk_ukuran','keranjang.id_produk_ukuran','produk_ukuran.id_produk_ukuran')
            ->join('produk','produk_ukuran.produk_id','produk.id')
            ->where('produk.jenis','=','Ready Stock')
            ->update(['produk_ukuran.stock'=>'produk_ukuran.stock'+'keranjang.jumlah'])
       ->delete();
       $tran2= DB::table('keranjang')
            ->where('updated_at','<',$waktu);
            ->join('produk_ukuran','keranjang.id_produk_ukuran','produk_ukuran.id_produk_ukuran')
            ->join('produk','produk_ukuran.produk_id','produk.id')
            ->where('produk.jenis','=','PreOrder')
        ->delete();
            
        // DB::table('detail_transaksi')->where('id_transaksi','=',$trans->id_transaksi)
                                    
        $this->info('Delete Cummand Run successfully!');
    }
}
