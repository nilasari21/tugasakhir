@extends('machiko.machiko_template')

@section('css')
<!-- <link rel="stylesheet" href="{{ asset('/adminlte/') }}/bootstrap/css/bootstrap.min.css"> -->
<link href="{{ asset("/adminlte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="{{ asset('machikoo/') }}/profil.css">

<style>
    .faqHeader {
        font-size: 27px;
        margin: 20px;
    }

    .panel-heading [data-toggle="collapse"]:after {
        font-family: 'Glyphicons Halflings';
       /* content: "e072"; *//* "play" icon */
        float: right;
        color: #F58723;
        font-size: 18px;
        line-height: 22px;
        /* rotate "play" icon from > (right arrow) to down arrow */
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading [data-toggle="collapse"].collapsed:after {
        /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
        color: #454444;
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

 <div class="product-big-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            <h2>Bantuan</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
    <div class="row animated infinite slideInUp" style="animation-iteration-count: inherit;padding-top:30px;" >
      

        <div class="container">
    <br />
    <br />
    <br />
<div class="box box-solid">
                    <div class="box-header with-border">
   <!--  <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        This section contains a wealth of information, related to <strong>PrepBootstrap</strong> and its store. If you cannot find an answer to your question, 
        make sure to contact us. 
    </div> -->

    <br />

    <div class="panel-group" id="accordion">
        <!-- <div class="faqHeader">General questions</div> -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Bagaimana cara memesan produk?    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    Sebelum anda melakukan pemesanan, anda harus mendaftar menjadi member terlebih dahulu pada menu <strong>Daftar</strong>.
                    Setelahnya anda dapat melakukan transaksi sesuai produk yang diinginkan, dengan menambah ke keranjang sesuai jumlah dan atau ukuran.
                    Produk akan tersimpan di keranjang. Dan setelahnya anda dapat melakukan Checkout. Isi form yang tersedia.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Bagaimana cara memesan oleh Reseller atau Dropshippper?</a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body">
                    Perlu diketahui bahwa pertama kali mendaftar member, level user anda adalah Customer (Dapat anda cek di menu Profil -> Lihat Profil).
                    Bila anda ingin melakukan transaksi dengan status anda sebagai Reseller atau Dropshipper, maka anda harus melakukan upgrade level user pada halaman profil.
                    Upgrade level ini memerlukan persetujuan admin, apabila anda ingin level anda lebih cepat disetujui silahkan hubungi admin pada contact yang tersedia.
                    Selama level anda belum disetujui oleh admin, anda tidak dapat melakukan transaksi sebagai reseller atau dropshipper. Transaksi anda tetap berlevel customer.
                    Setelah level disetujui, anda dapat melakukan transaksi sesuai cara yang telah dijelaskan pada poin pertama.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">Berapa Ongkos Kirim ke alamat rumah saya?</a>
                </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse">
                <div class="panel-body">
                    Jika anda ingin mengetahui ongkos kirim ke lokasi tujuan pengiriman, Anda dapat memilih menu <strong>Ongkos Kirim</strong>. Lokasi asal sudah default dari lokas asal Machiko K-Store yaitu
                    Yogyakarta. Isi form yang tersedia yaitu Kota tujuan pengiriman dan berat barang (Berat barang dapat anda ketahui di halaman detail setiap barang).
                </div>
            </div>
        </div>

       <!--  <div class="faqHeader">Sellers</div> -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Bagaimana cara saya membayar?</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    Setelah anda melakukan checkout, Silahkan membayar sesuai metode pembayaran yang anda pilih. Bukti pembayaran dapat anda upload pada halaman Konfirmasi Pembayaran.
                    Silahkan klik <strong>Profil -> Konfirmasi Pembayaran</strong>. Pada halaman ini akan ditampilkan daftar transaksi yang anda miliki. Silahkan pilih transaksi yang akan anda bayar.
                    Lalu pilih tombol "Konfirmasi", akan ditampilkan form upload bukti pembayaran. Isi form dengan benar.<br/>
                    Bukti yang telah anda upload belum menandakan bahwa transaksi anda telah lunas. Bukti tersebut harus dicek terlebih dahulu oleh admin.
                    Apabila bukti anda ditolak, maka anda harus melakukan upload ulang. Pastikan bukti anda benar.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Saya ingin mengetahui produk yang saya pesan telah sampai tahap apa. Bagaimana caranya?</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    Anda dapat pergi ke menu <strong>Profil -> Status pemesanan</strong>. Akan ditampilkan daftar transaksi yang telah anda lakukan.
                   Silahkan pilih tombol "Lihat detail" pada transaksi yang diinginkan. Akan ditampilkan daftar produk pada transaksi tersebut beserta statusnya.
                </div>
            </div>
        </div>
       <!--  <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">How much do I get from each sale?</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                    Here, at <strong>PrepBootstrap</strong>, we offer a great, 70% rate for each seller, regardless of any restrictions, such as volume, date of entry, etc.
                    <br />
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Why sell my items here?</a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                    There are a number of reasons why you should join us:
                    <ul>
                        <li>A great 70% flat rate for your items.</li>
                        <li>Fast response/approval times. Many sites take weeks to process a theme or template. And if it gets rejected, there is another iteration. We have aliminated this, and made the process very fast. It only takes up to 72 hours for a template/theme to get reviewed.</li>
                        <li>We are not an exclusive marketplace. This means that you can sell your items on <strong>PrepBootstrap</strong>, as well as on any other marketplate, and thus increase your earning potential.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">What are the payment options?</a>
                </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse">
                <div class="panel-body">
                    The best way to transfer funds is via Paypal. This secure platform ensures timely payments and a secure environment. 
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">When do I get paid?</a>
                </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse">
                <div class="panel-body">
                    Our standard payment plan provides for monthly payments. At the end of each month, all accumulated funds are transfered to your account. 
                    The minimum amount of your balance should be at least 70 USD. 
                </div>
            </div>
        </div>

        <div class="faqHeader">Buyers</div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">I want to buy a theme - what are the steps?</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    Buying a theme on <strong>PrepBootstrap</strong> is really simple. Each theme has a live preview. 
                    Once you have selected a theme or template, which is to your liking, you can quickly and securely pay via Paypal.
                    <br />
                    Once the transaction is complete, you gain full access to the purchased product. 
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Is this the latest version of an item</a>
                </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse">
                <div class="panel-body">
                    Each item in <strong>PrepBootstrap</strong> is maintained to its latest version. This ensures its smooth operation.
                </div>
            </div>
        </div> -->
    </div>
</div>


  <!-- </section> -->

  
@endsection

     
            
