<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Register</title>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	
  	<link href="{{ asset("/vendor/adminlte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="{{asset("/vendor/adminlte/bootstrap/css/bootstrap.min.css")}}">
  	<link rel="stylesheet" href="{{asset("/vendor/adminlte/dist/css/AdminLTE.min.css")}}">
</head>

<body class="login-page">
    <div class="register-logo" style="margin:15px">
    	<h1>  <a href="#"><img src="{{asset("/vendor/machikoo/img/machiiii.png")}}"  ></a></h1>
  	</div>
    <div class="col-sm-offset-3 row col-sm-6">       
            <div class="form-group">
            <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size:20px"><b>Daftar Member Baru</b></div>
                <div class="panel-body">
                <!--  -->
                <div class="row" style="margin-top:15px">
                <form class="form-horizontal" action="#" method="post">  
                    
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Nomor Handphone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nohp" placeholder="Nomor Handphone" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                        <select class="form-control" style="width: 100%;" name="jenis_kelamin" required/>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>  
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <div class='input-group date' >
                        <input type='text' class="form-control" id="datepicker" required >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" placeholder="Email" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" placeholder="Password" required/>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Konfirmasi Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" placeholder="Konfirmasi Password" required/>
                        </div>
                    </div>
                               
                    <div class="form-group">
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" name="level" value="1">
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-2">
                            <button type="submit" class="btn btn-success btn-block">Daftar</button>
                        </div>
                    </div>
                </form>   
                <div align="center" style="font-size:15px; margin:20px">  
        	      Sudah memiliki akun Machiko K-Store? Masuk <a href="{{ url('masuk') }}"> disini </a>
                </div>

	</div>

</div>
</body>
</html>

    
    <script src="{{asset("vendor/adminlte/bootstrap/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("vendor/adminlte/plugins/jQuery/jQuery-2.2.3.min.js")}}"></script>
    <script src="{{ asset("vendor/adminlte/plugins/datepicker/bootstrap-datepicker.js") }}"  > </script>
	<script src="{{ asset("vendor/adminlte/plugins/input-mask/jquery.inputmask.js") }}"  > </script>
	<script src="{{ asset("vendor/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js") }}"  > </script>
	<script src="{{ asset("vendor/adminlte/plugins/input-mask/jquery.inputmask.extensions.js") }}"  > </script>

    <script>
  $(function () {
   $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    // startDate: '-3d'
    })
     });
    </script>