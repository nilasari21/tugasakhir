<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use DB;
use App\ProdukUkuran;
class CobaCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coba:cron';

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
         $waktu = Carbon::now(8)->subHour(48);
         $detail=DB::table('detail_transaksi')->get();
         foreach ($detail as $key ) {
            $trans= DB::table('transaksi')
            ->join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
            ->join('produk_ukuran','detail_transaksi.id_produk_ukuran','produk_ukuran.id_produk_ukuran')
            ->join('produk','produk.id','produk_ukuran.produk_id')
            ->select('transaksi.*','produk.*','detail_transaksi.*','produk_ukuran.*')
            ->where('transaksi.status_bayar','=','Belum lunas')
            ->where('detail_transaksi.id_detail_transaksi','=',$key->id_detail_transaksi)
            ->where('produk.jenis','=','Ready Stock')
            ->update(['produk_ukuran.stock'=>$key->jumlah_beli+'produk_ukuran.stock']); 
         }
        
        

           $produk= DB::table('transaksi')
            ->join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
            ->join('produk_ukuran','detail_transaksi.id_produk_ukuran','produk_ukuran.id_produk_ukuran')
            ->join('produk','produk.id','produk_ukuran.produk_id')
            ->select('transaksi.*','produk.*','detail_transaksi.*','produk_ukuran.*')
            ->where('transaksi.status_bayar','=','Belum lunas')
            // ->where('produk.jenis','=','Ready Stock')
            ->where('transaksi.updated_at','<=',$waktu)->update(['status_pemesanan_produk'=>'Batal']);
       
      
               
        $this->info('Batal:trans Cummand Run successfully!');
    }
}
