<?php 
session_start();
helper('url');
if(isset($_POST['submit'])){
	$pswd = "123";
	$password = strip_tags(htmlspecialchars(trim($_POST['password']))); 
	if($password === $pswd){
	    $_SESSION['login'] = 'login';
		
		
        		
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Refresh" content="600" />
    <title>Дашборд от CRM-Мастерской «TSL» | <?= $title ?? '' ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>">
	
	<script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('plugins/chart.js/Chart.min.js'); ?>"></script>
	
	<script type="text/javascript" src="<?= base_url('js/bootstrap-multiselect.min.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap-multiselect.min.css') ?>" type="text/css"/>

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<div class="container py-3">
    <div class="row">

        <div class="col-lg-12 category-content">
            <h1 class="section-title offset-md-3">Введите пароль</h1>

        <hr>

            <form class="row g-3" method="post">

               

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="пароль">
                        <label class="required" for="password">Пароль</label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <input type="submit" class="btn btn-danger" name = "submit" value = "Войти">
                </div>
            </form>

        </div>
    </div>
</div>

</div>
<!-- ./wrapper -->


<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>
<script src="<?= base_url('js/main.js') ?>"></script>
</body>
</html>



