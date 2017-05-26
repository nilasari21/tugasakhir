@extends('machiko.machiko_template')

@section('css')
<!-- <link rel="stylesheet" href="{{ asset('/adminlte/') }}/bootstrap/css/bootstrap.min.css"> -->
<link href="{{ asset("/adminlte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="{{ asset('machikoo/') }}/profil.css">

<style type="text/css">
hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 1px;
    border-top: 1px solid #666;
}
.profile-user-img {
    margin: 0 auto !important;
    width: 300px !important;
    padding: 3px !important;
     border: 0px !important; 
}
</style>
@endsection

@section('content')

  <!-- <section class="content" style="padding-top:225px"> -->

 
 
    <div class="row animated infinite slideInUp" style="animation-iteration-count: inherit;padding-top:200px;" >
      

        <div class="col-md-12">
        <div class="nav-tabs-custom">
            
            <!-- <div class="tab-content">
            <div class="active tab-pane" id="activity"> -->
            
                 
                <div class="box box-solid">
                    <div class="box-header with-border">
                    
                    <h5 class="box-title"><i class="fa fa-user"></i> Tentang kami</a></h5>
                    
                <div class="row">
                    
              
                    <div class="col-sm-12">

                        <div class="col-md-12">
                            <!-- <div class="box-body box-profile"> -->
                               
                                <img class="profile-user-img img-responsive img-circle" 
                                            src="{{asset("/machikoo/img/mauedit.png")}}" >
                              
                            <br/>
                        <!-- </div> -->
                    
                    
                    <br/>
                    </div>
                </div>
                <div class="col-md-4" >
                        
                    </div>
                 <div class="col-md-4" dtyle="text-align:center">
                       
                    </div>
                    <div class="col-md-4" >
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-1 col-xs-10">
                        
                        <p>Machiko K-Store merupakan sebuah toko online yang menjual aksesoris dengan tema Korea. Machiko K-Store berdiri sejak 04 Mei 2016. Tempat produksi dari toko ini terletak di Kulon Progo, Daerah Istimewa Yogyakarta. 
    </p>
    <p>Selama berdiri, Machiko K-Store mempromosikan produknya melalui social media Line@ dan Instagram. Proses pemesanan juga dilakukan melalui Line@ serta Whatsapp. Sebagian besar produk yang dijual oleh Machiko K-Store dipasarkan dengan cara Pre-Order, sisanya merupakan barang ready stock. Machiko K-Store telah memasangkan produk yang dijual dalam jangkan waktu tertentu, pembeli memesan dan membayar produk tersebut selama jangka waktu yang ditentukan oleh Machiko K-Store. Produk tersebut baru akan diproduksi setelah jangka waktu pemesanan telah ditutup. Machiko K-Store akan memproduksi sesuai barang dan jumlah pesanan. Dalam memproduksi barang pesanan, ada beberapa barang dari toko yang dipesan langsung dari Korea. 
</p>
            </div>
            </div>
    </div>
     </div>
    </div>
</div>
</div>
   


  <!-- </section> -->

  
@endsection

     
            
