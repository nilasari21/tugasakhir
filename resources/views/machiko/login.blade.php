<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Login</title>
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
            <div class="panel-heading" align="center" style="font-size:20px"><b>Masuk </b></div>
                <div class="panel-body">
                <!--  -->
                <div class="row" style="margin-top:15px">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Alamat E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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

                        <!-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat saya
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Masuk
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Lupa Password?
                                </a>
                            </div>
                        </div>
                    </form>
                <div align="center" style="font-size:15px; margin:20px">  
        	      Belum memiliki akun Machiko K-Store? Daftar <a href="{{ url('daftar') }}"> disini </a>
                </div>

	</div>

</div>
</body>
</html>

    
    <script src="{{asset("/adminlte/bootstrap/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("/adminlte/plugins/jQuery/jQuery-2.2.3.min.js")}}"></script>
    <script src="{{ asset("/adminlte/plugins/datepicker/bootstrap-datepicker.js") }}"  > </script>
	<script src="{{ asset("/adminlte/plugins/input-mask/jquery.inputmask.js") }}"  > </script>
	<script src="{{ asset("/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js") }}"  > </script>
	<script src="{{ asset("/adminlte/plugins/input-mask/jquery.inputmask.extensions.js") }}"  > </script>

    <script>
  $(function () {
   $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    // startDate: '-3d'
    })
     });
    </script>