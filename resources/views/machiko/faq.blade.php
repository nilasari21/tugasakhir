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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Mengapa barang saya tiba-tiba hilang dari keranjang?</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                    Anda dapat menyimpan belanja anda dalam keranjang sebelum melakukan checkout. Akan tetapi kami memberikan batas waktu hingga 24 jam untuk melakukan checkout barang tersebut.
                    Apabila barang dalam keranjang belum di checkout dalam 24 jam, maka barang akan otomatis terhapus dari keranjang. Pastikan anda segera melakukan checkout barang anda.
                    <br />
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Saya sudah melakukan checkout, tapi mengapa status barang saya Batal saat akan upload bukti bayar?</a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                    Barang yang sudah dicheckout akan kami <i>keep</i> atas nama anda. Akan tetapi barang tersebut harus dikonfirmasi pemayarannya maksimal 48 jam setelah melakukan checkout (khusus untuk reseller
                    , 48 jam setelah transaksi disetujui oleh admin). Apabila dalam 48 jam anda belum melakukan konfirmasi pembayaran, maka barang anda akan otomatis berstatus Batal. Anda tidak dapat melakukan konfirmasi lagi.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">Saya sudah terlanjur melakukan pembayaran, tetapi belum konfirmasi dalam kurun waktu 48 jam?</a>
                </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse">
                <div class="panel-body">
                    Apabila anda sudah terlanjur melakukan pembayaran melalu ATM atau pulsa akan tetapi belum konfirmasi dalam 48 jam, barang tersebut tetap ber status Batal.
                    Segera hubungi admin dan tunjukkan bukti pembayaran agar dapat dilakukan proses refund oleh admin.
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">Berapa lama barang sampai di alamat saya?</a>
                </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse">
                <div class="panel-body">
                    Proses pengiriman barang dilakukan oleh pihak ketiga yaitu JNE, lama pengiriman barang tergantung dari jenis ongkos kirim yang anda gunakan. 
                    Apabila dalam 2 minggu barang anda belum sampai di tempat, segera hubungi admin untuk dapat memproses ke kurir yang bersangkutan. Kami juga telah menyantumkan nomor resi
                    pada status pemesanan barang anda. Harap secara berkala cek resi tersebut pada website kurir yang bersangkutan untuk melacak lokasi barang anda.
                </div>
            </div>
        </div>

        <!-- <div class="faqHeader">Buyers</div> -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Saya ingin membeli produk ready stock dan pre order dalam paket yang berbeda, bagaimana caranya?</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    Apabila anda membeli banyak barang dalam sekali checkout, maka barang otomatis akan dikirim menjadi 1 paket. Apabila anda ingin barang dikirim dalam beda paket,
                    maka lakukan checkout secara terpisah. Maka barang akan dikirim sesuai daftar barang yang anda checkout saat itu.
                </div>
            </div>
        </div>
       
    </div>
</div>


  <!-- </section> -->

  
@endsection

     
            
