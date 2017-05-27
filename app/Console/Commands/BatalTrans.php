<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\ProdukUkuran;
use DB;
use App\Transaksi;
class BatalTrans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batal:trans';

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
         $waktu = Carbon::now(8)->subHour(5); 

        $trans= Transaksi::join('detail_transaksi','detail_transaksi.id_transaksi','transaksi.id_transaksi')
            ->join('produk_ukuran','detail_transaksi.id_produk_ukuran','produk_ukuran.id_produk_ukuran')
            ->join('produk','produk.id','produk_ukuran.produk_id')
            ->select('transaksi.*','produk.*','detail_transaksi.*','produk_ukuran.*')
            ->where('transaksi.status_bayar','=','Belum lunas')
            ->where('produk.jenis','=','Ready Stock')
            ->where('transaksi.updated_at','<',$waktu)
            
            ->get();

        foreach ($trans as $detail) {
                $produk = ProdukUkuran::find($detail->id_produk_ukuran);
                $produk->stock = $produk->stock + $detail->jumlah_beli;
                $produk->save();
                $trans->update(['status_pesan'=>'Batal']);
            }
        
        // DB::table('detail_transaksi')->where('id_transaksi','=',$trans->id_transaksi)
                                    
        $this->info('Batal:trans Cummand Run successfully!');
       // /* $jam=2
    }
}
