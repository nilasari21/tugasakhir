<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Carbon\Carbon;
class KeranjangHapus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'keranjang:hapus';

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
        
         $waktu = Carbon::now()->subHour(24);
         $detail=DB::table('keranjang')
         ->where('updated_at','<=',$waktu)->get();
         foreach ($detail as $key ) {
            $produk=DB::table('produk_ukuran')
            ->join('produk','produk.id','produk_ukuran.produk_id')
            ->where('id_produk_ukuran','=',$key->id_produk_ukuran)
            ->update(['produk_ukuran.stock'=>$key->jumlah+'produk_ukuran.stock']);
         }
        
        

           $data = DB::table('keranjang')->where('updated_at','<=',$waktu);
        $data->delete();
       
      
               
        $this->info('Batal:trans Cummand Run successfully!');
    }
}
