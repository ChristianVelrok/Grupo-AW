<?php 
	require_once __DIR__.'/config.php';
	require_once __DIR__.'/merchandising.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> <!--ESTABLECEMOS LA CODIFICACION A UTF-8-->
	<meta name="author" content="Watchandcoment Team"><!-- AUTORES DE LA PÁGINA -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo RAIZ_APP; ?>img/favicon.ico"> <!-- ESTABLECIMIENTO DEL FAVICON -->
	<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/login.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/header.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/style.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/menu.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<link rel="stylesheet" type="text/css" href="<?php echo RAIZ_APP; ?>css/footer.css"><!-- LINK AL ESTILO DE ESTA PAGINA -->
		<script src="<?php echo RAIZ_APP; ?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="<?php echo RAIZ_APP; ?>js/sidebarIzq.js" type="text/javascript"></script>
		<script src="<?php echo RAIZ_APP; ?>js/merchandising.js" type="text/javascript"></script>

	<title>Página añadir merchandising</title>
</head>

<body>
	<div id="contenedor">
		<?php include_once __DIR__.'/header.php'; ?>
		<?php include_once __DIR__.'/sidebarIzq.php'; ?>
		<div id="contenido">
		<?php gestionarFormularioAddMercha(); ?>
		</div>
		<?php include_once __DIR__.'/footer.php'; ?>
	</div>
	
</body>

</html>
