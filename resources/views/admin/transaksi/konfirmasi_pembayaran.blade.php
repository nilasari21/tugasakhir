@extends('admin.admin_template')
@section('css')
<style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: absolute !important; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 2;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: scroll !important; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute !important;
    top: 15px !important;
    right: 35px !important;
    color: #f1f1f1 !important;
    font-size: 50px !important;
    font-weight: bold !important;
    transition: 0.3s !important;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
@endsection

@section('content')
  <div id="myModal" class="modal" style="overflow: scroll !important;">
  <span class="close" style="font-size:50px; opacity: .5;">&times;</span>
  <img class="modal-content" id="img01" style="left:25%;margin-top:5%">
  <div id="caption"></div>
</div>
<div class="panel panel-card" >
  <!-- <h2 tyle="align:center"><b >Daftar Testimoni</b><br/></h2> -->

     <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
          <th>Tanggal bayar</th>
          <th>ID transaksi</th>
          <th>Nama User</th>
          <th>Foto</th>
          <th>Total transfer</th>
          <th>Total harus bayar</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
       @php
       $i=1;
       @endphp
       @foreach ($data as $row)
        <tr>
          <td>{{ $row->tgl_transfer }}</td>
          <td>{{ $row->id_transaksi }}<input type="hidden" name="idk" id="idk" value="{{$row->id_konfirmasi}}"></td>
          <td>{{ $row->name }}</td>
          <?php 
          if(count($row->foto)==0){?>
            <td></td>
            <?php
          }else{?>
          <td><img src=".img/produk/client/{{ $row->foto }}" id="myImg{{$i}}" style="width:300px; height:200px"></td>
          <?php
          }
          ?>
          
          <td>{{ $row->total_transfer }}</td>
          <td>{{ $row->total_bayar }}</td>
          <td>{{ $row->status }}</td>
          

          <td>
             
            <a class="btn btn-default" href="#" data-id="{{$row->id_konfirmasi}}" ><i class="fa fa-edit"></i>  Edit status</a>
         </td>
        </tr>
        @php
        $i++
        @endphp
       @endforeach
      </tbody>
    </table>
    </div>
  </div>
<div class="modal fade" id="modal3" role="dialog">
                                <div class="modal-dialog">
                                
                                 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Edit status pembayaran</h4>
                                    </div>
                                    <div class="modal-body">
                                     
                                    <form method="POST"   action="{{ url('konfirmasibayar/simpan') }}">
                                      <div class="row">
                                          {{ csrf_field() }}
                                          <div class="col-md-12" >
                                            <input type="hidden" name="idkonfirm" id="idkonfirm" value="">
                                              <div class="form-group">
                                                  <label for="exampleInputFile">Pilih persetujuan</label><br/>
                                                     <select class="form-control" style="width: 100%;" id="status_pesan" name="status_pesan" onChange="a()" data-toggle="modal" required/>
                                                        <option>Pilih jenis persetujuan</option>
                                                          <option value="Terima">Terima</option>
                                                          <option value="Tolak" >Tolak</option>
                                                          
                                                    </select>
                                            
                                        </div>
                                        <div class="form-group" id="editor1" style="display:none">
                                          <label for="exampleInputFile">Alasan penolakan</label><br/>
                                        <textarea  name="alasan" rows="10"  style="border: 1px solid #DF5E96;width:100%;">
                                            </textarea>
                                          </div>
                                         </div>

                                    </div>
                                  </div>
                                    <div class="modal-footer">
                                      <button type="submit"  class="btn btn-info">Simpan</button>
                                      </form> 
                                       <button    class="btn btn-warning" style="text-transform:capitalize" data-dismiss="modal">Batal</button>
                                      
                                    </div>
                            </div>
                                  
                                </div>
                              </div>
    @endsection
    @section('js')
    <!--<script type="text/javascript">
function b() {
      $.('modal').modal('show');
    }
</script>-->
<script>
// Get the modal
@php
       $i=1;
       @endphp
        @foreach ($data as $row)
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg{{$i}}');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick=function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    // captionText.innerHTML = this.alt;
}
@php
        $i++
        @endphp
        @endforeach
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
<script type="text/javascript">
        $(document).ready(function(){
          $(".btn-default").click(function(){
          $('#idkonfirm').val($(this).data('id'));
        $('#modal3').modal('show');
        });
        });
           
    </script>
    <script type="text/javascript">
    function a(){
       var konfirm=$('#status_pesan').val();
       console.log(konfirm);
       if(konfirm=="Tolak"){
        document.getElementById('editor1').style.display = 'block';
       }if(konfirm=="Terima"){
        document.getElementById('editor1').style.display = 'none';
       }
        
      
    }
             
        
    </script>
    @endsection