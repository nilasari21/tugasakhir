<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Register</title>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	
  	<link href="{{ asset("/adminlte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="{{asset("/adminlte/bootstrap/css/bootstrap.min.css")}}">
  	<link rel="stylesheet" href="{{asset("/adminlte/dist/css/AdminLTE.min.css")}}">
</head>

<body class="login-page">
    <div class="register-logo" style="margin:15px">
    	<h1>  <a href="#"><img src="{{asset("/machikoo/img/machiiii.png")}}"  ></a></h1>
  	</div>
    <div class="col-sm-offset-3 row col-sm-6">       
            <div class="form-group">
            <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size:20px"><b>Daftar Member Baru</b></div>
                <div class="panel-body">
                <!--  -->
                <div class="row" style="margin-top:15px">
                    @if (Session::has('message'))
                            <div class="alert {{ Session::get('alert-class', 'alert-success') }}">
                            {{ Session::get('message') }}</div>
                            @endif
                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                     {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
                        <input type='text'name="tgl_lahir" class="form-control" id="datepicker" required >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" name="level" value="Customer">
                        </div>
                    </div>  
                    <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
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

    
    <script src="{{asset("adminlte/bootstrap/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("adminlte/plugins/jQuery/jQuery-2.2.3.min.js")}}"></script>
    <script src="{{ asset("adminlte/plugins/datepicker/bootstrap-datepicker.js") }}"  > </script>
	<script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.js") }}"  > </script>
	<script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js") }}"  > </script>
	<script src="{{ asset("adminlte/plugins/input-mask/jquery.inputmask.extensions.js") }}"  > </script>

    <script>
  $(function () {
   $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    // startDate: '-3d'
    })
     });
    </script>