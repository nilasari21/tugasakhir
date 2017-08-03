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
                            <h2>Syarat dan Ketentuan</h2>
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
        Selamat datang di Machiko K-Store. <br/>

<p style="text-align:justify">Syarat & ketentuan yang ditetapkan di bawah ini mengatur pemakaian jasa yang ditawarkan oleh Machiko K-Store terkait penggunaan situs
 www.machikokstore.com. Pengguna disarankan membaca dengan seksama karena dapat 
berdampak kepada hak dan kewajiban Pengguna di bawah hukum.</p>
<br/>
<p style="text-align:justify">Dengan mendaftar dan/atau menggunakan situs www.machikokstore.com., 
maka pengguna dianggap telah membaca, mengerti, memahami dan menyutujui 
semua isi dalam Syarat & ketentuan. Syarat & ketentuan ini merupakan bentuk kesepakatan yang dituangkan dalam sebuah 
perjanjian yang sah antara Pengguna dengan Machiko K-Store. Jika pengguna tidak menyetujui salah satu, sebagian, atau seluruh isi 
Syarat & ketentuan, maka pengguna tidak diperkenankan menggunakan layanan di www.machikokstore.com.</p><br/>
<!-- <p style="text-align:justify"> -->
<ol style="margin-left:15px">
    <li>Pengguna dengan ini menyatakan bahwa pengguna adalah orang yang cakap dan mampu untuk mengikatkan dirinya dalam sebuah perjanjian yang sah menurut hukum.
    </li>
    <li>Machiko K-Store tidak memungut biaya pendaftaran kepada Pengguna.
    </li>
    <li>Machiko K-Store tanpa pemberitahuan terlebih dahulu kepada Pengguna, memiliki kewenangan untuk melakukan tindakan yang perlu atas 
        setiap dugaan pelanggaran atau pelanggaran Syarat & ketentuan dan/atau hukum yang berlaku. 
    </li>
    <!-- <li>Machiko K-Store memiliki kewenangan untuk menutup  akun Pengguna baik sementara maupun permanen apabila didapati adanya tindakan kecurangan 
        dalam bertransaksi dan/atau pelanggaran terhadap syarat dan ketentuan Machiko K-Store.
    </li> -->
    <li>Pengguna dilarang untuk menciptakan dan/atau menggunakan perangkat, software, fitur dan/atau alat lainnya yang bertujuan untuk 
        melakukan manipulasi pada sistem Machiko K-Store, termasuk namun tidak terbatas pada : (i) manipulasi data Toko; 
        (ii) kegiatan perambanan (crawling/scraping); (iii) kegiatan otomatisasi dalam transaksi, jual beli, promosi, dsb; 
        (v) penambahan produk ke etalase; dan/atau (vi) aktivitas lain yang secara wajar dapat dinilai sebagai tindakan manipulasi sistem.
    </li>
    <li>Pengguna bertanggung jawab secara pribadi untuk menjaga kerahasiaan akun dan password untuk semua aktivitas yang terjadi dalam akun Pengguna.
    </li>
    <li>Machiko K-Store tidak akan meminta email maupun password  
        milik akun Pengguna untuk alasan apapun, oleh karena itu Machiko K-Store menghimbau Pengguna agar tidak 
        memberikan data tersebut maupun data penting lainnya kepada pihak 
        yang mengatasnamakan Machiko K-Store atau pihak lain yang tidak dapat dijamin keamanannya.
    </li>
    <li>Pengguna dengan ini menyatakan bahwa Machiko K-Store tidak bertanggung jawab atas kerugian atau kerusakan yang timbul dari penyalahgunaan akun Pengguna.
    </li>
    <li>
        Pembeli wajib bertransaksi melalui prosedur transaksi yang telah ditetapkan oleh Machiko K-Store. 
        Pembeli melakukan pembayaran dengan menggunakan metode pembayaran yang sebelumnya telah dipilih oleh Pembeli
    </li>
    <li>
        Saat melakukan pembelian Barang, Pembeli menyetujui bahwa:<br/>
- Pembeli bertanggung jawab untuk membaca, memahami, dan menyetujui informasi/deskripsi keseluruhan Barang (termasuk didalamnya namun tidak terbatas pada warna, kualitas, fungsi, dan lainnya) sebelum membuat tawaran atau komitmen untuk membeli.<br/>
- Pembeli mengakui bahwa warna sebenarnya dari produk sebagaimana terlihat di situs Machiko K-Store tergantung pada monitor komputer Pembeli.
 Machiko K-Store telah melakukan upaya terbaik untuk memastikan warna dalam foto-foto yang ditampilkan di Situs Machiko K-Store muncul seakurat mungkin, tetapi tidak dapat menjamin bahwa penampilan warna akan akurat.<br/>
- Pengguna masuk ke dalam kontrak yang mengikat secara hukum untuk membeli Barang ketika Pengguna membeli suatu barang.
    </li>
    <li>Machiko K-Store memiliki kewenangan sepenuhnya untuk menolak pembayaran tanpa pemberitahuan terlebih dahulu.
    </li>
    <li>Machiko K-Store memiliki kewenangan sepenuhnya untuk menolak transaksi dari reseller.
    </li>
    <li>Machiko K-Store memiliki kewenangan sepenuhnya untuk menetukan diskon terhadap transaksi reseller dimulai dari Rp 0,00.
    </li>
    <li>Machiko K-Store memiliki kewenangan untuk menolak upgrade level user
    </li>
    <li>Pembayaran oleh Pembeli wajib dilakukan segera (selambat-lambatnya dalam batas waktu 2 hari) setelah Pembeli melakukan check-out. 
        Jika dalam batas waktu tersebut pembayaran atau konfirmasi pembayaran belum dilakukan oleh pembeli, Machiko K-Store memiliki kewenangan 
        untuk membatalkan transaksi dimaksud. Pengguna tidak berhak mengajukan klaim atau tuntutan atas pembatalan transaksi tersebut.
    </li>
    <li>Pembeli menyetujui untuk tidak memberitahukan atau menyerahkan bukti pembayaran kepada pihak lain 
        selain Machiko K-Store. Dalam hal terjadi kerugian akibat pemberitahuan atau penyerahan bukti 
        pembayaran oleh Pembeli kepada pihak lain, maka hal tersebut akan menjadi tanggung jawab Pembeli.
    </li>
    <li>
        Pembeli memahami dan menyetujui bahwa setiap masalah pengiriman Barang yang disebabkan keterlambatan
         pembayaran adalah merupakan tanggung jawab dari Pembeli.
    </li>
    <li>
        Pembeli memahami dan menyetujui bahwa masalah keterlambatan proses pembayaran dan biaya tambahan yang disebabkan oleh perbedaan bank yang Pembeli pergunakan 
        dengan bank Rekening resmi Machiko K-Store adalah tanggung jawab Pembeli secara pribadi.
    </li>
    <li>Machiko K-Store berwenang untuk membatalkan produksi barang pre-order karena alasan tertentu (jumlah pemesanan tidak memenuhi minimal 
        produksi). Apabila terjadi pembatalan produksi, maka uang yang telah ditransfer oleh pemebeli akan dikembalikan oleh Machiko K-Store.
        Proses pengembalian uang dilakukan di luar sistem. Pembeli menunggu dihubungi admin maksimal 2 hari. Apabila dalam 2 hari pembeli tidak dihubungi admin,
        Silahkan kontak admin pada kontak yang tersedia.
    </li>
    <li>
        Dengan melakukan pemesanan melalui Machiko K-Store, Pengguna menyetujui untuk membayar total biaya yang harus dibayarkan 
        sebagaimana tertera dalam halaman pembayaran, yang terdiri dari harga barang, ongkos kirim, dan biaya-biaya lain 
        yang mungkin timbul dan akan diuraikan secara tegas dalam halaman pembayaran. 
        Pengguna setuju untuk melakukan pembayaran melalui metode pembayaran yang telah dipilih sebelumnya oleh Pengguna.
    </li>
    <li>Situs Machiko K-Store untuk saat ini hanya melayani transaksi jual beli Barang dalam mata uang Rupiah.
    </li>
    <li>Semua barang dalam nomor transaksi yang sama akan dikirim dalam satu paket yang sama. Apabila di dalama paket pembelian terdapat barang
        pre-order, barang dikirim setelah semua barang selesai produksi.
    </li>
    <li>Pengguna memahami dan menyetujui bahwa setiap permasalahan yang terjadi pada saat proses pengiriman Barang oleh penyedia jasa layanan pengiriman Barang adalah
     merupakan tanggung jawab penyedia jasa layanan pengiriman.
    </li>
    <li>
        Machiko K-Store selalu berupaya untuk menjaga Layanan Machiko K-Store aman, nyaman, dan berfungsi dengan baik, tapi kami tidak dapat menjamin 
        operasi terus-menerus atau akses ke Layanan kami dapat selalu sempurna. Informasi dan data dalam situs Machiko K-Store memiliki 
        kemungkinan tidak terjadi secara real time.<br/>

Pengguna setuju bahwa Anda memanfaatkan Layanan Machiko K-Store atas risiko Pengguna sendiri, dan Layanan 
Machiko K-Store diberikan kepada Anda pada "SEBAGAIMANA ADANYA" dan "SEBAGAIMANA TERSEDIA".<br/>
Anda setuju untuk tidak menuntut Machiko K-Store bertanggung jawab, atas segala kerusakan atau kerugian (termasuk namun tidak terbatas 
pada hilangnya uang, reputasi, 
keuntungan, atau kerugian tak berwujud lainnya) yang diakibatkan secara langsung atau tidak langsung dari :<br>

- Penggunaan atau ketidakmampuan Pengguna dalam menggunakan Layanan Machiko K-Store.<br>
- Harga, Pengiriman atau petunjuk lain yang tersedia dalam layanan Machiko K-Store.<br>
- Keterlambatan atau gangguan dalam Layanan Machiko K-Store.<br>
- Kelalaian dan kerugian yang ditimbulkan oleh masing-masing Pengguna.<br>
<!-- - Kualitas Barang. -->
- Pengiriman Barang.<br>
- Pelanggaran Hak atas Kekayaan Intelektual.<br>
- Perselisihan antar pengguna.<br>
- Pencemaran nama baik pihak lain.<br>
- Setiap penyalahgunaan Barang yang sudah dibeli pihak Pengguna.<br>
- Kerugian akibat pembayaran tidak resmi kepada pihak lain selain ke Rekening Resmi Machiko K-Store, yang dengan cara apa pun mengatas-namakan Machiko K-Store ataupun kelalaian penulisan rekening dan/atau informasi lainnya dan/atau kelalaian pihak bank.<br>
<!-- - Pengiriman untuk perbaikan Barang yang bergaransi resmi dari pihak produsen. Pembeli dapat membawa Barang langsung kepada pusat layanan servis terdekat dengan kartu garansi dan faktur pembelian. -->
- Virus atau perangkat lunak berbahaya lainnya yang diperoleh dengan mengakses , atau menghubungkan ke layanan Machiko K-Store.<br>
- Gangguan, bug, kesalahan atau ketidakakuratan apapun dalam Layanan Machiko K-Store.<br>
- Kerusakan pada perangkat keras Anda dari penggunaan setiap Layanan Machiko K-Store.<br>

- Tindak penegakan yang diambil sehubungan dengan akun Pengguna.<br>
- Adanya tindakan peretasan yang dilakukan oleh pihak ketiga kepada akun pengguna.
    </li>




    <li>
        Syarat & ketentuan mungkin di ubah dan/atau diperbaharui dari waktu ke waktu tanpa pemberitahuan sebelumnya. 
        Machiko K-Store menyarankan agar anda membaca secara seksama dan memeriksa halaman Syarat & ketentuan ini dari waktu 
        ke waktu untuk mengetahui perubahan apapun. Dengan 
        tetap mengakses dan menggunakan layanan Machiko K-Store, maka pengguna dianggap menyetujui perubahan-perubahan dalam Syarat & ketentuan.
    </li>
</ol>
<!-- </p> -->
</div>


  <!-- </section> -->

  
@endsection

     
            
