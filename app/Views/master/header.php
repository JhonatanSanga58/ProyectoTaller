<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Autotest</title>
	<meta name="description" content="Nuestro proyecto de grado humilde no lo tumben porfavor y ya sabes a quien me refiero">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url('sources/images/icon.png') ?>">
	<link rel="stylesheet" href="<?php echo base_url('sources/css/header.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('sources/css/footer.css') ?>">
	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
	<link rel="stylesheet" href="<?php echo base_url('sources/css/bootstrap.css') ?>">
	<script src="<?php echo base_url('sources/js/bootstrap.bundle.min.js') ?>"></script>
</head>

<body>
	<div>
		<header>
			<a class="logo" href="<?php echo base_url('public/') ?>">
				<img src="<?php echo base_url('sources/images/logo.png') ?>" alt="AutoTest logo">
			</a>
			<nav>
				<ul class="links">
					<li>
						<a class="download_app text-white" href="<?php echo base_url('public/dhbsadjkbashkdv') ?>">Descargar la aplicación</a>
					</li>
				</ul>
			</nav>
			<?php
			$session = session();
			if ($session->has("role")) {
			?>
				<a class="init" href="<?php echo base_url('public/user/logout') ?>">
					<button class="login">Cerrar sesión</button>
				</a>
			<?php
			} else {
			?>
				<a class="init" href="<?php echo base_url('public/user/login') ?>">
					<button class="login">Iniciar sesión</button>
				</a>
			<?php
			} ?>
		</header>
	</div>