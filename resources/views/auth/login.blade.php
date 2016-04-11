<html>
<head>
	<title>Got a Hunch!</title>
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<meta id="token" name="token" value="{{csrf_token()}}">	
</head>
<body>
<div class="login-container">
	<div class="login">
		<a href={{$auth_url}}>
			<img src="https://developers.google.com/+/images/branding/sign-in-buttons/btn_google+_signin_dark_normal_web.png">
		</a>
	</div>
</div>
@if ( Config::get('app.debug') )
  <script type="text/javascript">
    document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
  </script>
@endif
</body>
</html>	