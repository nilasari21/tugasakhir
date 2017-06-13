Click here to reset your password: 


<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Reset Password</h2>
        <div>
	          <p>untuk mendapatkan Password baru anda, ikutin alamat berikut 
            <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">Reset Password</a>
            </p>
            <br/>
 			<p>atau copy alamat berikut ke addresbar browser anda {{ $link }}</p>
 			<br/>

 			<p>admin</p>
        </div>
    </body>
</html>