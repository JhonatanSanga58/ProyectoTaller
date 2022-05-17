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
	<link rel="stylesheet" href="<?php echo base_url('sources/css/bootstrap.css') ?>">
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