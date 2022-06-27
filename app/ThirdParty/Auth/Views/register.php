<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register An Account - Yoo Community</title>

	 <!-- Meta Description -->
    <meta name="description" content="Membuat akun baru pada layanan Yoo Community. Jangan lupa gunakan password yang kuat untuk terhindar dari hacker. Apabila menemukan kesulitan dalam membuat akun silahkan hubungi petugas pada live chat atau email">
    
    <meta name="keywords" content="Yoo Community, Akun, Daftar, Login, Account, Register">

    <meta name="author" content="Yoo Community">

    <!-- Meta OG -->
    <meta property="og:title" content="Yoo Community Account | Register An Account!"/>

    <meta property="og:description" content="Membuat akun baru pada layanan Yoo Community. Jangan lupa gunakan password yang kuat untuk terhindar dari hacker. Apabila menemukan kesulitan dalam membuat akun silahkan hubungi petugas pada live chat atau email">

    <meta property="og:image" content="<?= base_url('icon.png') ?>">

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url('icon.png') ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asetku/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asetku/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asetku/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asetku/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="asetku/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asetku/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asetku/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="asetku/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asetku/css/util.css">
	<link rel="stylesheet" type="text/css" href="asetku/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('asetku/images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<center><?= view('Auth\Views\_notifications') ?></center>
			<form class="login100-form validate-form" action="<?= base_url('register'); ?>" method="post" accept-charset="UTF-8" onsubmit="registerButton.disabled = true; return true;">
				<?= csrf_field() ?>
				
				<span class="login100-form-title p-b-37">
					<?= lang('Auth.registration') ?>
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter your name">
					<input class="input100" type="text" name="name" placeholder="<?= lang('Auth.name') ?>" value="<?= old('name') ?>" />
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter your email">
					<input class="input100" type="email" name="email" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>" />
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate="Enter correct password">
					<input class="input100" type="password" name="password" placeholder="<?= lang('Auth.password') ?>">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate="Retype password">
					<input class="input100" type="password" name="password_confirm" placeholder="<?= lang('Auth.passwordAgain') ?>">
					<span class="focus-input100"></span>
				</div>

				<!-- <div class="wrap-input100 validate-input m-b-25" data-validate="Enter correct password">
                    <?php // reCaptcha2('reCaptcha2', ['id' => 'recaptcha_v2']); ?>
                </div> -->

				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn" name="registerButton">
						<?= lang('Auth.register') ?>
					</button>
				</div>
				
				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
					<a class="txt2 hov1" href="<?= base_url('login'); ?>"><?= lang('Auth.alreadyRegistered') ?></a>
					</span>
				</div>
	
			</form>

			
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="asetku/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="asetku/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="asetku/vendor/bootstrap/js/popper.js"></script>
	<script src="asetku/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="asetku/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="asetku/vendor/daterangepicker/moment.min.js"></script>
	<script src="asetku/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="asetku/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="asetku/js/main.js"></script>

</body>
</html>