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
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
