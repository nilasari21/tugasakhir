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
.content {
    min-height: 250px !important;
     padding-top: 15px !important; 
     margin-right: auto !important; 
     margin-left: auto !important; 
     padding-left: 0px !important; 
     padding-right: 0px !important; 
}
</style>
@endsection

@section('content')

  <!-- <section class="content" style="padding-top:225px"> -->

 <div class="product-big-title-area" style="padding-left:0px;padding-right:0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            <h2>Tentang Kami</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
    <div class="row animated infinite slideInUp" style="animation-iteration-count: inherit;padding-top:20px;" >
      

        <div class="col-md-12" style="padding-top:0px !important">
        <div class="nav-tabs-custom">
            
            <!-- <div class="tab-content">
            <div class="active tab-pane" id="activity"> -->
            
                 
                <div class="box box-solid" style="padding: 60px 130px 130px;">
                    <div class="box-header with-border">
                    
                    <!-- <h5 class="box-title"><i class="fa fa-user"></i> Tentang kami</a></h5> -->
                    
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
                        <div class="col-sm-offset-1 col-xs-10" style="text-align:justify">
                        
                        <p>Machiko K-Store merupakan sebuah toko online yang menjual aksesoris dengan tema Korea.  
                            Machiko K-Store berdiri sejak 04 Mei 2016 dengan Farista Dwi Vilandari sebagai Founder.
                             Tempat produksi dari toko ini terletak di Kulon Progo, Daerah Istimewa Yogyakarta. 
    </p>
    <p style="text-align:justify">Kami memasarkan produk ke seluruh Indonesia. Produk yang kami jual merupakan produk official dan unofficial. Produk official kami import langsung dari Korea.
        Produk unofficial kami produksi sendiri di rumah produksi kami. 
        Selama berdiri, Machiko K-Store mempromosikan produknya melalui social media Line@ dan Instagram. 
        
         Sebagian besar produk yang dijual oleh Machiko K-Store dipasarkan dengan cara Pre-Order, sisanya merupakan barang ready stock.
<br/><br/>
         Daftar Kontak Machiko K-Store:
         <br/>
         Instagram : @machiko.kstore <br/>
         Line      :@ogm5420o <br/>
         Whatsapp : 082227384289, 085640235938 <br/>
<br/>
<br/>   
         Pembayaran :<br/>
         BRI : 

            </div>
            </div>
    </div>
     </div>
    </div>
</div>
</div>
   


  <!-- </section> -->

  
@endsection

     
            
